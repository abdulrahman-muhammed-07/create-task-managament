<?php

namespace App\Repositories\Contracts;


interface StatisticRepositoryInterface extends ModelRepositoryInterface
{
    public function topStatistics(int $number);
}
