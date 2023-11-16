<?php

namespace App\Service;

class CsrfTokenService
{
    public static function generate(string $key): string
    {
        return md5($key);
    }
}
