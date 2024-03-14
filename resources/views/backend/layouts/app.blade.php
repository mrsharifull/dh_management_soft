<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title', 'Dashboard') - {{__('Domain Hosting Management Software')}} </title>
  <link rel="icon" href="">
  
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  @stack('css_link')
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">


<div class="wrapper">
  @include('backend.includes.nav')
  @include('backend.includes.sidebar')
  <div class="content-wrapper">
      @yield('content')
  </div>
  @include('backend.includes.footer')
</div>



@stack('js_link')
@stack('js')
</body>
</html>

