<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  
  @include('layouts.navbar')

  <!-- Main Sidebar Container -->
  
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

</body>
</html>
