@extends('layouts.app')

@section('content')
    <hr>
    <div>

        <h3>
                    <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/keen/releases/2021-02-21-151229/theme/demo2/dist/../src/media/svg/icons/Shopping/Chart-bar1.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                    <path
                        d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                        fill="#000000" fill-rule="nonzero"/>
                    <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                </g>
                        </svg>  </span>
            Reports            <span>


            </span>

        </h3>
    </div>
    <br>
    <br>
    <div class="">
        <div class="card">
            <div class="card-body">
                <table id="example" class="display table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Role</th>
                        <th class="font-weight-bold">Department</th>
                        <th class="font-weight-bold">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->type}}</td>
                            <td>{{$employee->department}}</td>
                            <td>
                                <div class="row">

                                    <div class="col"><a href="/reports/{{$employee->id}}" class="btn black white-text">View Employee KPI Report</a></div>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Role</th>
                        <th class="font-weight-bold">Department</th>
                        <th class="font-weight-bold">Actions</th>

                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


@endsection
