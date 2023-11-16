<?php

namespace App\Form\Validator;

/**
 * Abstract class AbstractFormValidator
 */
abstract class AbstractFormValidator implements FormValidatorInterface
{
    private $next;

    /**
     * To link with other validators.
     *
     * @param AbstractFormValidator $next The next validator.
     * @return AbstractFormValidator
     */
    public function linkWith(AbstractFormValidator $next): AbstractFormValidator
    {
        $this->next = $next;
        return $next;
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
        if (!$this->next) {
            return true;
        }
        return $this->next->check($email, $password, $csrfTokenRaw);
    }
}
