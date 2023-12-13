@extends('.frontend.layout.main')

@section('content')
    <!-- Hero Section -->
    <div class="container">
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
            </div>
        </div>
        <section class="hero-slider">
            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($heroSliders as $key=>$row)
                        @if($key == 0)
                            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide {{$key}}"></button>
                        @else
                            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key}}"></button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($heroSliders as $key=>$row)
                        @if($key == 0)
                            <div class="carousel-item active">
                                <img src="{{asset($row->slider_image)}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$row->slider_title}}</h5>
                                    <p>{{$row->slider_description}}</p>
                                    <a href="{{$row->slider_button_url}}" class="btn btn-primary"><i class="fas fa-user-plus"></i>{{$row->slider_button_text}}</a>
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{asset($row->slider_image)}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$row->slider_title}}</h5>
                                    <p>{{$row->slider_description}}</p>
                                    <a href="{{$row->slider_button_url}}" class="btn btn-primary"><i class="fas fa-user-plus"></i>{{$row->slider_button_text}}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>

    <!-- Description section -->
    <div class="container">
        @if($contest)
        <section class="description-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="px-4 py-2 my-2 text-center">
                        <div class="description-content">
                            <div class="description-icon d-block mx-auto mb-1">
                                <i class="bi bi-chat-quote"></i>
                            </div>
                            <h1 class="display-5 fw-bold text-body-emphasis">{{$contest->title}}</h1>
                            <div class="col-lg-6 mx-auto">
                                <p class="lead mb-4">{{$contest->description}}</p>
                                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                    <a href="{{route('registration')}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endif
    </div>

    {{--Image slider section--}}
    <section class="image-slider-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <h2 class="card-title">Image Gallery</h2>
                            <div id="image-slider" class="splide">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach($imageGallery as $image)
                                            <li class="splide__slide">
                                                <img src="{{Storage::url($image->image)}}" height="100" width="150">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
