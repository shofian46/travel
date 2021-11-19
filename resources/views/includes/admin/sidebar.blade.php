<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-plane-departure"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Travel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('dashboard') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Route::is('travel-package*') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('travel-package.index') }}">
            <i class="fas fa-fw fa-suitcase-rolling"></i>
            <span>Package Travel</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Route::is('gallery*') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="far fa-fw fa-images"></i>
            <span>Gallery</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Route::is('transaction*') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Transactions</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
