<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/logo_full.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{session('active_contest') ? route('registration') : '#'}}" >Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('noticesList')}}">Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('teamsList')}}">Teams</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
