<?php

namespace App\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class RegisterController
{
    public function __construct(public string $controllerName)
    {
    }
}
