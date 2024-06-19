<header id="header" class="sticky-top">
    <nav class="navbar navbar-expand-sm" style="background-color: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/img/logo/Logo.svg') }}" alt="Logo" style="height:50px;">
            </a>
            <div class="col-lg-2 d-none d-md-block" id="tanggal" style="color: black; text-align: right;"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <nav class="navbar navbar-expand-sm bg-warning py-1 d-flex justify-content-around"
        style="min-height: 48px !important;">
        <div class="container">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    @foreach ($kategories as $kategori)
                        <li class="nav-item text-capitalize">
                            <a class="nav-link text-white"
                                href="{{ route('kategori.view', $kategori->kategori) }}">{{ $kategori->kategori }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <ul class="navbar-nav col-auto ms-auto">
                <div class="row m-0 p-0">
                    @auth
                        <div class="col-auto px-3 m-auto position-relative">
                            <div class="left-line"
                                style="position: absolute; left:0px; background-color:white; width: 3px; height: 48px; top: -12px;">
                            </div>
                            <div class="right-line"
                                style="position: absolute; right:0px; background-color:white; width: 3px; height: 48px; top: -12px;">
                            </div>
                            <div class="dropdown">

                                <i class="fas fa-search text-white" id="SearchDropDown" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>

                                <ul class="dropdown-menu position-absolute px-1 py-1" style="width: 300px; left: -250px"
                                    aria-labelledby="SearchDropDown">
                                    <form action="{{ route('berita.search') }}" method="GET" class="p-3">
                                        <div class="input-group">
                                            <input type="text" name="query" class="form-control"
                                                placeholder="Cari berita...">
                                            <button class="btn btn-warning" type="submit">
                                                <i class="fas fa-search text-white"></i>
                                            </button>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto py-0 pe-0 dropdown px-2 position-relative">
                            <img class="img-fluid bg-light img-rounded-circle dropdown-toggle"
                                src="{{ asset('storage/img-profile/' . $users->image) }}" alt=""
                                style="object-fit: cover; object-position: center; width: 35px; height: 35px; border-radius: 50%;"
                                id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <ul class="dropdown-menu dropdown-menu-end position-absolute" aria-labelledby="profileDropdown">
                                @if ($users->role_id == 1)
                                    <li>
                                        <a class="dropdown-item text-capitalize" href="{{ route('dashboard') }}">
                                            <i class="fas fa-user-shield me-2" style="color: #b9b9b9"></i>Dashboard
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item text-capitalize" href="{{ route('profile.view') }}">
                                        <i class="fas fa-user me-2" style="color: #b9b9b9"></i>{{ $users->name }}
                                    </a>
                                </li>
                                @if ($users->status_id == 1)
                                    <li>
                                        <a class="dropdown-item text-capitalize">
                                            <i class="fas fa-crown me-2"
                                                style="color: #b9b9b9"></i>{{ $users->status->status_name }}
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item text-capitalize">
                                            <i class="fas fa-crown text-warning me-2"></i>{{ $users->status->status_name }}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2" style="color: #b9b9b9"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="col-auto px-3 m-auto position-relative">
                            <div class="left-line"
                                style="position: absolute; left:0px; background-color:white; width: 3px; height: 48px; top: -12px;">
                            </div>
                            <div class="right-line"
                                style="position: absolute; right:0px; background-color:white; width: 3px; height: 48px; top: -12px;">
                            </div>
                            <div class="dropdown">

                                <i class="fas fa-search text-white" id="SearchDropDown" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>

                                <ul class="dropdown-menu dropdown-menu-end position-absolute" style="width: 300px;"
                                    aria-labelledby="SearchDropDown">
                                    <center><span class="text-center text-uppercase">Silahkan Login Untuk mencari
                                            berita</span></center>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto py-0 pe-0 dropdown m-auto position-relative">
                            <i class="fas fa-user me-2 text-white" style="cursor: pointer; font-size: 20px;"
                                id="profileDropdowns" data-bs-toggle="dropdown" aria-expanded="false">
                            </i>
                            <ul class="dropdown-menu dropdown-menu-end position-absolute"
                                aria-labelledby="profileDropdowns">
                                <li>
                                    <a class="dropdown-item text-capitalize" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-2" style="color: #b9b9b9"></i>Log-in
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-capitalize" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-2" style="color: #b9b9b9"></i>Daftar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </ul>
        </div>
    </nav>
</header>
