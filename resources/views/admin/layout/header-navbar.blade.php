<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('admin/')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="nav-link" data-widget="navbar-search" href="{{route('logout')}}" role="button"
                   onclick="event.preventDefault();
                   this.closest('form').submit();"
                >
                    <i class="fa fa-sign-out"></i>Logout
                </a>
            </form>

        </li>
    </ul>
</nav>
