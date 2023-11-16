<?php

namespace App\Service;

use App\Form\Validator\FormValidatorInterface;
use App\Models\User;

class LoginService
{
    private $users = [];

    private $validator;
    private User $userModel;

    public function setValidator(FormValidatorInterface $validator, User $userModel): void
    {
        $this->validator = $validator;
        $this->userModel = $userModel;
        $this->users = $this->userModel->readAll();
    }

    public function logIn(string $email, string $password, string $csrfTokenRaw = null): bool
    {
        if ($this->validator->check($email, $password, $csrfTokenRaw)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['app_user_logged_in'] = true;
            return true;
        }
        return false;
    }

    public function register($email, $password, $csrfTokenRaw): bool
    {
        if ($this->validator->check($email, $password, $csrfTokenRaw)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $this->userModel->create($_POST);
            $_SESSION['app_user_logged_in'] = true;
            return true;
        }
        return false;
    }

    public function hasEmail(string $email): bool
    {
        return ! empty($this->userModel->findBy('email', $email));
    }

    public function isValidPassword(string $email, string $password): bool
    {
        $user = $this->userModel->findBy('email', $email);
        if ($user) {
            return password_verify($password, $user['password']);
        }
        return false;
    }
}
