<?php

namespace App\Database;

use PDO;
use PDOException;

class PDOInstance
{
    private static ?PDO $pdoInstance = null;

    /**
     * Get the instance of PDO.
     *
     * @return PDO|null The PDO instance.
     */
    public static function get_instance(): ?PDO
    {
        if (self::$pdoInstance === null) {
            try {
                $host = DB_HOST;
                $dbname = DB_NAME;
                $username = DB_USER;
                $password = DB_PASS;
                self::$pdoInstance = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit();
            }
        }
        return self::$pdoInstance;
    }
}
