<?php

namespace App\Form\Validator;

use App\Form\Handler\ErrorHandler;
use App\Service\CsrfTokenService;

/**
 * class CsrfTokenValidator.
 */
class CsrfTokenFormValidator extends AbstractFormValidator
{
    /**
     * To check statements.
     *
     * @param string $email Email address.
     * @param string $password Password.
     * @param string|null $csrfTokenRaw CSRF token.
     * @return bool
     */
    public function check(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if (!$_POST['csrf_token']) {
            ErrorHandler::addError("csrf_token is required!\n");
            return false;
        } elseif (empty($csrfTokenRaw) || $_POST['csrf_token'] !== CsrfTokenService::generate($csrfTokenRaw)) {
            ErrorHandler::addError("csrf_token is required!\n");
            return false;
        }
        return parent::check($email, $password, $csrfTokenRaw);
    }
}
