<?php

namespace App\Form\Handler;

class ErrorHandler
{
    public static function addError(string $message)
    {
        if (session_status() == PHP_SESSION_NONE) {
            @session_start();
        }
        if (empty($_SESSION['errors']) || (!empty($_SESSION['errors']) && !in_array($message, $_SESSION['errors'], true))) {
        }
            $_SESSION['errors'][] = $message;
    }

    public static function getErrors(): array
    {
        $result = [];
        if (isset($_SESSION['errors'])) {
            $result = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        return $result;
    }

    public static function has_errors()
    {
        if (isset($_SESSION['errors'])) {
            return count($_SESSION['errors']);
        }
        return false;
    }
}
