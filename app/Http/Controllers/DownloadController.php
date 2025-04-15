<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function invoices(Order $order)
    {
        $fileName = str_replace(env('APP_URL').'/storage/invoices/', '', $order->invoice_location);

        if (Storage::disk('invoice')->exists($fileName)) {
            return Storage::disk('invoice')->download($fileName, 'betalingsFactuur.pdf');
        } else {
            exit('Requested file does not exist on our server!');
        }
    }    
}
