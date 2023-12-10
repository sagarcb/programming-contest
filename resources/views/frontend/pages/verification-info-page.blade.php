@extends('.frontend.layout.main')

@section('page-styling')

@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                @if(session('success'))
                    <h5 class="card-title">{{session('success')}}</h5>
                @endif
                <a href="{{route('home')}}" class="btn btn-primary text-center mt-5">Home</a>
            </div>
        </div>
    </div>
@endsection
