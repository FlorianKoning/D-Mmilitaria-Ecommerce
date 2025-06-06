<?php

namespace App\Utils;

use Illuminate\Support\Carbon;

class DateHelper
{
    public function thisWeek(): array
    {
        return [
            'startOfWeek' => Carbon::now()->startOfWeek()->format('Y-m-d H:i'),
            'endOfWeek' => Carbon::now()->endOfWeek()->format('Y-m-d H:i'),
        ];
    }


    public function lastWeek(): array
    {
         return [
            'startOfWeek' => Carbon::now()->startOfWeek()->subDays(7)->format('Y-m-d H:i'),
            'endOfWeek' => Carbon::now()->endOfWeek()->endOfWeek()->subDays(7)->format('Y-m-d H:i'),
        ];
    }
}