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
                    <h1 class="m-0">Add Hero Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('heroSliders')}}">Hero Sliders List</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('heroSliderAdd')}}">Add</a></li>
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
                <div class="col-8">
                    <div class="card">
                        <form action="{{route('heroSliderAdd')}}" method="post" id="heroSliderForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slider_title">Title</label>
                                    <input type="text" name="slider_title" class="form-control" id="slider_title" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="slider_description">Description</label>
                                    <textarea name="slider_description" class="form-control" id="slider_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="slider_button_text">Button text</label>
                                    <input type="text" name="slider_button_text" class="form-control" id="slider_button_text" placeholder="Enter Button Text">
                                </div>
                                <div class="form-group">
                                    <label for="slider_button_url">Button Url</label>
                                    <input type="text" name="slider_button_url" class="form-control" id="slider_button_url" placeholder="Enter Button URL">
                                </div>
                                <div class="form-group">
                                    <label for="slider_image">Slider Image</label>
                                    <input type="file" name="slider_image" class="form-control" id="slider_image">
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
            $('#heroSliderForm').validate({
                rules: {
                    slider_title: {
                        required: true,
                        maxlength: 255
                    },
                    slider_button_text: {
                        required: true,
                        maxlength: 20
                    },
                    slider_button_url: {
                        required: true
                    },
                    slider_image: {
                        required: true
                    },
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
                }
            })
        })
    </script>
@endsection
