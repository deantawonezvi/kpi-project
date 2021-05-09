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

            Departments            <span>

                    <a href="/department/add" class="btn black white-text float-right mx-1">Add Department</a>

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
                        <th class="font-weight-bold">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{$department->name}}</td>

                            <td>
                                <div class="row">

                                    <div class="col"><a href="/department/{{$department->id}}" class="btn black white-text">View</a></div>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Actions</th>

                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


@endsection
