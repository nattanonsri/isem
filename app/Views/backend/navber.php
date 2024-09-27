<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" role="button" id="btnDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small"><?= $admin['fullname'] ?></span>
                <i class="fa-solid fa-chevron-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="btnDropdown" style="max-width: 200px;">
                <a class="dropdown-item" href="<?= base_url() . 'backend/login' ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <?= lang('backend.logout') ?>
                </a>
            </div>

        </li>
    </ul>
</nav>

<style>
    .dropdown-menu {
        left: -55px !important;
    }

    @media screen and (max-width: 992px) {
        .dropdown-menu {
            left: 65px !important;
        }
    }
</style>

<script>
    // $(document).ready(function () {
    //     $('#dropdownMenuButton').dropdown('toggle');
    // });
</script>