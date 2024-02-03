<?php

namespace App\Repositories\Contracts;

interface ModelRepositoryInterface
{
    public function getAll();

    public function store(array $data);

    public function find(int $id);

    public function update(int $id, array $data);

    public function destroy(int $id);

    public function withRelations(array $relations);
}
