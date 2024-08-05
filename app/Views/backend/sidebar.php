<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(LIBRARY_PATH . '/icons/icon_isem.png') ?>" width="36">

        </div>
        <div class="sidebar-brand-text mt-3 mx-3 fs-3">ISEM</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item sidebar-backend-item active" data-target="#sidebar-dashboard">
        <a class="nav-link" role="button" id="sideber-dashboard-table">
            <i class="fa-solid fa-gauge-high fs-6"></i>
            <span class="fs-6">Dashboard</span>
        </a>
    </li>

    <li class="nav-item sidebar-backend-item" data-target="#sidebar-admin">
        <a class="nav-link" role="button" id="sideber-admin-table">
            <i class="fa-solid fa-user fs-6"></i>
            <span class="fs-6">ข้อมูลผู้ลงทะเบียน</span>
        </a>
    </li>

    <li class="nav-item sidebar-backend-item" data-target="#sidebar-users">
        <a class="nav-link" role="button" id="sideber-users-table">
        <i class="fa-solid fa-person-cane fs-6"></i>
            <span class="fs-6">ข้อมูลผู้สูงอายุ</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>