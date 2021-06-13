<?php

namespace App\Http\Controllers;

use App\Models\AuthorisedCashier;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $departments = Department::all();
        return view('employees.add')->with(['temp_password' => rand(1000, 9999), 'departments' => $departments]);
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

        //return $request->all();
        $this->addRules($request->all())->validate();


        $temp_password = $request->temp_password;

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'department' => $request->department,
            'type'       => $request->type,
            'password'   => bcrypt($request->temp_password),
            'status'     => true
        ]);

        return redirect()->back()->with(['message' => 'Employee created successfully with temporary password: ' . $temp_password]);

    }

    public function remoteLogin(Request $request)
    {

        $credentials = ['email' => $request->input('email'),'password' => $request->input('password')];
        $authorised = Auth::validate($credentials);

        if ($authorised) {
            $user = User::whereEmail($request->email)->first();

            return array('code'        => '00',
                         'description' => 'Success',
                         'user'        => $user);
        }

        return array('code'        => '01',
                     'description' => 'Invalid Credentials');


    }

    private function loginRules(array $data)
    {
        return Validator::make($data, [
            'email'      => 'required|unique:users',
            'password'       => 'required|string',
        ]);


    }
    private function addRules(array $data)
    {
        return Validator::make($data, [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|unique:users',
            'type'       => 'required|string',
            'department' => 'required|string'
        ]);


    }


}
