<?php

namespace App\Attribute;

use Attribute;
use App\Route\RouteRegistry;

/**
 * Class RegisterRoute.
 */
#[Attribute(Attribute::TARGET_METHOD)]
class RegisterRoute
{
    /**
     * The path.
     *
     * @var string
     */
    private string $path;

    /**
     * The alias.
     *
     * @var string|null
     */
    private ?string $alias;

    /**
     * The constructor.
     *
     * @param string $path Path to register.
     * @param string|null $alias Alias for the route.
     */
    public function __construct(string $path, ?string $alias = null)
    {
        $this->path = $path;
        $this->alias = $alias;

        // Register the route upon initialization
        RouteRegistry::registerRoute($path, $alias);
    }

    /**
     * To get the path.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * To get the alias.
     *
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }
}
