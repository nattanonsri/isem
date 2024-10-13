<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<section class="d-flex align-items-center py-4 vh-100" >
    <main class="form-signin w-100 m-auto">
        <form class="text-center" id="loginfrm">
        <?= csrf_field() ?>
            <img class="mb-4" src="<?= base_url() . LIBRARY_PATH. '/icons/icon_isem.png' ?>"width="72">
            <h1 class="fs-3 mb-3"><?= lang('profile.login') ?></h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="username" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g,'')">
                <label for="username"><?= lang('profile.username') ?></label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <label for="password"><?= lang('profile.password') ?></label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    <?= lang('profile.remember-me') ?>
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit"><?= lang('profile.login') ?></button>
            <p class="border-top pt-2 mt-5 mb-3"><a class="text-decoration-none" href="<?= base_url() . 'backend/login' ?>">สำหรับผู้ดูแลระบบ</a></p>
        </form>
    </main>
</section>

<style>
    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<script>

    $(document).ready(function () {

        // $('#username').on('input', function () {
        //     var value = $(this).val();
        //     if (/[^a-zA-Z]/.test(value)) {
        //         $(this).val(value.replace(/[^a-zA-Z0-9]/g, ''));
        //     }
        // });
        $('#loginfrm').on('submit', function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var rememberMe = $('#rememberMe').is(':checked');


            formData += '&rememberMe=' + (rememberMe ? 'on' : 'off');

            $.ajax({
                url: '<?= base_url('login') ?>',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            text:''
                        }).then(function () {
                            window.location.href = data.url_redirect;
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'เกิดข้อผิดพลาด',
                            text: data.message
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: xhr.responseText
                    });
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>