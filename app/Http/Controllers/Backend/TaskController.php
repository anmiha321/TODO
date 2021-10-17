<?php

namespace App\Http\Controllers\Backend;

use App\Filters\QueryFilter;
use App\Filters\TaskFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskEditRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Expectation;

class TaskController extends Controller
{

    public function index(TaskFilter $filter)
    {
        $tasks = Task::with('user')->with('userAdmin')->filter($filter)->get();
        $users = User::all();
        return view('tasks.index', compact('tasks', 'users'));
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(TaskCreateRequest $request)
    {
        Task::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'endDate' => $request['endDate'],
            'priority' => $request['priority'],
            'status' => $request['status'],
            'responsible_user' => $request['responsible_user'],
            'creator_user' => Auth()->user()->id,

        ]);

        return redirect()->route('tasks.index')->with('message', 'Задача успешно создана!');
    }


    public function show()
    {

    }


    public function edit(Task $tasks)
    {
        return view('tasks.edit', compact('tasks'));
    }


    public function update(TaskEditRequest $request, Task $task)
    {
        $task->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'endDate' => $request['endDate'],
            'priority' => $request['priority'],
            'status' => $request['status'],
            'responsible_user' => $request['responsible_user'],
            'creator_user' => $request['creator_user'],
        ]);
        return redirect()->route('tasks.index')->with('message', 'Задача успешно обновлена!');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('message', 'Удаление прошло успешно!');
    }
}
