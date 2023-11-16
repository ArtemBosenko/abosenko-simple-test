<?php

namespace App\Form\Validator;

use App\Form\Handler\ErrorHandler;
use App\Service\LoginService;

class UserExistsValidator extends AbstractFormValidator
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function check(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if ($this->loginService->hasEmail($email)) {
            ErrorHandler::addError("This email already registered!\n");
            return false;
        }
        return parent::check($email, $password, $csrfTokenRaw);
    }
}
