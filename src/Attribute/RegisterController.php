<?php

namespace App\Attribute;

use Attribute;

/**
 * Class RegisterController.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class RegisterController
{
    /**
     * RegisterController constructor.
     *
     * @param string $controllerName
     */
    public function __construct(public string $controllerName)
    {
    }
}
