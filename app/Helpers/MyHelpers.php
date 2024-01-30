<?php

namespace App\Helpers;

function myStrToUpper($str)
{
    $search = ['ı', 'i', 'ğ', 'ü', 'ş', 'ö', 'ç'];
    $replace = ['I', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'];

    return str_replace($search, $replace, strtoupper($str));
}
