<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use App\Models\TaskOutput;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{

    public function getData()
    {
        $tasks_this_hour = Task::whereBetween('created_at', [
            now()->format('Y-m-d H:00:00'),
            now()->addHours(1)->format('Y-m-d H:00:00')
        ])->get();

        $task_outputs_this_hour = TaskOutput::whereBetween('created_at', [
            now()->format('Y-m-d H:00:00'),
            now()->addHours(1)->format('Y-m-d H:00:00')
        ])->get();

        $tasks_today = Task::whereDate('created_at', Carbon::today())
            ->get();

        $task_outputs_today = TaskOutput::whereDate('created_at', Carbon::today())
            ->get();

        $tasks_outputs_this_month = TaskOutput::whereMonth('created_at', Carbon::now()->month)
            ->get();

        $tasks_this_month = Task::whereMonth('created_at', Carbon::now()->month)
            ->get();

        $departments = Department::all()->count();
        $employees = User::all()->count();

        $data_this_hour = ['tasks'=>$tasks_this_hour->count(),'task_outputs'=>$task_outputs_this_hour->count()];
        $data_today = ['tasks'=>$tasks_today->count(),'task_outputs'=>$task_outputs_today->count()];
        $data_this_month = ['tasks'=>$tasks_this_month->count(),'task_outputs'=>$tasks_outputs_this_month->count()];
        $system_data = ['employees' => $employees, 'departments' => $departments];

        return view('dashboard')->with(['hour'=>$data_this_hour,'today'=>$data_today,'month'=>$data_this_month,'system'=>$system_data]);


    }
}
