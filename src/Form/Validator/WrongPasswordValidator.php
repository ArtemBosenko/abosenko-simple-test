<?php

namespace App\Form\Validator;

use App\Form\Handler\ErrorHandler;
use App\Service\LoginService;

/**
 * Class WrongPasswordValidator.
 */
class WrongPasswordValidator extends AbstractFormValidator
{
    /**
     * The LoginService.
     *
     * @var LoginService
     */
    private LoginService $loginService;

    /**
     * Constructor.
     *
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * To check statements.
     *
     * @param string $email The email address.
     * @param string $password The password.
     * @param string|null $csrfTokenRaw CSRF token.
     * @return bool
     */
    public function check(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if (!$this->loginService->isValidPassword($email, $password)) {
            ErrorHandler::addError("Wrong password!\n");
            return false;
        }
        return parent::check($email, $password, $csrfTokenRaw);
    }
}
