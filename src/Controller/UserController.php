<?php

namespace App\Controller;

use App\Attribute\RegisterController;
use App\Attribute\RegisterRoute;
use App\Database\PDOInstance;
use App\Form\Validator\CsrfTokenFormValidator;
use App\Form\Validator\UserExistsValidator;
use App\Form\Validator\WrongEmailValidator;
use App\Form\Validator\WrongPasswordValidator;
use App\Models\User;
use App\Route\RouteRegistry;
use App\Service\LoginService;

/**
 * Class UserController
 */
#[RegisterController('UserController')]
class UserController extends AbstractController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $db = PDOInstance::get_instance();
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT(11) AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(50) NOT NULL,
                    surname VARCHAR(50) NOT NULL,
                    mobile_phone VARCHAR(20),
                    email VARCHAR(100) UNIQUE NOT NULL,
                    password VARCHAR(255) NOT NULL
                )";
        $db->exec($sql);
    }

    /**
     * The login route.
     *
     * @return void
     * @throws \Exception
     */
    #[RegisterRoute('/login', 'login')]
    public function login(): void
    {
        if (isset($_POST['email'], $_POST['password'], $_POST['csrf_token'])) {
            $loginService = new LoginService();
            $validator = new CsrfTokenFormValidator();
            $validator
                ->linkWith(new WrongEmailValidator($loginService))
                ->linkWith(new WrongPasswordValidator($loginService));
            $loginService->setValidator($validator, new User());
            $success = $loginService->logIn($_POST['email'], $_POST['password'], 'login');
            if ($success) {
                header("Location: " . RouteRegistry::getRegisteredRoute('admin'));
                exit();
            }
            $_SESSION['form_data'] = $_POST;
            if (isset($_SESSION['form_data'])) {
                $formData = $_SESSION['form_data'];
                unset($_SESSION['form_data']);
            }
        }
        $this->render('user/login', ['pageTitle' => 'Login Page', 'formData' => isset($formData) ? $formData : []]);
    }

    /**
     * The registration route.
     *
     * @return void
     * @throws \Exception
     */
    #[RegisterRoute('/register', 'register')]
    public function register(): void
    {
        if (isset($_POST['email'], $_POST['surname'], $_POST['password'], $_POST['mobilePhone'], $_POST['csrf_token'])) {
            $loginService = new LoginService();
            $validator = new CsrfTokenFormValidator();
            $validator->linkWith(new UserExistsValidator($loginService));
            $loginService->setValidator($validator, new User());
            $success = $loginService->register($_POST['email'], $_POST['password'], 'register');
            if ($success) {
                $_SESSION['form_data'] = $_POST;
                header("Location: " . RouteRegistry::getRegisteredRoute('admin'));
                exit();
            }
            $_SESSION['form_data'] = $_POST;
            if (isset($_SESSION['form_data'])) {
                $formData = $_SESSION['form_data'];
                unset($_SESSION['form_data']);
            }
        }
        $this->render('user/register', ['pageTitle' => 'Register Page', 'formData' => isset($formData) ? $formData : []]);
    }

    /**
     * The admin route.
     *
     * @return void
     */
    #[RegisterRoute('/admin', 'admin')]
    public function admin(): void
    {
        $users = new User();
        $users = $users->readAll();
        $this->render('user/admin', ['users' => $users, 'pageTitle' => 'Admin Page']);
    }
}
