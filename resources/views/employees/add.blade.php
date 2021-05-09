@extends('layouts.app')

@section('content')
    <hr>
    <div>

        <h3>
<span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-02-21-151229/theme/demo2/dist/../src/media/svg/icons/Communication/Group.svg--><svg
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
            Add Employee
        </h3>
    </div>
    <br>
    <br>
    <div class="">
        <form action="/employees/add" method="POST">

            @csrf

            <div class="card">

                <div class="card-body">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <span data-jam="alert" data-fill="#fff"></span>
                                {{ session('message') }}
                            </div>
                        @elseif (session()->has('errormessage'))
                            <div class="alert alert-danger">
                                <span data-jam="alert" data-fill="#fff"></span>
                                {{ session('errormessage') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Employee Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter employee name" required/>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Employee Department:</label>
                            <input type="text" class="form-control" name="user_name"
                                   placeholder="Enter employee username" required/>
                            @if ($errors->has('user_name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Temporary Password:</label>
                            <input type="text" class="form-control" name="temp_password"
                                   placeholder="Temp Password" disabled value="{{$temp_password}}" required/>
                            @if ($errors->has('temp_password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('temp_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Employee Role:</label>
                            <select class="form-control" name="role" id="role"  required>
                                <option value="Employee" selected>Employee</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label>Department</label>

                            <select class="form-control" name="department" id="department" >
                                <option value="option_select" disabled selected>Select Department</option>
                                @foreach($departments as $department)
                                    <option name="category" value="{{$department->name}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>


@endsection
