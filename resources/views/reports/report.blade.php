<?php
use Carbon\Carbon;

?>
@extends('layouts.app')

@section('content')
    <hr>
    <div>

        <h3>
            <span class="svg-icon svg-icon-primary">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-02-21-151229/theme/demo2/dist/../src/media/svg/icons/Communication/Group.svg-->
                <svg
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
                </svg>
                <!--end::Svg Icon-->
            </span>
            KPI Report
            ({{$employee->name}} - {{ucfirst($employee->type)}})

        </h3>
    <br>
    <br>
    <div class="">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <span data-jam="alert" data-fill="#fff"></span>
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="card">
            <div class="card-header black white-text">
                <div class="row">
                    <div class="col-md-4">
                        Employee Details
                    </div>
                </div>

            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Employee Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$employee->name}}" />

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>Department:</label>
                        <input type="text" class="form-control" name="user_name" value="{{$employee->department}}" />

                        @if ($errors->has('department'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="row" style="margin-bottom: 30px">
                    <div class="col-md-6">
                        <label>Employee Role:</label>
                        <input type="text" class="form-control" name="role" value="{{$employee->type}}" />

                        @if ($errors->has('role'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>Status:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="status"
                            value=@if($employee->status==1){{$value="Active"}}@elseif($employee->status==0){{$value="Deactivated"}}@endif
                                readonly/>

                        @if ($errors->has('status'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

            </div>

        </div>
        <br>
        <div class="card">
            <div class="card-header black white-text">
                <div class="row">
                    <div class="col-md-4">
                        Key Performance Indicators (Tasks)
                    </div>
                </div>

            </div>


            <div class="card-body">
                <table>
                    <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tasks this hour</td>
                        <td>{{$stats['tasks_hour']}}</td>
                    </tr>
                    <tr>
                        <td>Tasks today</td>
                        <td>{{$stats['tasks_today']}}</td>
                    </tr>
                    <tr>
                        <td>Tasks this month(Completed/Expected)</td>
                        <td>{{$stats['completed_month']}}/{{$stats['tasks_this_month']}}</td>
                    </tr>
                    </tbody>
                </table>


            </div>

        </div>
        <br>
        <div class="card">
            <div class="card-header black white-text">
                <div class="row">
                    <div class="col-md-4">
                        Key Performance Indicators (Outputs)
                    </div>
                </div>

            </div>


            <div class="card-body">
                <table>
                    <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Outputs this hour</td>
                        <td>{{$stats['outputs_hour']}}</td>
                    </tr>
                    <tr>
                        <td>Outputs today</td>
                        <td>{{$stats['outputs_day']}}</td>
                    </tr>
                    <tr>
                        <td>Outputs this month(Completed/Expected)</td>
                        <td>{{$stats['outputs_month']}}/{{$stats['expected_output']}}</td>
                    </tr>
                    <tr>
                        <td>Highest output this month</td>
                        <td>{{$stats['highest_output']}}</td>
                    </tr>
                    <tr>
                        <td>Average output this month</td>
                        <td>{{$stats['average_output']}}</td>
                    </tr>
                    </tbody>
                </table>


            </div>

        </div>
        <br>
        <div class="card">
            <div class="card-header black white-text">
                <div class="row">
                    <div class="col-md-4">
                        Key Performance Indicators (Completion Time)
                    </div>
                </div>

            </div>


            <div class="card-body">
                <table>
                    <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Average Completion Time(Hrs)</td>
                        <td>{{$stats['average_time']}}</td>
                    </tr>
                    <tr>
                        <td>Fastest Completion Time(Hrs)</td>
                        <td>{{$stats['fastest_time']}}</td>
                    </tr>
                    </tbody>
                </table>


            </div>

        </div>
    </div>


@endsection

