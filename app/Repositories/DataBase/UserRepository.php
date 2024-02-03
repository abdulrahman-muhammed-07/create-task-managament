<?php

namespace App\Repositories\DataBase;


use App\Models\User;
use App\Repositories\DataBase\ModelRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends ModelRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function admins(array $attributes = ['*'])
    {
        return $this->model->where('type', '=', User::ADMIN)->get($attributes);
    }

    public function users(array $attributes = ['*'])
    {
        return cache()->remember('users', 86400, fn () =>  User::where('type', '=', User::USER)->get($attributes));
    }
}
