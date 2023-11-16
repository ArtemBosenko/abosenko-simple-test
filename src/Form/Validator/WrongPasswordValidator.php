<?php

namespace App\Form\Validator;

use App\Form\Handler\ErrorHandler;
use App\Service\LoginService;

class WrongPasswordValidator extends AbstractFormValidator
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function check(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if (!$this->loginService->isValidPassword($email, $password)) {
            ErrorHandler::addError("Wrong password!\n");
            return false;
        }
        return parent::check($email, $password, $csrfTokenRaw);
    }
}
