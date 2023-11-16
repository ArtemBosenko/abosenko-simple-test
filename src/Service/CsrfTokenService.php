<?php

namespace App\Service;

/**
 * Class CsrfTokenService.
 */
class CsrfTokenService
{
    /**
     * To generate a CSRF token.
     *
     * @param string $key
     * @return string
     */
    public static function generate(string $key): string
    {
        return md5($key);
    }
}
