<?php

namespace App\Form\Validator;

/**
 * Interface FormValidatorInterface.
 */
interface FormValidatorInterface
{
    /**
     * To check statements.
     *
     * @param string $email Email address.
     * @param string $password Password.
     * @param string|null $csrfTokenRaw CSRF token.
     * @return bool
     */
    public function check(string $email, string $password, string $csrfTokenRaw = null): bool;
}
