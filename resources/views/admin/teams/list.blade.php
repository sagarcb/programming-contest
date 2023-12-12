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
                    <h1 class="m-0">Teams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('teams')}}">Teams</a></li>
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
                            <h3 class="card-title">Teams List</h3>
                        </div>
                        <div class="card-body">
                            <table id="noticesTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Team name</th>
                                    <th>University Name</th>
                                    <th>Coach Name</th>
                                    <th>Coach Email</th>
                                    <th>Coach Number</th>
                                    <th>Members Name</th>
                                    <th>Members Emails</th>
                                    <th>Members Images</th>
                                    <th>Email Verification Status</th>
                                    <th>Admin Approval</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->id}}</td>
                                        <td>{{$team->team_name}}</td>
                                        <td>{{$team->university_name}}</td>
                                        <td>{{$team->coach_name}}</td>
                                        <td>{{$team->coach_email}}</td>
                                        <td>{{$team->coach_mobile_number}}</td>
                                        <td>
                                            <ul style="list-style-type: none">
                                                @foreach($team->members as $member)
                                                    <li>{{$member->name}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul style="list-style-type: none">
                                                @foreach($team->members as $member)
                                                    <li>{{$member->email}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul style="list-style-type: none">
                                                @foreach($team->members as $member)
                                                    <li>
                                                        <img src="{{asset($member->image)}}" width="50px" alt="">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input customSwitch3 emailApproval" id="emailApproval{{$team->id}}" data-id="{{$team->id}}" {{$team->email_verified ? 'checked' : ''}} disabled>
                                                    <label class="custom-control-label" for="emailApproval{{$team->id}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input customSwitch3 adminApproval" id="adminApproval{{$team->id}}" data-id="{{$team->id}}" {{$team->admin_approved ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="adminApproval{{$team->id}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{route('team.delete', $team->id)}}"
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
            $('#noticesTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": false, // Set this to false
                "scrollX": true, // Enable horizontal scrolling
                "columnDefs": [

                ]
            });

            function toggleOverlay() {
                $('#overlay').toggle();
            }

            $('.adminApproval').on('change', function () {
                const id = $(this).data('id');
                const value = $(this).is(':checked');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url:  '/admin/team/approve/' + id,
                    data: {
                      value: value
                    },
                    beforeSend: function() {
                        toggleOverlay(); // Enable overlay before the request
                    },
                    success: function (response) {
                        if (response.status) {
                            toastr.success(response.msg, 'Success!');
                        }else {
                            toastr.error(response.msg, 'Error!');
                        }
                    },
                    error: function (error) {
                        console.error(error)
                    },
                    complete: function() {
                        toggleOverlay(); // Disable overlay after the response
                    },
                })
            });

        });
    </script>
@endsection
