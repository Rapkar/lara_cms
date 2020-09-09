@include('admin.partials.header')
<body class="hold-transition sidebar-mini layout-fixed">
  @include('notify::messages')
  @notifyJs
@include('admin.partials.menu',$user)
@include('admin.partials.sidebar',$user)
@yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
  <!-- Control Sidebar -->
@extends('admin.partials.footer')