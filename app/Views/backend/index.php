<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div id="wrapper">
    <?= view('backend/sidebar'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?= view('backend/navber'); ?>
            <div class="container-fluid item-content" id="sidebar-dashboard">
                <div id="content-dashboard" data-aos="fade-up"></div>
            </div>
            <div class="container-fluid item-content d-none" id="sidebar-admin">
                <div id="content-admin" data-aos="fade-up"></div>
            </div>
            <div class="container-fluid item-content d-none" id="sidebar-users">
                <div id="content-users" data-aos="fade-up"></div>
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <!-- <span>Copyright &copy; Your Website 2021</span> -->
                </div>
            </div>
        </footer>
    </div>
</div>

<style>
    .fw-500 {
        font-weight: 500;
    }
</style>

<script>

    $(document).ready(function () {
        load_content_dashboard();
        load_content_admin();
        load_content_users();
    });

    $('.sidebar-backend-item').click(function () {
        let tar = $(this).attr('data-target');

        $('.item-content').addClass('d-none');
        $(tar).removeClass('d-none');

        $('.sidebar-backend-item').removeClass('active');
        $(this).addClass('active');
    });


    function load_content_dashboard() {

        $.ajax({
            url: '<?= base_url('backend/load_content_dash') ?>',
            type: 'POST',
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#content-dashboard').html(result);
            }

        });
    }

    function load_content_admin() {
        $.ajax({
            url: '<?= base_url('backend/load_content_admin') ?>',
            type: 'POST',
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#content-admin').html(result);
            }
        });
    }

    function load_content_users() {
        $.ajax({
            url: '<?= base_url('backend/load_content_users') ?>',
            type: 'POST',
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#content-users').html(result);
            }
        });
    }

</script>

<?= $this->endSection() ?>