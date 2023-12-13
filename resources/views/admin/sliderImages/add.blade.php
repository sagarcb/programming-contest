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
                        <li class="breadcrumb-item active"><a href="{{route('sliderImage.add')}}">Add</a></li>
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
                        <form action="{{route('sliderImage.add')}}" method="post" id="heroSliderForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group">
                                            <label for="image">Slider Image</label>
                                            <input type="file" name="image[]" class="form-control" id="image" placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button class="increaseBtn" style="margin-top: 81%" type="button"><i class="fas fa-plus"></i></button>
                                    </div>
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
                    image: {
                        required: true
                    }
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
            $(document).on('click', '.increaseBtn', function () {
                const appendElement = `
                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group">
                                            <input type="file" name="image[]" class="form-control" id="image">
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button class="minusBtn" type="button"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                `

                $('.card-body').append(appendElement);
            });

            $(document).on('click', '.minusBtn', function () {
                $(this).parent().parent().remove()
            })
        })
    </script>
@endsection
