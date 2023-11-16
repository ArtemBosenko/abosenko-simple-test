<?php

namespace App\Entity;

/**
 * Interface for Entity.
 */
interface EntityInterface
{
    /**
     * Create a new user.
     *
     * @param  array $data Data to create.
     * @return void
     */
    public function create(array $data): void;

    /**
     * To read data.
     *
     * @param  int $id User id.
     * @return mixed
     */
    public function read(int $id): mixed;

    /**
     * To update user data..
     *
     * @param  int   $id   User id.
     * @param  array $data Data to update.
     * @return void
     */
    public function update(int $id, array $data): void;

    /**
     * To delete user.
     *
     * @param  int $id User id.
     * @return void
     */
    public function delete(int $id): void;
}
