<?php

namespace App\Helpers;

class Tokenizer {
    public static function get($words)
    {
        return explode(" ", $words);
    }
}