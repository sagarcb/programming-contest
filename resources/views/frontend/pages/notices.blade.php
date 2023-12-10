@extends('.frontend.layout.main')

@section('page-styling')

@endsection

@section('content')
    <div class="container mt-5">
        @foreach($notices as $key => $notice)
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title">{{$key + 1}}. {{$notice->title}}</h4>
                </div>
                <div class="card-body">
                    {!! $notice->description !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
