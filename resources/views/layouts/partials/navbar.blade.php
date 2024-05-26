<nav class="sb-topnav navbar navbar-expand navbar-light bg-white">
    <!-- Navbar Brand-->
    <div class="d-flex align-items-center ms-4 me-sm-0 me-md-0 me-lg-5 col-lg-1 ">
        <img src="{{ asset('img/logo-inventory.png') }}" alt="logo-inventory" class="logo">
        <a class="navbar-brand ps-3" href="index.html">Inventory</a>
    </div>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="bi bi-list fs-4 ms-sm-0 ms-md-0 ms-lg-5"></i></button>
    <!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <p class="text-black mt-3 fw-bold d-none d-md-block d-lg-block">{{ auth()->user()->name }}</p>
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle fs-4"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profil') }}">My Profile</a></li>
                <li><a class="dropdown-item mt-1" href="#!" data-bs-toggle="modal"
                        data-bs-target="#logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
{{-- modal logout --}}
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="logoutLabel">Yakin ingin logout?
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="{{ route('logout') }}" class="btn btn-primary col-4 col-lg-3 col-md-3">Ya</a>
                <a href="" class="btn btn-danger ms-3 col-4 col-lg-3 col-md-3" data-bs-dismiss="modal">Tidak</a>
            </div>
        </div>
    </div>
</div>
