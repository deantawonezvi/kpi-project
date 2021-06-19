@extends('layouts.app')

@section('content')
    <hr>
    <div>

        <h3>
                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-02-21-151229/theme/demo2/dist/../src/media/svg/icons/Food/Two-bottles.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                        d="M11,12 L2,12 L2,11 C2,9.34314575 3.34314575,8 5,8 L8,8 C9.65685425,8 11,9.34314575 11,11 L11,12 Z M11,14 L11,20 C11,20.5522847 10.5522847,21 10,21 L3,21 C2.44771525,21 2,20.5522847 2,20 L2,14 L11,14 Z"
                        fill="#000000"/>
                    <path
                        d="M22,12 L13,12 L13,11 C13,9.34314575 14.3431458,8 16,8 L19,8 C20.6568542,8 22,9.34314575 22,11 L22,12 Z M22,14 L22,20 C22,20.5522847 21.5522847,21 21,21 L14,21 C13.4477153,21 13,20.5522847 13,20 L13,14 L22,14 Z M5,3 L8,3 C8.55228475,3 9,3.44771525 9,4 L9,5 C9,5.55228475 8.55228475,6 8,6 L5,6 C4.44771525,6 4,5.55228475 4,5 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M16,3 L19,3 C19.5522847,3 20,3.44771525 20,4 L20,5 C20,5.55228475 19.5522847,6 19,6 L16,6 C15.4477153,6 15,5.55228475 15,5 L15,4 C15,3.44771525 15.4477153,3 16,3 Z"
                        fill="#000000" opacity="0.3"/>
                </g>
                        </svg><!--end::Svg Icon--></span>
            Add Task
        </h3>
    </div>
    <br>
    <br>
    <div class="">
        <form action="/task/add" method="POST">

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
                        <div class="col-lg-12">
                            <label>Task Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter task name" required/>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Assigned To:</label>
                            <select class="form-control" name="employee_id" required>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Expected Completion Time(HRS):</label>
                            <input type="text" class="form-control" name="expected_completion_time" placeholder="Enter expected completion time" required/>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Expected Output(UNITS):</label>
                            <input type="text" class="form-control" name="expected_output" placeholder="Enter expected units" required/>

                            @if ($errors->has('expected_output'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('expected_output') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Importance:</label>
                            <select class="form-control" name="importance" required>
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>
                            </select>

                        </div>
                        <div class="col-lg-6">
                            <label>Cost:</label>
                            <input type="number" class="form-control" name="cost" placeholder="Cost" required/>

                            @if ($errors->has('cost'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Assigned Date:</label>
                            <input type="date" name="assigned_date" class="form-control" required>
                            @if ($errors->has('assigned_date'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('assigned_date') }}</strong>
                                    </span>
                            @endif

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
