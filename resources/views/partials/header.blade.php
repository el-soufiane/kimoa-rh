<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- Logo -->
            <a class="navbar-brand" href="dashboard.html">
                <b class="logo-icon">
                    <img style=" width: 100px; height: auto;" src="{{asset('dashboard-asset/plugins/images/logo_kimoasoft.png')}}" alt="homepage" />
                </b>
                <span class="logo-text">
                    {{-- <img  src="{{asset('dashboard-asset/plugins/images/logo-text.png')}}" alt="homepage" /> --}}
                    
                </span>
            </a>
            <!-- Toggle and nav items -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <!-- Search -->
                <li class="in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>

                <!-- User profile and logout -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle profile-pic" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('dashboard-asset/plugins/images/users/varun.jpg')}}" alt="user-img" width="36">
                        <span class="text-white font-medium">
                            @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
