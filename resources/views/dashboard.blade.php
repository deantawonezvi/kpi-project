@extends('layouts.app')

@section('content')
    <div>
        <hr>
        <h2>Dashboard</h2>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="separator separator-solid separator-white opacity-20"></div>
                    <div class="card-body">
                        <h5 class="text-uppercase">
                            <svg style="fill: #0b5ed7"  xmlns="http://www.w3.org/2000/svg" viewBox="-4 -1 24 24" width="24" height="24"
                                 preserveAspectRatio="xMinYMin" class="icon__icon">
                                <path
                                    d="M9 13h2a1 1 0 0 1 0 2H8a1 1 0 0 1-1-1v-4a1 1 0 1 1 2 0v3zM7 5.732V5a1 1 0 1 1 2 0v.732a2 2 0 1 0-2 0zm-2.041.866a4 4 0 1 1 6.082 0A8.002 8.002 0 0 1 8 22 8 8 0 0 1 4.959 6.598zM8 20A6 6 0 1 0 8 8a6 6 0 0 0 0 12z"></path>
                            </svg>
                            This hour
                        </h5>

                        <hr>
                        <br>
                        <div class="row">
                            <div class="col font-weight-bold">
                                Tasks
                            </div>
                            <div class="col font-weight-bold">
                                {{$hour['tasks']}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col font-weight-bold">
                                Task Outputs
                            </div>
                            <div class="col font-weight-bold">
                                {{$hour['task_outputs']}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="separator separator-solid separator-white opacity-20"></div>
                    <div class="card-body">
                        <h5 class="text-uppercase">
                            <svg style="fill: orange"  xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="24" height="24"
                                 preserveAspectRatio="xMinYMin" class="icon__icon">
                                <path
                                    d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-15a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0V1a1 1 0 0 1 1-1zm0 16a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zM1 9h2a1 1 0 1 1 0 2H1a1 1 0 0 1 0-2zm16 0h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm.071-6.071a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM5.757 14.243a1 1 0 0 1 0 1.414L4.343 17.07a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM4.343 2.929l1.414 1.414a1 1 0 0 1-1.414 1.414L2.93 4.343A1 1 0 0 1 4.343 2.93zm11.314 11.314l1.414 1.414a1 1 0 0 1-1.414 1.414l-1.414-1.414a1 1 0 1 1 1.414-1.414z"></path>
                            </svg>
                            Today
                        </h5>

                        <hr>
                        <br>
                        <div class="row">
                            <div class="col font-weight-bold">
                                Tasks
                            </div>
                            <div class="col font-weight-bold">
                                {{$today['tasks']}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col font-weight-bold">
                                Tasks Output
                            </div>
                            <div class="col font-weight-bold">
                                {{$today['task_outputs']}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="separator separator-solid separator-white opacity-20"></div>
                    <div class="card-body">
                        <h5 class="text-uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -3 24 24" width="24" height="24"
                                 preserveAspectRatio="xMinYMin" class="icon__icon">
                                <path
                                    d="M9 2V1a1 1 0 1 1 2 0v1h3V1a1 1 0 0 1 2 0v1h1a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h1V1a1 1 0 1 1 2 0v1h3zm0 2H6v1a1 1 0 1 1-2 0V4H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-1v1a1 1 0 0 1-2 0V4h-3v1a1 1 0 0 1-2 0V4zM3 8h2v2H3V8zm0 4h2v2H3v-2zm12 0h2v2h-2v-2zm0-4h2v2h-2V8zM7 8h2v2H7V8zm4 0h2v2h-2V8zm0 4h2v2h-2v-2zm-4 0h2v2H7v-2z"></path>
                            </svg>
                            This month
                        </h5>

                        <hr>
                        <br>
                        <div class="row">
                            <div class="col font-weight-bold">
                                Tasks
                            </div>
                            <div class="col font-weight-bold">
                                {{$month['tasks']}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col font-weight-bold">
                                Task Outputs
                            </div>
                            <div class="col font-weight-bold">
                                {{$month['task_outputs']}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
