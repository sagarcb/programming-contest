@extends('.admin.layout.main')

@section('page-library-css')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contests</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('contests')}}">Contests</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Display success message -->
                    @if(session('success'))
                        <script>
                            $(function() {
                                toastr.success('{{ session('success') }}', 'Success!');
                            });
                        </script>
                    @endif
                    @if(session('error'))
                        <script>
                            $(function() {toastr.error('{{ session('error') }}', 'Error!');});
                        </script>
                    @endif
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Contests List</h3>
                        </div>
                        <div class="card-body">
                            <table id="ContestTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Banner</th>
                                    <th>Active Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contests as $contest)
                                    <tr>
                                        <td>{{$contest->id}}</td>
                                        <td>{{$contest->title}}</td>
                                        <td>{{$contest->description}}</td>
                                        <td><img src="{{asset($contest->banner)}}" width="100px" alt=""></td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" data-id="{{$contest->id}}" id="customSwitch3" {{$contest->active_status ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="customSwitch3">Status</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('contest.edit', $contest->id)}}" class="btn btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('contest.delete', $contest->id)}}"
                                                      onsubmit="return confirm('Are you sure you want to delete this information?');"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-library-scripts')
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection

@section('page-custom-scripts')
    <script>
        $(function () {
            $('#ContestTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "columnDefs": [
                    { "width": "20px", "targets": 0 },
                    { "width": "200px", "targets": 1 },
                    { "width": "100px", "targets": 3 },
                    { "width": "20px", "targets": 4 },
                    { "width": "50px", "targets": 5 },
                ]
            });

            $('#customSwitch3').on('change', function () {
                let id = $(this).data('id');
               $.ajax({
                   type: 'get',
                   url: '/admin/contest/change-status/'+id,
                   contentType: false,
                   processData: false,
                   success: function (response) {
                       if (response.status) {
                           toastr.success(response.msg, 'Success!');
                       }else {
                           toastr.error(response.msg, 'Error!');
                       }
                   },
                   error: function (error) {
                       console.error(error)
                   }
               })
            });
        });
    </script>
@endsection
