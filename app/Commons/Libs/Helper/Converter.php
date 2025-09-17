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

    public static function citizenshipToDisplay($citizenship): string
    {
        return match ($citizenship) {
            'indonesia' => 'Indonesia',
            'foreign' => 'Warga Negara Asing',
            default => '-'
        };
    }

    public static function marriageToDisplay($marriage): string
    {
        return match ($marriage) {
            'married' => 'Menikah',
            'not-married' => 'Belum Menikah',
            default => '-'
        };
    }

    public static function birthTypeToDisplay($birthType): string
    {
        return match ($birthType) {
            'single' => 'Tunggal',
            'twin' => 'Kembar',
            default => '-'
        };
    }
}
