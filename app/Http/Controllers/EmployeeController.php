<?php

namespace App\Http\Controllers;

use App\Models\AuthorisedCashier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::all();

        return view('employees.employees')->with(['employees' => $employees]);
    }

    public function addIndex()
    {
        return view('employees.add')->with(['temp_password' => rand(1000, 9999)]);
    }

    public function employeeIndex($id)
    {
        $employee = User::find($id);


        return view('employees.employee')->with(['employee' => $employee]);
    }

    public function updatePin(Request $request)
    {
        $employee = User::find($request->user_id);

        $temp_password = rand(1000, 9999);

        $employee->password = bcrypt($temp_password);
        $employee->temporary_password = true;
        $employee->save();
        return redirect()->back()->with(['message' => 'Employee password reset with temporary password: ' . $temp_password]);
    }

    public function deleteUser(Request $request)
    {
        User::find($request->user_id)->delete();

        return redirect()->to('/employees')->with(['message' => 'Employee has been deleted']);
    }
    public function blockUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = false;
        $user->save();

        return redirect()->back()->with(['message' => 'Employee has been blocked']);
    }
    public function activateUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = true;
        $user->save();

        return redirect()->back()->with(['message' => 'Employee has been activated']);
    }


    public function addEmployee(Request $request)
    {
        $this->addRules($request->all())->validate();


        $temp_password = $request->temp_password;

        User::create([
            'name'               => $request->name,
            'user_name'          => $request->user_name,
            'role'               => $request->role,
            'password'           => bcrypt($request->temp_password),
            'status'             => true,
            'temporary_password' => true
        ]);

        return redirect()->back()->with(['message' => 'Employee created successfully with temporary password: ' . $temp_password]);

    }

    private function addRules(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|string|max:255',
            'user_name' => 'required|string|unique:users',
            'role'      => 'required|string',

        ]);


    }


}
