<?php

namespace App\Helpers;

class Arrays
{
    public static function array_except($array, $keys): array
    {
        return array_diff_key($array, array_flip((array) $keys));
    }
}
