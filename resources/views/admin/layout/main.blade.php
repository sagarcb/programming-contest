@include('.admin.layout.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('.admin.layout.header-navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   @include('.admin.layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('.admin.layout.footer')
</div>
<!-- ./wrapper -->
@include('.admin.layout.footer-resources')
