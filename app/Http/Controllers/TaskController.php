<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.tasks')->with(['tasks' => $tasks]);
    }

    public function add(Request $request)
    {

        $this->addRules($request->all())->validate();

        Task::create([
            'name'=>$request->name
        ]);
        return redirect()->back()->with(['message' => 'Task created successfully']);

    }
}
