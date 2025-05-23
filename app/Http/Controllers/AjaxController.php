<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    /**
     * Returns all the projects from the live search input
     */
    public function liveSearch(String $input, string $table)
    {
        $project = DB::table($table)
            ->where($table.'.name', 'LIKE', "%$input%")
            ->get();

        return response()->json($project);
    }


    /**
     * Returns the a project from the given id
     */
    public function getOptions(string $id, string $table)
    {
        $option = DB::table($table)
            ->where('id', $id)
            ->first()->name;

            return response()->json($option);
    }

    /**
     * Returns all the payment option id's.
     */
    public function paymentId()
    {
        $paymentId = DB::table('payment_options')
            ->select('id')
            ->get();

        return response()->json($paymentId);
    }
}
