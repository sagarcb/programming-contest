@extends('.frontend.layout.main')

@section('page-styling')
    <style>
        /* Custom styles for the form */
        .form-title {
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .form-section {
            padding: 20px;
            margin-bottom: 30px;
        }
        .coach-info {
            padding: 25px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .coach-info .form-group {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('error')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{$error}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <h2 class="text-center form-title">Contest Registration Form</h2>
        <form action="{{route('registration')}}" method="post" enctype="multipart/form-data" id="registrationForm">
            @csrf
            <!-- Coach Info Section -->
            <div class="row form-section">
                <div class="col-md-6 offset-md-3">
                    <div class="coach-info">
                        <h4 class="mb-4 text-center">Team Info</h4>
                        <div class="form-group">
                            <input type="text" name="team_name" class="form-control" placeholder="Team Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="university_name" class="form-control" placeholder="University Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="coach_name" class="form-control" placeholder="Coach Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="coach_email" class="form-control" placeholder="Coach Email">
                        </div>
                        <div class="form-group">
                            <input type="number" name="coach_mobile_number" class="form-control" placeholder="Coach Mobile Number">
                        </div>
                        <div class="form-group">
                            <select name="coach_tshirt_size" id="" class="form-control">
                                <option value="" selected>Select T-shirt Size...</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Member Info Section -->
            <div class="row form-section">
                <div class="col-md-4">
                    <div class="coach-info">
                        <h4 class="mb-4 text-center">Member 1 Info</h4>
                        <div class="form-group">
                            <input type="text" name="team_info[0][name]" class="form-control" placeholder="Member Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="team_info[0][email]" class="form-control" placeholder="Member Email">
                        </div>
                        <div class="form-group">
                            <select name="team_info[0][tshirt_size]" id="" class="form-control">
                                <option value="" selected>Select T-shirt Size...</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="team_info[0][image]" accept="image/*" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="coach-info">
                        <h4 class="mb-4 text-center">Member 2 Info</h4>
                        <div class="form-group">
                            <input type="text" name="team_info[1][name]" class="form-control" placeholder="Member Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="team_info[1][email]" class="form-control" placeholder="Member Email">
                        </div>
                        <div class="form-group">
                            <select name="team_info[1][tshirt_size]" id="" class="form-control">
                                <option value="" selected>Select T-shirt Size...</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="team_info[1][image]" accept="image/*" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="coach-info">
                        <h4 class="mb-4 text-center">Member 3 Info</h4>
                        <div class="form-group">
                            <input type="text" name="team_info[2][name]" class="form-control" placeholder="Member Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="team_info[2][email]" class="form-control" placeholder="Member Email">
                        </div>
                        <div class="form-group">
                            <select name="team_info[2][tshirt_size]" id="" class="form-control">
                                <option value="" selected>Select T-shirt Size...</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="team_info[2][image]" accept="image/*" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-section">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary w-50">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('page-scripts')
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        $(function (){
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
                    'team_info[2][tshirt_size]': {required: true},
                    'team_info[0][image]': {required: true},
                    'team_info[1][image]': {required: true},
                    'team_info[2][image]': {required: true},
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
