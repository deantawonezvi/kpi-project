<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.tasks')->with(['tasks' => $tasks]);
    }

    public function addIndex()
    {
        $users = User::all();

        return view('tasks.add')->with(['users' => $users]);
    }

    public function add(Request $request)
    {

        //$this->addRules($request->all())->validate();

        Task::create([
            'name'                     => $request->name,
            'employee_id'              => $request->employee_id,
            'expected_completion_time' => $request->expected_completion_time,
            'expected_output'          => $request->expected_output,
            'importance'               => $request->importance,
            'cost'                     => $request->cost,
            'task_expiry'              => 0,
            'supervisor'               => \Auth::user()->id,
            'assigned_date'            => Carbon::now(),

        ]);
        return redirect()->back()->with(['message' => 'Task created successfully']);

    }

    private function addRules(array $data)
    {
        return Validator::make($data, [
            'name'                     => 'required|string|max:255',
            'expected_completion_time' => 'required|numeric|max:255',
            'expected_output'          => 'required|numeric|max:255',
            'importance'               => 'required|numeric|max:255',
            'cost'                     => 'required|numeric|max:255',
        ]);


    }

}
