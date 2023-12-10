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
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://img.freepik.com/premium-photo/illustration-neon-tropical-theme-with-palm-tree-exotic-floral-ai_564714-1270.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                            <a href="{{$contest ? route('registration') : '#'}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/premium-photo/illustration-neon-tropical-theme-with-palm-tree-exotic-floral-ai_564714-1270.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                            <a href="{{$contest ? route('registration') : '#'}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/premium-photo/illustration-neon-tropical-theme-with-palm-tree-exotic-floral-ai_564714-1270.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                            <a href="{{$contest ? route('registration') : '#'}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                        </div>
                    </div>
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
                                        <li class="splide__slide">
                                            <img src="https://e1.pxfuel.com/desktop-wallpaper/690/964/desktop-wallpaper-tiger-sparks-art-flash-widescreen-high-harimau.jpg" height="100" width="150">
                                        </li>

                                        <li class="splide__slide">
                                            <img src="https://e1.pxfuel.com/desktop-wallpaper/690/964/desktop-wallpaper-tiger-sparks-art-flash-widescreen-high-harimau.jpg" height="100" width="150">
                                        </li>
                                        <li class="splide__slide">
                                            <img src="https://e1.pxfuel.com/desktop-wallpaper/690/964/desktop-wallpaper-tiger-sparks-art-flash-widescreen-high-harimau.jpg" height="100" width="150">
                                        </li>
                                        <li class="splide__slide">
                                            <img src="https://e1.pxfuel.com/desktop-wallpaper/690/964/desktop-wallpaper-tiger-sparks-art-flash-widescreen-high-harimau.jpg" height="100" width="150">
                                        </li>
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
