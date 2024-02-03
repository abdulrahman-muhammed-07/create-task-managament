<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use App\Repositories\DataBase\TaskRepository;

class TaskTest extends TestCase
{
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new TaskRepository(new Task());
    }

    public function test_can_get_list_of_tasks()
    {
        $tasksDataBase = Task::factory()->count(3)->create()->count();

        $tasks = $this->repository->getAll();

        $this->assertEquals($tasksDataBase, count($tasks));
    }

    public function test_can_get_task_by_id()
    {
        Task::factory()->count(3)->create(['title' => 'John Doe']);

        $task = $this->repository->find(1)->title;

        $this->assertEquals('John Doe', $task);
    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
