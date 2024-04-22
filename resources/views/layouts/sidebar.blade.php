<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpustakaan Digital</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ ($active === "home") ? 'active' : ''}}">
        <!-- Nav Item - Dashboard -->
        <a class="nav-link" href="/">
            <i class="bi bi-house-door-fill"></i>
            <span>Home</span>
        </a>
    </li>

    <li class="nav-item {{ ($active === "categories") ? 'active' : ''}}">
        <a class="nav-link" href="/categories">
            <i class="bi bi-filter-circle-fill"></i>
            <span>Categori Buku</span></a>
    </li>

    @if(Auth::user()->is_admin == 0)

        <li class="nav-item {{ ($active === "borrows") ? 'active' : ''}}">
            <a class="nav-link" href="/borrows">
                <i class="bi bi-book-fill"></i>
                <span>Pinjaman Saya</span></a>
        </li>

        <li class="nav-item {{ ($active === "reviews") ? 'active' : ''}}">
            <a class="nav-link" href="/reviews">
                <i class="bi bi-chat-left-dots-fill"></i>
                <span>Ulasan Saya</span></a>
        </li>

    @elseif(Auth::user()->is_admin == 1)

        <!-- Dropdown Divider -->
        <div class="dropdown-divider"></div>

        <!-- Nav Item - Create -->
        <li class="nav-item {{ ($active === "create") ? 'active' : ''}}">
            <a class="nav-link" href="/post">
                <i class="fas fa-fw fa-plus"></i>
                <span>Data Buku</span>
            </a>
        </li>

        <!-- Nav Item - data peminjam -->
        <li class="nav-item {{ ($active === "borrowsAdmin") ? 'active' : ''}}">
            <a class="nav-link" href="/borrowsAdmin">
                <i class="bi bi-person-vcard-fill"></i>
                <span>data peminjam</span>
            </a>
        </li>

        <!-- Nav Item - Rekap -->
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="bi bi-arrow-down"></i>
                <span>Rekap</span>
            </a>
        </li>
    @endif

    <!-- Nav Item - Rekap -->
    <li class="nav-item {{ ($active === "profile") ? 'active' : ''}}">
        <a class="nav-link" href="/profile">
            <i class="bi bi-person-fill"></i>
            <span>Profile</span>
        </a>
    </li>

</ul>

