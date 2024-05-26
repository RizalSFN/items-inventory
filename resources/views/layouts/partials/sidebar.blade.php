<nav class="sb-sidenav accordion sticky-top sb-sidenav-light bg-white" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav px-3">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link rounded {{ $title == 'Dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Data Master</div>
            <a class="nav-link rounded {{ $title == 'Data barang' ? 'active' : '' }}" href="{{ route('data-barang') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-box"></i></div>
                Data Item
            </a>
            <a class="nav-link rounded mt-2 {{ $title == 'Riwayat' ? 'active' : '' }}" href="{{ route('riwayat') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-clock-history"></i></div>
                History
            </a>
            <div class="sb-sidenav-menu-heading">Setting</div>
            <a class="nav-link rounded {{ $title == 'Profil' ? 'active' : '' }}" href="{{ route('profil') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-person"></i></div>
                Profil
            </a>
        </div>
    </div>
</nav>
