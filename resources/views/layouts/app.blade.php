<!DOCTYPE html>
<html>
<head>
 @yield('app.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    @include('layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @yield('app.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('app.content')
  <!-- /.content-wrapper -->

  @include('layouts.footer')



<!-- yeild script -->
@yield('app.script')
<!-- end yeild script -->

</body>
</html>
