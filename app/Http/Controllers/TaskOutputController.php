<?php

namespace App\Http\Controllers;

use App\Models\TaskOutput;
use Illuminate\Http\Request;

class TaskOutputController extends Controller
{
    public function addOutput(Request $request)
    {

        TaskOutput::create([
            'output_type'  => 'Production',
            'output_value' => $request->output_value,
            'task_id'      => $request->task_id
        ]);

        return array('code'        => '00',
                     'description' => 'Success');

    }
}
