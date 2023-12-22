@extends('.admin.layout.main')

@section('page-library-css')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

<style>
    @media print {
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table ul {
            list-style-type: none;
            display: block; /* Ensures each list item is on a new line */
        }
        table img {
            display: block; /* Ensures images are not hidden */
            max-width: 100%; /* Adjusts image size for print */
        }
    }
</style>

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
                            <button class="btn btn-info" id="printBtn" hidden>Print</button>
                            <table id="teamsTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="no-print">ID</th>
                                    <th>Team name</th>
                                    <th>University Name</th>
                                    <th>Coach Name</th>
                                    <th>Coach Email</th>
                                    <th>Coach Number</th>
                                    <th>Members Name</th>
                                    <th>Members Emails</th>
                                    <th>Members Images</th>
                                    <th class="no-print">Email Verification Status</th>
                                    <th class="no-print">Payment Status</th>
                                    <th class="no-print">Admin Approval</th>
                                    <th class="no-print">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td class="no-print">{{$team->id}}</td>
                                        <td>{{$team->team_name}}</td>
                                        <td>{{$team->university_name}}</td>
                                        <td>{{$team->coach_name}}</td>
                                        <td>{{$team->coach_email}}</td>
                                        <td>{{$team->coach_mobile_number}}</td>
                                        <td>
                                            <ul>
                                                @foreach($team->members as $member)
                                                    <li>{{$member->name}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach($team->members as $member)
                                                    <li>{{$member->email}}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach($team->members as $member)
                                                    <li>
                                                        <img src="{{asset($member->image)}}" style="margin-bottom: 2px" width="50px" alt="">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="no-print">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input customSwitch3 emailApproval" id="emailApproval{{$team->id}}" data-id="{{$team->id}}" {{$team->email_verified ? 'checked' : ''}} disabled>
                                                    <label class="custom-control-label" for="emailApproval{{$team->id}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="no-print">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input customSwitch3 paymentStatus" id="paymentStatus{{$team->id}}" data-id="{{$team->id}}" {{$team->payment_status ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="paymentStatus{{$team->id}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="no-print">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input customSwitch3 adminApproval" id="adminApproval{{$team->id}}" data-id="{{$team->id}}" {{$team->admin_approved ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="adminApproval{{$team->id}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="no-print">
                                            <div class="d-flex">
                                                <a href="{{route('team.edit', $team->id)}}" class="btn btn-warning mr-1"><i class="fa fa-edit"></i></a>
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
            $('#teamsTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Teams List',
                        exportOptions: {
                            // Specify columns to include. Adjust the indexes as needed.
                            columns: [1, 2, 3, 4, 5, 6, 7] // Example: includes first four columns
                        },
                        customize: function (win) {
                            // Use a timeout to delay the closing
                            setTimeout(function () {
                                win.close();
                            }, 5000);
                        }
                    }
                ],
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: false, // Set this to false
                scrollX: true, // Enable horizontal scrolling
                columnDefs: [],
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

            $('.paymentStatus').on('change', function () {
                const id = $(this).data('id');
                const value = $(this).is(':checked');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url:  '/admin/team/payment-status/update/' + id,
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
