
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{--Toastr--}}
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>

{{--Page library scripts import--}}
@yield('page-library-scripts')

<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

{{--Page custom scripts--}}
@yield('page-custom-scripts')

</body>
</html>
