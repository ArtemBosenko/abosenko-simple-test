<?php

namespace App\Form\Validator;

interface FormValidatorInterface
{
    public function check(string $email, string $password, string $csrfTokenRaw = null): bool;
}
