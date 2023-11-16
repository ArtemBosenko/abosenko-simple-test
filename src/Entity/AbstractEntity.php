<?php

namespace App\Entity;

/**
 * Class AbstractEntity.
 */
abstract class AbstractEntity
{
    /**
     * User id.
     *
     * @var int
     */
    private int $id;

    /**
     * Get user id.
     *
     * @return int The user id.
     */
    public function getId(): int
    {
        return $this->id;
    }
}
