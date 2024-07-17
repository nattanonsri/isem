<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card " style="border-radius: 1rem;" data-aos="fade-up" data-aos-anchor=".other-element">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-5 text-uppercase"><?= lang('profile.login') ?></h2>
                            <form id="loginfrm" method="POST">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="username">
                                    <label for="username"><?= lang('profile.username') ?></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="password">
                                    <label for="password"><?= lang('profile.password') ?></label>
                                </div>
                                <div class="form-check mb-4 text-start">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label"
                                        for="rememberMe"><?= lang('profile.remember-me') ?></label>
                                </div>
                                <!-- <p class="small mb-5"><a class="text-dark-50" href="#!">Forgot password?</a></p> -->
                                <button class="btn btn-primary btn-lg px-5"
                                    type="submit"><?= lang('profile.login') ?></button>
                            </form>
                        </div>
                        <div>
                            <p class="mb-0"><?= lang("profile.dont'have-an-account") ?><a
                                    href="<?= base_url('/register') ?>"
                                    class="fw-bold ms-1"><?= lang('profile.sign-up') ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<script>

    $(document).ready(function () {

        $('#username').on('input', function() {
        var value = $(this).val();
        if (/[^a-zA-Z]/.test(value)) {
            $(this).val(value.replace(/[^a-zA-Z]/g, ''));
        }
    });
        $('#loginfrm').on('submit', function (event) {
            event.preventDefault(); // ป้องกันการโหลดหน้าใหม่

            var formData = $(this).serialize();
            var rememberMe = $('#rememberMe').is(':checked');


            formData += '&rememberMe=' + (rememberMe ? 'on' : 'off');

            $.ajax({
                url: '<?= base_url('login') ?>',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ล็อกอินสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.href = '<?= base_url('profile'); ?>';
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'เกิดข้อผิดพลาด',
                            text: response.message
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