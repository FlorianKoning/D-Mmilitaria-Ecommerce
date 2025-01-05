<?php

namespace App\Helper;


class Functions
{
    /**
     * Checks if the request uri contains the given string and returns the given true and false values
     * @return string
     */
    public static function requestUriCheck(string $contains, string $trueValue, string $falseValue): string
    {
        return str_contains($_SERVER['REQUEST_URI'], $contains) ? $trueValue : $falseValue;
    }
}
