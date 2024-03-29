<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
{{--        <a class="navbar-brand brand-logo" href="index.html">--}}
{{--            <img src="{{ asset('assets/admin/assets/images/logo.svg') }}" alt="logo" /> </a>--}}
{{--        <a class="navbar-brand brand-logo-mini" href="index.html">--}}
{{--            <img src="{{ asset('assets/admin/assets/images/logo-mini.svg') }}" alt="logo" /> </a>--}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Search Here">
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset($data->image) }}" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                </div>
            </li>
        </ul>
    </div>
</nav>
