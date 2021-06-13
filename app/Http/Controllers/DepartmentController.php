<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('department.departments')->with(['departments' => $departments]);
    }

    public function addIndex()
    {
        return view('department.add');
    }

    public function add(Request $request)
    {

        $this->addRules($request->all())->validate();

        Department::create([
           'name'=>$request->name
        ]);
        return redirect()->back()->with(['message' => 'Department created successfully']);

    }


    private function addRules(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|string|max:255',
        ]);


    }



}
