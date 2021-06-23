<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskOutput;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskOutputController extends Controller
{
    public function addOutput(Request $request)
    {

        $task_output = TaskOutput::whereTaskId($request->task_id)
            ->whereOutputValue($request->output_value)
            ->first();

        if ($task_output) {
            return array(
                'code'        => '01',
                'description' => 'Task output already exists'
            );
        }

        $task = Task::find($request->task_id);

        if ($task->actual_output == ($task->expected_output - 1)) {
            $task->completed_date = Carbon::now();
            $task->status = 'COMPLETE';
            $diff = Carbon::parse($task->started_date)->diffInHours(Carbon::now());

            $task->actual_completion_time = $diff;
        }


        TaskOutput::create([
            'output_type'  => 'Production',
            'output_value' => $request->output_value,
            'task_id'      => $request->task_id
        ]);

        $task->actual_output++;
        $task->save();


        return array('code'        => '00',
                     'description' => 'Success');

    }
}
