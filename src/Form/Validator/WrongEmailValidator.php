<?php

namespace App\Form\Validator;

use App\Form\Handler\ErrorHandler;
use App\Service\LoginService;

/**
 * Class WrongEmailValidator.
 */
class WrongEmailValidator extends AbstractFormValidator
{
    /**
     * The LoginService.
     *
     * @var LoginService
     */
    private LoginService $loginService;

    /**
     * The constructor.
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
     * @param string $email Email address.
     * @param string $password Password.
     * @param string|null $csrfTokenRaw CSRF token.
     * @return bool
     */
    public function check(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if (!$this->loginService->hasEmail($email)) {
            ErrorHandler::addError("Wrong email!\n");
            return false;
        }
        return parent::check($email, $password, $csrfTokenRaw);
    }
}
