<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
    </div>
    <div>
        <a class="navbar-brand brand-logo" href="">
            <img src="{{ asset('img/admin.png' ) }}" class="card-img-top" alt="...">
        </a>
        <a class="navbar-brand brand-logo-mini" href="">
            <img src="{{ asset('img/admin.png' ) }}" class="card-img-top" alt="...">
        </a>
    </div>
</div>
<div class="navbar-menu-wrapper d-flex align-items-top">
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">{{ Auth::user()->nama }}</span></h1>
            <h3 class="welcome-sub-text">Good Luck and Have a nice day. </h3>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->nama }}</a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">

                    <p class="mb-1 mt-3 font-weight-semibold"> {{ Auth::user()->nama }}</p>
                    <p class="fw-light text-muted mb-0"> {{ Auth::user()->email }}</p>
                </div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                </a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
    </button>
</div>