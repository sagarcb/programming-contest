@extends('.admin.layout.main')

@section('page-custom-css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Team</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('notices')}}">Teams</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('notice.edit', $team->id)}}">Edit</a></li>
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
                    <!-- Display validation errors -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <script>
                                $(function() {toastr.error('{{ $error }}', 'Error!');});
                            </script>
                        @endforeach
                    @endif
                    @if(session('error'))
                        <script>
                            $(function() {toastr.error('{{ session('error') }}', 'Error!');});
                        </script>
                    @endif
                </div>
                <div class="col-12">
                    <div class="card">
                        <form action="{{route('team.edit', $team->id)}}" method="post" id="registrationForm" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="teamName">Team Name</label>
                                    <input type="text" name="team_name" class="form-control" id="teamName" placeholder="Enter Team Name" value="{{$team->team_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="university_name">University Name</label>
                                    <input type="text" name="university_name" class="form-control" id="university_name" placeholder="Enter University Name" value="{{$team->university_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="coach_name">Coach Name</label>
                                    <input type="text" name="coach_name" class="form-control" id="coach_name" placeholder="Enter Coach Name" value="{{$team->coach_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="coach_email">Coach Email</label>
                                    <input type="email" name="coach_email" class="form-control" id="coach_email" placeholder="Enter Coach Name" value="{{$team->coach_email}}">
                                </div>
                                <div class="form-group">
                                    <label for="coach_mobile_number">Coach Mobile Number</label>
                                    <input type="number" name="coach_mobile_number" class="form-control" id="coach_mobile_number" placeholder="Enter Coach Mobile Number" value="{{$team->coach_mobile_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="coach_tshirt_size">Select Coach T-shirt Size</label>
                                    <select name="coach_tshirt_size" id="coach_tshirt_size" class="form-control">
                                        <option value="">Select T-shirt Size</option>
                                        <option value="S" {{$team->coach_tshirt_size == 'S' ? 'selected' : ''}}>S</option>
                                        <option value="M" {{$team->coach_tshirt_size == 'M' ? 'selected' : ''}}>M</option>
                                        <option value="L" {{$team->coach_tshirt_size == 'L' ? 'selected' : ''}}>L</option>
                                        <option value="XL" {{$team->coach_tshirt_size == 'XL' ? 'selected' : ''}}>XL</option>
                                        <option value="XXL" {{$team->coach_tshirt_size == 'XXL' ? 'selected' : ''}}>XXL</option>
                                    </select>
                                </div>
                                <p>Member infos</p>
                                <div class="row">
                                    @foreach($team->members as $key => $member)
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="name{{$key}}">Member Name</label>
                                                <input type="text" name="name[]" class="form-control" id="name{{$key}}" placeholder="Enter Member Name" value="{{$member->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email{{$key}}">Member Email</label>
                                                <input type="email" name="email[]" class="form-control" id="email{{$key}}" placeholder="Enter Member Email" value="{{$member->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tshirt_size{{$key}}">Select Coach T-shirt Size</label>
                                                <select name="tshirt_size[]" id="tshirt_size{{$key}}" class="form-control">
                                                    <option value="">Select T-shirt Size</option>
                                                    <option value="S" {{$member->tshirt_size == 'S' ? 'selected' : ''}}>S</option>
                                                    <option value="M" {{$member->tshirt_size == 'M' ? 'selected' : ''}}>M</option>
                                                    <option value="L" {{$member->tshirt_size == 'L' ? 'selected' : ''}}>L</option>
                                                    <option value="XL" {{$member->tshirt_size == 'XL' ? 'selected' : ''}}>XL</option>
                                                    <option value="XXL" {{$member->tshirt_size == 'XXL' ? 'selected' : ''}}>XXL</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="image{{$key}}">Member Image</label>
                                                        <input type="file" name="image[]" class="form-control" id="image{{$key}}" accept="image/*">
                                                    </div>
                                                    <div class="col-4">
                                                        @if(file_exists(\Illuminate\Support\Facades\Storage::disk('public')->exists(str_replace('/storage/', '', $member->image))))
                                                            <img src="{{asset($member->image)}}" style="width: 100%" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-custom-scripts')
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        $(function () {

            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }

            $('#registrationForm').validate({
                rules: {
                    team_name: {required: true, maxlength: 255},
                    university_name: {required: true},
                    coach_name: {required: true},
                    coach_email: {required: true},
                    coach_mobile_number: {required: true},
                    coach_tshirt_size: {required: true},
                    'team_info[0][name]': {required: true},
                    'team_info[1][name]': {required: true},
                    'team_info[2][name]': {required: true},
                    'team_info[0][email]': {required: true, email: true},
                    'team_info[1][email]': {required: true, email: true},
                    'team_info[2][email]': {required: true, email: true},
                    'team_info[0][tshirt_size]': {required: true},
                    'team_info[1][tshirt_size]': {required: true},
                    'team_info[2][tshirt_size]': {required: true}
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            })
        })
    </script>
@endsection
