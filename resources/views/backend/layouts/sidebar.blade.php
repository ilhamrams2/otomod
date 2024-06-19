<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('frontend/img/icon-web/icon.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-light">Otomod.com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/img-profile/' . auth()->user()->image) }}" class="img-circle elevation-2"
                    alt="User Image"style="widht:33px !important; height: 33px !important;object-fit:cover;">
            </div>
            <div class="info my-auto">
                <a href="{{ route('profile') }}" class="d-block text-capitalize">
                    @auth
                        {{ auth()->user()->name }}
                    @endauth
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kategori') }}" class="nav-link {{ $active == 'kategori' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Kategori & Badge
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita') }}" class="nav-link {{ $active == 'berita' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link {{ $active == 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penulis') }}" class="nav-link {{ $active == 'penulis' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Penulis
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pengguna') }}" class="nav-link {{ $active == 'pengguna' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('langganan') }}" class="nav-link {{ $active == 'langganan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Langganan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
