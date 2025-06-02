<?php

namespace App\Services;

use App\Helper\Functions;
use App\Models\BusinessSettings;
use App\Models\InvoiceSettings;
use App\Models\Order;
use App\Models\PaymentOption;
use Exception;
use App\Models\Product;
use App\Models\ShippingCountry;
use App\Repositories\BusinessRepository;
use Illuminate\Database\Eloquent\Builder;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class InvoiceService
{
    protected array $orderItems;
    protected array $shippingInfo;
    protected int $paymentAmount;
    protected Order $order;
    protected Invoice $invoice;
    protected InvoiceSettings $invoiceSettings;
    protected BusinessRepository $businessRepository;
    protected BusinessSettings $businessSettings;

    public function __construct(
        array $orderItems,
        array $shippingInfo,
        int $paymentAmount,
        Order $order)
    {
        $this->orderItems = $orderItems;
        $this->shippingInfo = $shippingInfo;
        $this->paymentAmount = $paymentAmount;
        $this->order = $order;
        $this->invoiceSettings = InvoiceSettings::find(1);
        $this->businessRepository = new BusinessRepository();
        $this->businessSettings = $this->businessRepository->all();
    }


    /**
     * Creates the invoice and returns invoice location as url.
     * @return bool
     */
    public function createInvoice(): bool
    {
        $client = $this->createClient();
        $customer = $this->createCustomer();
        $items = $this->createInvoiceItems();
        $fileName = $this->createFileName();

        // Creates default template for the invoice.
        $this->invoice = Invoice::make()
            ->filename($fileName)
            ->seller($client)
            ->buyer($customer)
            ->addItems($items);


        // Checks if shipping cost have to be added.
        if ($this->order->payment_option_id != PaymentOption::$fairPickup) {
            $this->invoice->shipping($this->getShipping());
        }


        // Saves the invoice and return the url of the storage path
        $invoiceUrl = $this->invoice->save('invoice')->filename($fileName)->url();


        // Saves the url to the order
        $this->order->update([
            'invoice_location' => $invoiceUrl
        ]);


        return true;
    }


    /**
     * Creates the items so that the invoice libary knows what the items are.
     * @return array
     */
    protected function createInvoiceItems(): array
    {
        $items = array();

        foreach($this->orderItems as $key => $item) {
            $product = Product::find($key);

            // Checks if the product exist.
            if (Product::find($key) == null) {
                throw new Exception('The product in the orderItems array does not exist.');
            }

            $items[] = InvoiceItem::make($product['name'])
                ->pricePerUnit((float) $product['price'])
                ->description($product['big_desc'])
                ->quantity($item)
                ->discount((Functions::hasDiscount($product)) ? $product['discount_percentage'] : 0);
        }

        return $items;
    }


    /**
     * Creates a customer that the invoice library can use.
     * @return Buyer
     */
    protected function createCustomer(): Buyer
    {
        $customer = new Buyer([
            'name' => $this->shippingInfo['first-name'].' '.$this->shippingInfo['last-name'],
            'address' => $this->shippingInfo['address'].' '.$this->shippingInfo['city'],
            'custom_fields' => [
                'email' => $this->shippingInfo['email-address'],
                'country' => ShippingCountry::find($this->shippingInfo['shippingCountry'])->country_name,
            ]
        ]);

        return $customer;
    }


    /**
     * Creates the client/seller for the invoice.
     * @return Party
     */
    protected function createClient(): Party
    {
        $client = new Party([
            'name' => $this->invoiceSettings['bankaccount_name'].', '.$this->invoiceSettings['company_name'],
            'phone' => $this->invoiceSettings['phone_number'],
            'address' => $this->businessSettings['business_address'],
            'custom_fields' => [
                'bankaccount number' => $this->businessSettings['bankaccount_number'],
                'KVK number' => $this->businessSettings['kvk_number']
            ]
        ]);


        return $client;
    }


    /**
     * Creates the invoice number/filename.
     * @return string
     */
    protected function createFileName(): string
    {
        $year = date('Y');
        $invoiceCount = count(Order::all());

        return $year.'-'.$invoiceCount;
    }

    /**
     * Returns the shipping cost of the order.
     */
    protected function getShipping()
    {
        $countryId = $this->shippingInfo['shippingCountry'];

        return ShippingCountry::find($countryId)->shipping_cost;
    }
}
