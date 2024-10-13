<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() . 'backend' ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(LIBRARY_PATH . '/icons/icon_isem.png') ?>" width="36">
        </div>
        <div class="sidebar-brand-text mt-3 mx-3 fs-3">ISEM</div>
    </a>

    <li class="nav-item sidebar-backend-item active" data-target="#sidebar-dashboard">
        <a class="nav-link" role="button" id="sideber-dashboard-table">
        <i class="fa-solid fa-house fs-6"></i>
            <span class="fs-6"><?= lang('backend.home') ?></span>
        </a>
    </li>

    <li class="nav-item sidebar-backend-item" data-target="#sidebar-officer">
        <a class="nav-link" role="button" id="sideber-admin-table">
            <i class="fa-solid fa-user fs-6"></i>
            <span class="fs-6"><?= lang('backend.officer') ?></span>
        </a>
    </li>

    <li class="nav-item sidebar-backend-item" data-target="#sidebar-users">
        <a class="nav-link" role="button" id="sideber-users-table">
            <i class="fa-solid fa-person-cane fs-6"></i>
            <span class="fs-6"><?= lang('backend.elderly-people') ?></span>
        </a>
    </li>

    <li class="nav-item sidebar-backend-item" data-target="#sidebar-admin">
        <a class="nav-link" role="button" id="sideber-administrator-table">
            <i class="fa-solid fa-user-tie"></i>
            <span class="fs-6"><?= lang('backend.administrator') ?></span>
        </a>
    </li>

    <li class="nav-item sidebar-backend-item" data-target="#sidebar-maps">
        <a class="nav-link" role="button" id="sideber-maps-table">
            <i class="fa-solid fa-location-dot"></i>
            <span class="fs-6"><?= lang('backend.map') ?></span>
        </a>
    </li>
</ul>