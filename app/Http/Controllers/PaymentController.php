<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use App\Services\OrderService;
use Illuminate\Validation\Rule;
use App\Services\InvoiceService;
use App\Factories\PaymentFactory;
use App\Services\OrderMailService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\ProviceRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\ExhibitionRepository;
use App\Repositories\PaymentOptionRepository;

class PaymentController extends Controller
{
    protected PaymentOption $paymentOption;
    protected Order $order;


    public function __construct(
        protected OrderMailService $orderMailService,
        protected ProviceRepository $proviceRepository,
        protected PaymentOptionRepository $paymentOptionRepository,
        protected ExhibitionRepository $exhibitionRepository,
        protected BusinessRepository $businessRepository,
    ){parent::__construct();}


    /**
     * Handles the payment option, items and payment service.
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function index(Request $request): RedirectResponse
    {
        // Gets all the province id's
        $provinceIds = $this->proviceRepository->get();


        // Validates the request data.
        $request->validate([
            'shipping.email-address' => 'required|email|string|max:191',
            'shipping.phone' => 'required|min:10|',
            'shipping.first-name' => 'required|string|max:191',
            'shipping.last-name' => 'required|string|max:191',
            'shipping.company' => 'nullable|string|max:191',
            'shipping.address' => 'required|string|max:191',
            'shipping.apartment' => 'nullable|number|max:1000',
            'shipping.city' => 'required|string|max:191',
            'shipping.provinces' => 'required|string|'.Rule::in($provinceIds),
            'shipping.postal-code' => 'required|string|min:6'
        ]);


        // Handles the important variables
        $this->variableHandler($request->paymentMethod, $request->shipping, $request->items, $request->paymentAmount);


        // Creates the invoice for the new order and saves the url to the order.
        $invoiceService = new InvoiceService($request->items, $request->shipping, $request->paymentAmount, $this->order);
        $invoiceService->createInvoice();


        // Sends email That the order has been made to the customer.
        $this->orderMailService->newOrderHandler($request->shipping, $this->order);


        // Handles what payment method has to be used.
        if($this->paymentHandler($request->shipping) == "redirect") {
            return redirect()->route('payment.exhibition', $this->order);
        }


        return redirect()->route('home.index');
    }


    /**
     * Returns a view with all the available exhibitions.
     * Here the user will chose at what exhibition to pick up the order.
     * @return View
     */
    public function exhibition(Order $order): View
    {
        return view("payments.fairPickUp", [
            'exhibitions' => $this->exhibitionRepository->all(),
            'business' => $this->businessRepository->all(),
            'order' => $order,
        ]);
    }


    /**
     * Gets the chosen exhibition from the view and the corresponding order.
     * @param \App\Models\Exhibition $exhibition
     * @param \App\Models\Order $order
     * @return never
     */
    public function fairPickUp(Exhibition $exhibition, Order $order)
    {
        dd($order, $exhibition);
    }


    /**
     * This function is used as a controller.
     * Checks what payment function has to be called based on the payment option
     * @return void
     */
    private function paymentHandler(array $shipping)
    {
        $paymentFactory = new PaymentFactory($this->order, $this->paymentOption, $shipping['first-name']." ".$shipping['last-name']);

        // Checks what function has to be called based on the payment option.
        switch ($this->paymentOption['id']) {
            case 1:
                $paymentFactory->backTransfer();
                break;
            case 2:
                return "redirect";
            case 3:
                $paymentFactory->other();
                break;
            default:
                throw new Exception('Invalid payment option given.');
        }
    }


    /**
     * Handles all the variables and new order
     * @return void
     */
    private function variableHandler(array $paymentMethod, array $shipping, array $items, string $paymentAmount): void
    {
        // Checks what payment options has been selected
        $this->paymentOption = $this->paymentOptionRepository->find($paymentMethod);

         // Creates a new order with the payment id, items array and the shipping array.
        $this->order = OrderService::create($shipping, $items, $paymentAmount, $this->paymentOption);
    }
}
