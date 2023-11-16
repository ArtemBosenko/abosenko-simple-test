<?php

namespace App\Form\Validator;

class AbstractFormValidator implements FormValidatorInterface
{
    private $next;

    public function linkWith(AbstractFormValidator $next): AbstractFormValidator
    {
        $this->next = $next;
        return $next;
    }

    public function check(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if (!$this->next) {
            return true;
        }
        return $this->next->check($email, $password, $csrfTokenRaw);
    }
}
