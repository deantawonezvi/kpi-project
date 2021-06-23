<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskOutput;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        $employees = User::all();

        return view('reports.reports')->with(['employees' => $employees]);
    }


    public function employeeIndex($id)
    {
        $employee = User::find($id);

        $tasks_this_hour = Task::whereBetween('created_at', [
            now()->format('Y-m-d H:00:00'),
            now()->addHours(1)
                ->format('Y-m-d H:00:00')
        ])->whereEmployeeId($id)
            ->get();
        $hour_ids = $tasks_this_hour->where('id', '>', 0)->pluck('id')->toArray();


        $task_outputs_hour =
            TaskOutput::whereBetween('created_at', [
                now()->format('Y-m-d H:00:00'),
                now()->addHours(1)->format('Y-m-d H:00:00')
            ])->whereIn('task_id', $hour_ids)
                ->get();


        $tasks_today = Task::whereDate('created_at', Carbon::today())
            ->whereEmployeeId($id)
            ->get();

        $day_ids = $tasks_today->where('id', '>', 0)->pluck('id')->toArray();

        $task_outputs_today = TaskOutput::whereDate('created_at', Carbon::today())
            ->whereIn('task_id', $day_ids)
            ->get();


        $tasks_this_month = Task::whereMonth('created_at', Carbon::now()->month)
            ->whereEmployeeId($id)
            ->get();

        $month_ids = $tasks_this_month->where('id', '>', 0)->pluck('id')->toArray();

        $task_outputs_month = TaskOutput::whereMonth('created_at', Carbon::now()->month)
            ->whereIn('task_id', $month_ids)
            ->get();

        $completed_tasks_month = $tasks_this_month->where('status', 'COMPLETED')->count();
        $completed_tasks_day = $tasks_today->where('status', 'COMPLETED')->count();
        $completed_tasks_hour = $tasks_this_hour->where('status', 'COMPLETED')->count();

        $fastest_completion_time = $tasks_this_month->min('actual_completion_time');
        $average_completion_time = $tasks_this_month->avg('actual_completion_time');
        $highest_output = $tasks_this_month->max('actual_output');
        $total_output = $tasks_this_month->sum('actual_output');
        $expected_output = $tasks_this_month->sum('expected_output');
        $average_output = $tasks_this_month->avg('actual_output');

        $stats = [
            'completed_month'  => $completed_tasks_month,
            'tasks_this_month' => $tasks_this_month->count(),
            'completed_day'    => $completed_tasks_day,
            'tasks_today'      => $tasks_today->count(),
            'tasks_hour'       => $tasks_this_hour->count(),
            'completed_hour'   => $completed_tasks_hour,
            'outputs_hour'     => $task_outputs_hour->count(),
            'outputs_day'      => $task_outputs_today->count(),
            'outputs_month'    => $task_outputs_month->count(),
            'expected_output'  => $expected_output,
            'total_output'     => $total_output,
            'highest_output'   => $highest_output,
            'average_output'   => $average_output,
            'average_time'     => $average_completion_time,
            'fastest_time'     => $fastest_completion_time,
        ];


        //return [$average_output];


        return view('reports.report')->with(['employee' => $employee, 'stats' => $stats]);
    }
}
