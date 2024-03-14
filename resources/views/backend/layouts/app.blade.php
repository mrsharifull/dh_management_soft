<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title', 'Dashboard') - {{__('White Market Platform')}} </title>

  <!-- Favicon -->
  <link rel="icon" href="">
  
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  @stack('css_link')
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">

<!-- ./wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  @include('backend.includes.nav')
  <!-- /.navbar -->

  <!-- /.Sidebar -->
  @include('backend.includes.sidebar')
   <!-- /.Sidebar -->

  <!-- Content Wrapper Start -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('backend.includes.breadcrumb')
      <!-- /.content-header -->

      <!-- Main content -->
      @yield('content')
      <!-- /.content -->
  </div>
  <!-- Content Wrapper End -->

  <!-- Main Footer Start -->
  @include('backend.includes.footer')
  <!-- Main Footer Start -->
</div>
<!-- ./wrapper -->

<!-- Control Sidebar -->
@include('backend.includes.left_slide')
<!-- /.control-sidebar -->

@stack('js_link')
@stack('js')
</body>
</html>

