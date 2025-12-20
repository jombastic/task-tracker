<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = $request->user()
            ->tasks()
            ->with('category')
            ->orderBy('completed_at')
            ->orderBy('due_date')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = $request->user()
            ->categories()
            ->orderBy('name')
            ->get();

        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $request->user()->tasks()->create($request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tasks created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task, Request $request)
    {
        $categories = $request->user()
            ->categories()
            ->orderBy('name')
            ->get();

        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
