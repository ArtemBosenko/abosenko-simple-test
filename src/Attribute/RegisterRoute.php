<?php

namespace App\Attribute;

use Attribute;
use App\Route\RouteRegistry;

#[Attribute(Attribute::TARGET_METHOD)]
class RegisterRoute
{
    private string $path;
    private ?string $alias;

    public function __construct(string $path, ?string $alias = null)
    {
        $this->path = $path;
        $this->alias = $alias;

        // Register the route upon initialization
        RouteRegistry::registerRoute($path, $alias);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }
}
