<?php

namespace App\Form\Handler;

/**
 * Class ErrorHandler.
 */
class ErrorHandler
{
    /**
     * To add an error message.
     *
     * @param string $message The error message.
     * @return void
     */
    public static function addError(string $message): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            @session_start();
        }
        if (empty($_SESSION['errors']) || (!empty($_SESSION['errors']) && !in_array($message, $_SESSION['errors'], true))) {
            $_SESSION['errors'][] = $message;
        }
    }

    /**
     * To display error messages and clear the session.
     *
     * @return array
     */
    public static function getErrors(): array
    {
        $result = [];
        if (isset($_SESSION['errors'])) {
            $result = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        return $result;
    }

    /**
     * To check if there are any errors.
     *
     * @return bool|int|null
     */
    public static function has_errors(): bool|int|null
    {
        if (isset($_SESSION['errors'])) {
            return count($_SESSION['errors']);
        }
        return false;
    }
}
