<!DOCTYPE html>
<html>
<head>
  @include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('admin.layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('contentHeader')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    @if( session('status') )
    <div class="alert alert-dismissible alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('status') }}
    </div>
    @endif

    @section('mainContent')
    @show

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2
    </div>
    <strong>YouDecide &copy; </strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

@include('admin.layouts.footer')
</body>
</html>
