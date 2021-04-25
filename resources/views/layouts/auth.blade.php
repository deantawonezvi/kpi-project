<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bs-enhance.css') }}">
    <style>
        .login.login-2 .form{-webkit-box-shadow:0 0 80px 0 rgba(77,84,124,.09);box-shadow:0 0 80px 0 rgba(77,84,124,.09)}.login.login-2 .login-forgot,.login.login-2 .login-signin,.login.login-2 .login-signup{width:100%;display:none}.login.login-2.login-signin-on .login-signup{display:none}.login.login-2.login-signin-on .login-signin{display:block}.login.login-2.login-signin-on .login-forgot{display:none}.login.login-2.login-signup-on .login-signup{display:block}.login.login-2.login-signup-on .login-signin{display:none}.login.login-2.login-signup-on .login-forgot{display:none}.login.login-2.login-forgot-on .login-signup{display:none}.login.login-2.login-forgot-on .login-signin{display:none}.login.login-2.login-forgot-on .login-forgot{display:block}
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
<div class="">

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
