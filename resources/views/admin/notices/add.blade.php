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
                    <h1 class="m-0">Add Notice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('notices')}}">Notices</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('notices.add')}}">Add</a></li>
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
                        <form action="{{route('notices.create')}}" method="post" id="noticeForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="noticeTitle">Notice Title</label>
                                    <input type="text" name="title" class="form-control" id="noticeTitle" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="noticeDescription">Notice Description</label>
                                    <textarea id="noticeDescription" name="description"></textarea>
                                    <span id="descriptionErrorSpan" class="error invalid-feedback" style="display: none"></span>
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
            // Summernote
            $('#noticeDescription').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            })

            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }

            $('#noticeForm').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255
                    },
                    noticeDescription: {
                        required: true
                    }
                },
                message: {
                    title: {
                        required: "Title field is required"
                    },
                    noticeDescription: {
                        required: "Description field is required"
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
                },
                submitHandler: function(form) {
                    // Get Summernote content
                    var summernoteContent = $('#noticeDescription').summernote('code');

                    // Perform validation on Summernote content
                    if (!summernoteContent || summernoteContent.trim() === '') {
                        // If validation fails (empty content), display an error
                        $('#descriptionErrorSpan').text('Description Field is required!')
                        $('#descriptionErrorSpan').show();
                    } else {
                        $('#descriptionErrorSpan').text('')
                        $('#descriptionErrorSpan').hide()
                        form.submit();
                    }
                }
            })
        })
    </script>
@endsection
