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
            {{$employee->name}} - {{ucfirst($employee->role)}}
            <span>
                 @if($employee->status == 1)

                    <span class="right">
                        <button class="btn amber white-text mx-1" data-toggle="modal" data-target="#blockModal">
                            <span data-jam="shield-close" data-fill="#fff"></span>
                            Block User
                        </button>
                    </span>

                @else

                    <span class="right">
                        <button class="btn green white-text mx-1" data-toggle="modal" data-target="#activateModal">
                            <span data-jam="shield-check" data-fill="#fff"></span>
                            Activate
                        </button>
                    </span>

                @endif

                    <span class="right">
                        <button class="btn btn-danger mx-1" data-toggle="modal" data-target="#deleteModal">
                            <span data-jam="trash" data-fill="#fff"></span>
                            Delete User
                        </button>
                    </span>



                     <span class="right">
                         <button class="btn btn-success mx-1" data-toggle="modal" data-target="#passwordModal">
                             <span data-jam="key" data-fill="#fff"></span>
                             Reset PIN
                         </button>
                     </span>

            </span>

        </h3>

        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordModalLabel">CONFIRM PIN RESET</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to reset {{$employee->name}} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/employees/update-pin" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$employee->id}}">
                            <span class="right"><button class="btn btn-success" type="submit"><span data-jam="key"
                                                                                                    data-fill="#fff"></span> Reset PIN</button></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">CONFIRM USER DELETION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{$employee->name}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/employees/delete" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$employee->id}}">
                            <span class="right"><button class="btn btn-danger" type="submit"><span data-jam="trash"
                                                                                                   data-fill="#fff"></span> Delete User</button></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-labelledby="blockModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">BLOCK USER</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to BLOCK {{$employee->name}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/employees/block" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$employee->id}}">
                            <span class="right"><button class="btn amber white-text" type="submit"><span data-jam="shield-close"
                                                                                                         data-fill="#fff"></span> Block User</button></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="activateModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">ACTIVATE USER</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to ACTIVATE {{$employee->name}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/employees/activate" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$employee->id}}">
                            <span class="right"><button class="btn green white-text" type="submit"><span data-jam="shield-check"
                                                                                                         data-fill="#fff"></span> Activate User</button></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        Employee Details
                    </div>

                    <div class="col-md-4" style="color: red;">
                        <b>Last Login Date: {{$employee->lastLoginAt()}}</b>
                    </div>

                    <div class="col-md-4" style="color: red;">
                        <b>Last Login IP: {{$employee->lastLoginIp()}}</b>
                    </div>
                </div>

            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Employee Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$employee->name}}" readonly/>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="user_name" value="{{$employee->user_name}}" readonly/>

                        @if ($errors->has('user_name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="row" style="margin-bottom: 30px">
                    <div class="col-md-6">
                        <label>Employee Role:</label>
                        <input type="text" class="form-control" name="role" value="{{$employee->role}}" readonly/>

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

            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <h4>

                        </h4>
                    </div>
                    <div class="col-md-6">
                        <h4>

                        </h4>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

