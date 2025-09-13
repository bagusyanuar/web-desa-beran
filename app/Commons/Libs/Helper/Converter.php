<?php

namespace App\Commons\Libs\Helper;

class Converter
{
    public static function genderToDisplay($gender): string
    {
        return match ($gender) {
            'male' => 'Laki-Laki',
            'female' => 'Perempuan',
            default => '-'
        };
    }
}
