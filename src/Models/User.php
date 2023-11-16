<?php

namespace App\Models;

use App\Database\PDOInstance;
use App\Entity\AbstractEntity;
use PDO;
use PDOException;

/**
 * Class User.
 */
class User extends AbstractEntity
{
    /**
     * User id.
     *
     * @var int
     */
    private int $id;

    /**
     * User name.
     *
     * @var string
     */
    private string $name;

    /**
     * User surname.
     *
     * @var string
     */
    private string $surname;

    /**
     * User mobile phone.
     *
     * @var string
     */
    private string $mobilePhone;

    /**
     * User email.
     *
     * @var string
     */
    private string $email;

    /**
     * User password.
     *
     * @var string
     */
    private string $password;

    /**
     * Get user id.
     *
     * @return int The user id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * To get username.
     *
     * @return string Get username.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * To set username.
     *
     * @param  string $name Username.
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * To get user email address.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * To set user email address.
     *
     * @param  string $email User email address.
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * To get user password.
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * To set password.
     *
     * @param  string $password User password.
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Create a new user.
     *
     * @param array $data Data to create a user.
     * @return bool Returns true on success, false on failure.
     */
    public function create(array $data): bool
    {
        try {
            $name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
            $surname = htmlspecialchars($data['surname'], ENT_QUOTES, 'UTF-8');
            $mobilePhone = htmlspecialchars($data['mobilePhone'], ENT_QUOTES, 'UTF-8');
            $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $pdo = PDOInstance::get_instance();
            $stmt = $pdo->prepare("INSERT INTO users (name, surname, mobile_phone, email, password) VALUES (?, ?, ?, ?, ?)");
            $success = $stmt->execute([$name, $surname, $mobilePhone, $email, $hashedPassword]);

            return $success;
        } catch (PDOException $e) {
            error_log("Error creating user: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Read data of all users
     *
     * @return array|false Returns user data as an array or false if user not found or on failure.
     */
    public function readAll()
    {
        try {
            $pdo = PDOInstance::get_instance();
            $stmt = $pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users ? $users : [];
        } catch (PDOException $e) {
            echo "Error reading users: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Read data of a user by some param.
     *
     * @param string|int $param User param.
     * @return array|false Returns user data as an array or false if user not found or on failure.
     */
    public function findBy(string $columnName, string|int $param)
    {
        try {
            $pdo = PDOInstance::get_instance();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE {$columnName} = ?");
            $stmt->execute([$param]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? $user : false;
        } catch (PDOException $e) {
            echo "Error reading user: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Read data of a user by their ID.
     *
     * @param int $id User ID.
     * @return array|false Returns user data as an array or false if user not found or on failure.
     */
    public function read(int $id)
    {
        try {
            $pdo = PDOInstance::get_instance();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? $user : false;
        } catch (PDOException $e) {
            echo "Error reading user: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Update user data.
     *
     * @param int $id User ID.
     * @param array $data Data to update.
     * @return bool Returns true on success, false on failure.
     */
    public function update(int $id, array $data): bool
    {
        try {
            $name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
            $surname = htmlspecialchars($data['surname'], ENT_QUOTES, 'UTF-8');
            $mobilePhone = htmlspecialchars($data['mobilePhone'], ENT_QUOTES, 'UTF-8');
            $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            $pdo = PDOInstance::get_instance();
            if (isset($data['password'])) {
                $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE users SET name = ?, surname = ?, mobile_phone = ?, email = ?, password = ? WHERE id = ?");
                $success = $stmt->execute([$name, $surname, $mobilePhone, $email, $hashedPassword, $id]);
            } else {
                // Prepare the SQL statement for updating user data without changing the password
                $stmt = $pdo->prepare("UPDATE users SET name = ?, surname = ?, mobile_phone = ?, email = ? WHERE id = ?");
                $success = $stmt->execute([$name, $surname, $mobilePhone, $email, $id]);
            }
            return $success;
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id User ID.
     * @return bool Returns true on success, false on failure.
     */
    public function delete(int $id): bool
    {
        try {
            $pdo = PDOInstance::get_instance();
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $success = $stmt->execute([$id]);
            return $success;
        } catch (PDOException $e) {
            echo "Error deleting user: " . $e->getMessage();
            return false;
        }
    }
}
