<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface extends ModelRepositoryInterface
{
    public function admins(array $attributes = ['*']);

    public function users(array $attributes = ['*']);
}
