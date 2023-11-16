<?php

namespace App\Controller;

use App\Attribute\RegisterController;
use App\Attribute\RegisterRoute;
use App\Models\User;

/**
 * Class HomeController
 */
#[RegisterController('HomeController')]
class HomeController extends AbstractController
{
    #[RegisterRoute('/', 'home')]
    public function home(): void
    {
        $this->render('page/home', ['renderRaw', 'pageTitle' => 'Home Page']);
    }
}
