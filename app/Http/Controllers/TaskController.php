<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use App\Models\TaskOutput;
use App\Models\User;
use App\Services\SmsService;
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
    public function taskIndex($id)
    {
        $task = Task::find($id);
        $task_outputs = TaskOutput::whereTaskId($task->id)->get();
        $task_employee = User::find($task->employee_id);
        $task['employee'] = $task_employee;
        $task['outputs'] = $task_outputs;

       // return [$task];

        return view('tasks.task')->with(['task' => $task]);
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

        $selected_user = User::find($request->employee_id);
        SmsService::sendSMSOtp("263" . substr($selected_user->mobile, -9),'Task: '.$request->name.' has been assigned to you.');

        return redirect()->back()->with(['message' => 'Task created successfully']);

    }

    public function getUserTasks(Request $request)
    {

        $tasks = Task::whereEmployeeId($request->user_id)
            ->where('status', '!=', 'DONE')
            ->get();

        foreach ($tasks as $task){

            $task_outputs = TaskOutput::whereTaskId($task->id)->get();
            $task['outputs'] = $task_outputs;

        }

        return array('code'        => '00',
                     'description' => 'Success',
                     'tasks'       => $tasks);

    }

    public function acceptTask(Request $request){

        $task = Task::find($request->task_id);

        $task->started_date = Carbon::now();
        $task->status = 'ACCEPTED';

        $task->save();
        return array('code'        => '00',
                     'description' => 'Success');



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
