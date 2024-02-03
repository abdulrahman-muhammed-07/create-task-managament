<?php

namespace App\Http\Controllers;

use App\Jobs\StatisticsJob;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class TaskController extends Controller
{
    public function __construct(protected TaskRepositoryInterface $taskRepository, protected UserRepositoryInterface $userRepository)
    {
        //
    }

    public function index()
    {
        $tasks = $this->taskRepository->withRelations(['assignedTo:id,name', 'assignedBy:id,name'])->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users  = $this->userRepository->users(['id', 'name']);
        $admins = $this->userRepository->admins(['id', 'name']);
        return view('tasks.create', compact('users', 'admins'));
    }

    public function store(TaskRequest $request)
    {
        $this->taskRepository->store($request->validated());
        StatisticsJob::dispatch($request->validated()['assigned_to_id']);
        return redirect()->route('tasks.index');
    }
}
