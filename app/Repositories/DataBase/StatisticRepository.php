<?php

namespace App\Repositories\DataBase;


use App\Models\Statistic;
use App\Repositories\DataBase\ModelRepository;
use App\Repositories\Contracts\StatisticRepositoryInterface;

class StatisticRepository extends ModelRepository implements StatisticRepositoryInterface
{
    public function __construct(Statistic $model)
    {
        parent::__construct($model);
    }

    public function topStatistics(int $number)
    {
        return $this->model->orderByDesc('task_count')->limit($number)->get();
    }
}
