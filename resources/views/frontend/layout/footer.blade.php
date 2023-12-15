<section class="footer-section">
    <div class="b-example-divider"></div>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{asset('images/logo-black.jpg')}}" alt="">
                </a>
                <p class="text-body-secondary"><strong>Copyright &copy; 2022-2023 Sumaiya Jahan</strong></p>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Important Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{route('home')}}" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="{{route('registration')}}" class="nav-link p-0 text-body-secondary">Registration</a></li>
                    <li class="nav-item mb-2"><a href="{{route('notices')}}" class="nav-link p-0 text-body-secondary">Notices</a></li>
                    <li class="nav-item mb-2"><a href="{{route('teamsList')}}" class="nav-link p-0 text-body-secondary">Teams</a></li>
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

@yield('page-scripts')

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
