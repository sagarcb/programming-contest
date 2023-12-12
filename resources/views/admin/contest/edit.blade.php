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
                    <h1 class="m-0">Edit Contest Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('contests')}}">Contests</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('contest.edit', $contest->id)}}">Edit</a></li>
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
                        <form action="{{route('contest.edit', $contest->id)}}" method="post" id="contestForm" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="contestTitle">Contest Title</label>
                                    <input type="text" name="title" class="form-control" id="contestTitle" placeholder="Enter Title" value="{{$contest->title}}">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="contestImage">Contest Banner Image</label>
                                            <input type="file" name="banner" class="form-control" id="contestImage" accept="image/*">
                                        </div>
                                        <div class="col-4">
                                            @if($contest->banner)
                                                <img class="w-50" src="{{asset("$contest->banner")}}" alt="">
                                            @else
                                                <p class="text-center">No Banner Added</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="contestDescription">Contest Description</label>
                                    <textarea id="contestDescription" name="description" class="form-control">{{$contest->description}}</textarea>
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
            $('#contestForm').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255
                    },
                    description: {
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
        })
    </script>
@endsection
