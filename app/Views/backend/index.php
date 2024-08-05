<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?= view('backend/sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <?= view('backend/navber'); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid item-content" id="sidebar-dashboard">

                <div id="content-dashboard" data-aos="fade-up"></div>

            </div>

            <div class="container-fluid item-content d-none" id="sidebar-admin">

                <div id="content-admin" data-aos="fade-up"></div>


            </div>
            <div class="container-fluid item-content d-none" id="sidebar-users">

                <div id="content-users" data-aos="fade-up"></div>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <!-- <span>Copyright &copy; Your Website 2021</span> -->
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
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