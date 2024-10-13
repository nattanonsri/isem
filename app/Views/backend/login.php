<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/util.css"> -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css">

<script src="<?= base_url() ?>assets/tilt/tilt.jquery.min.js"></script>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <a href="<?= base_url('login') ?>"><i class="fa-solid fa-arrow-left fs-5"></i></a>
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url() . LIBRARY_PATH . '/icons/icon_isem.png' ?>" style="width: 72%;">
            </div>

            <form id="frmLogin" class="validate-form" style="padding-top: 55px;">
                <?= csrf_field() ?>
                <input type="hidden" name="type" value="<?= lang('backend.super-admin') ?>">
                <span class="login100-form-title fs-4">
                    <?= lang('backend.login-admin') ?>
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid Username is required: exabc">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa-solid fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="button" onclick="btnLogin()" class="login100-form-btn">
                        <?= lang('backend.login') ?>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>

    $('.js-tilt').tilt({
        scale: 1.1
    });


    function btnLogin() {
        let form_data = $('#frmLogin').serialize();

        $.ajax({
            url: '<?= base_url() . 'backend/login_admin' ?>',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        text: ''
                    }).then(function () {
                        location.href = data.url_redirect;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: data.message,
                        text: ''
                    });
                }
            }
        })

    }


</script>

<?= $this->endSection() ?>