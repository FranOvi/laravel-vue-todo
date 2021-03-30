<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function get()
    {
        $tasks = Task::get();
        return response()->json($tasks, 200);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|max:500',
            'is_completed' => 'boolean',
        ]);

        $task = Task::create($validatedData);
        return response()->json($task, 201);
    }
    
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'task' => 'required|max:500',
            'is_completed' => 'boolean',
        ]);

        $task->task = $validatedData['task'];
        $task->is_completed = $validatedData['is_completed'];
        $task->save();

        return response()->json($task, 200);
    }

    public function delete(Task $task)
    {
        $task->delete();
        return response()->json("Succesfully deleted", 200);
    }
}
