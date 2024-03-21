<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', 'Dashboard') - {{ __('Domain Hosting Management Software') }} </title>
    <link rel="icon" href="">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-5.3.2/css/bootstrap.min.css') }}">

    @stack('css_link')
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('css')
</head>

<body class="hold-transition sidebar-mini">


    <div class="wrapper">
        @auth
            @include('admin.includes.nav')
            @include('admin.includes.sidebar')
            <div class="content-wrapper">
        @endauth
                @yield('content')
        @auth
            </div>
            @include('admin.includes.footer')
        @endauth
    </div>


    {{-- Jquery  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- Bootstrap --}}
    <script src="{{ asset('plugins/bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>

    @stack('js_link')
    @stack('js')
</body>

</html>
