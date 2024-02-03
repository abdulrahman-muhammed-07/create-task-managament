<?php

namespace App\Repositories\DataBase;


use App\Models\Task;
use App\Repositories\DataBase\ModelRepository;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskRepository extends ModelRepository implements TaskRepositoryInterface
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
}
