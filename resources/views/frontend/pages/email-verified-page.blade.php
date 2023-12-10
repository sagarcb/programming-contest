@extends('.frontend.layout.main')

@section('page-styling')

@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            @if(isset($success))
            <div class="card-header">
                <h3 class="card-title text-center text-success">Congratulations!</h3>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">{{$success}}</h5>
                <a href="{{route('home')}}" class="btn btn-primary text-center">Home</a>
            </div>
            @endif

            @if(isset($error))
                <div class="card-header">
                    <h3 class="card-title text-center text-danger">Error!</h3>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{$error}}</h5>
                    <a href="{{route('home')}}" class="btn btn-primary text-center">Home</a>
                </div>
            @endif
        </div>
    </div>
@endsection
