<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('libraries/bootstrap-5.3.2/css/bootstrap.min.css')}}">
    <!-- Link to Font Awesome CSS for icons -->
    <link rel="stylesheet" href="{{asset('libraries/fontawesome-6.4.2/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/bootstrap-icons-1.11.1/bootstrap-icons.css')}}">
    {{--Image slider--}}
    <link rel="stylesheet" href="{{asset('libraries/splide-3.6.12/css/splide.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>SUB-IUPC</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset('images/logo_full.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container">
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
                        <a href="#" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://img.freepik.com/premium-photo/illustration-neon-tropical-theme-with-palm-tree-exotic-floral-ai_564714-1270.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://img.freepik.com/premium-photo/illustration-neon-tropical-theme-with-palm-tree-exotic-floral-ai_564714-1270.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
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
    <section class="description-section">
        <div class="row">
            <div class="col-md-12">
                <div class="px-4 py-2 my-2 text-center">
                    <div class="description-content">
                        <div class="description-icon d-block mx-auto mb-1">
                            <i class="bi bi-chat-quote"></i>
                        </div>
                        <h1 class="display-5 fw-bold text-body-emphasis">Inter University Programming Contest 2023</h1>
                        <div class="col-lg-6 mx-auto">
                            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                <a href="#" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
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

{{--Footer Section--}}
<section class="footer-section">
    <div class="b-example-divider"></div>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{asset('images/logo-black.jpg')}}" alt="">
                </a>
                <p class="text-body-secondary">&copy; 2023</p>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
        </footer>
    </div>
</section>



<!-- Link to Bootstrap JS and jQuery -->
<script src="{{asset('libraries/jquery/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('libraries/bootstrap-5.3.2/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('libraries/splide-3.6.12/js/splide.min.js')}}"></script>
<script src="{{asset('libraries/splide-3.6.12/js/splide-extension-auto-scroll.min.js')}}"></script>
<script>
    $(document).ready(() => {
        new Splide('#image-slider', {
            type   : 'loop',
            drag   : 'free',
            focus  : 'center',
            perPage: 3,
            breakpoints: {
                640: {
                    perPage: 1
                }
            },
            autoScroll: {
                speed: 1,
            },
        }).mount(window.splide.Extensions);
    })
</script>
</body>
</html>
