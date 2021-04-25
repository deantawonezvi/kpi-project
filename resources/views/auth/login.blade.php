@extends('layouts.auth')

@section('content')

    <div class="container login mt-10">
        <div class="row justify-content-center my-auto">
            <div class="col-md-6">
                <h1 class="text-center">KPI's (Schweppes)</h1>
                <div class="d-flex justify-content-center">
                    <img class="center img-fluid" style="width: 250px" src="{{asset('img/szl-logo.png')}}" alt="">
                </div>

                <hr>
                <div class="card card-large card-body white shadow-1">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <span data-jam="alert" data-fill="#fff"></span>
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <span data-jam="alert" data-fill="#fff"></span>
                            {{ session('error') }}
                        </div>
                    @endif

                    <br>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-md-12">
                                <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                                <input id="email" type="email" placeholder="Enter your email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-solid h-auto py-4 border-0 rounded-lg font-size-h6" name="email"
                                       value="{{ old('email') }}" required autofocus autocomplete="off">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                <input id="password" type="password" placeholder="Enter your password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-solid h-auto py-4 border-0 rounded-lg font-size-h6"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn black white-text btn-block px-8 py-4">
                                    Login
                                </button>
                            </div>


                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
