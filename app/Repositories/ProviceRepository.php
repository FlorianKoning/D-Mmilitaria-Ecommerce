<?php

namespace App\Repositories;

use Exception;
use App\Models\Province;


class ProviceRepository
{
    public function get()
    {
        $returnArray = array();
        $provinces = Province::select('id')->get();

        foreach ($provinces as $province) {
            $returnArray[] = $province->id;
        }

        return $returnArray;
    }


    public function find($key)
    {
        $province = Province::where('id', $key)->first();

        if (!$province) {
            throw new Exception('There is no provice in the database with that key/id');
        }

        return $province;
    }
}
