<!-- <div class="d-none d-sm-block"> -->
<div class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 1rem;" data-aos="fade-up"
                    data-aos-anchor=".other-element">
                    <div class="card-body p-5 ">
                        <h2 class="fw-bold mb-5 text-capitalize"><?= lang('profile.register-from') ?></h2>
                        <form id="register" method="POST">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="fname" id="fname"
                                            placeholder="<?= lang('profile.fname') ?>" required>
                                        <label for="fname"><?= lang('profile.fname') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="lname" id="lname"
                                            placeholder="<?= lang('profile.lname') ?>" required>
                                        <label for="lname"><?= lang('profile.lname') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-4">
                                        <input type="date" class="form-control" name="birthday" id="birthday"
                                            placeholder="<?= lang('profile.birthday') ?>" required>
                                        <label for="birthday"><?= lang('profile.birthday') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-4">
                                    <h6 class="mb-2 pb-1"><?= lang('profile.gender') ?>: </h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                            value="<?= lang('profile.man') ?>" checked />
                                        <label class="form-check-label"
                                            for="femaleGender"><?= lang('profile.man') ?></label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                            value="<?= lang('profile.female') ?>" />
                                        <label class="form-check-label"
                                            for="maleGender"><?= lang('profile.female') ?></label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                            value="<?= lang('profile.other') ?>" />
                                        <label class="form-check-label"
                                            for="otherGender"><?= lang('profile.other') ?></label>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="<?= lang('profile.phone') ?>" required>
                                        <label for="phone"><?= lang('profile.phone') ?></label>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="<?= lang('profile.username') ?>" required>
                                        <label for="username"><?= lang('profile.username') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="<?= lang('profile.password') ?>" required>
                                        <label for="password"><?= lang('profile.password') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="repeat_password"
                                            id="repeat_password" placeholder="<?= lang('profile.repeat-password') ?>"
                                            required>
                                        <label for="repeat_password"><?= lang('profile.repeat-password') ?></label>
                                    </div>
                                </div>

                                <!-- <div class="col-12 mb-4 d-none d-sm-block">
                                    <span class="fs-6 fst-normal">- มีความยาวอย่างน้อย 8 ตัวอักษร</span><br>
                                    <span class="fs-6 fst-normal">- ประกอบด้วยตัวเลขอย่างน้อย 1 ตัว</span><br>
                                    <span class="fs-6 fst-normal">- ประกอบด้วยตัวอักษรพิมพ์ใหญ่อย่างน้อย 1
                                        ตัว</span><br>
                                    <span class="fs-6 fst-normal">- ประกอบด้วยตัวอักษรพิมพ์เล็กอย่างน้อย 1
                                        ตัว</span><br>
                                    <span class="fs-6 fst-normal">- ประกอบด้วยอักขระพิเศษอย่างน้อย 1 ตัว</span>
                                </div>

                                <div class="col-12 mb-4 d-block d-sm-none d-md-none d-lg-none">
                                    <span class="fst-normal" style="font-size: 9pt;">
                                        - มีความยาวอย่างน้อย 8 ตัวอักษร</span><br>
                                    <span class="fst-normal" style="font-size: 9pt;">
                                        - ประกอบด้วยตัวเลขอย่างน้อย 1 ตัว</span><br>
                                    <span class="fst-normal" style="font-size: 9pt;">
                                        - ประกอบด้วยตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว</span> <br>
                                    <span class="fst-normal" style="font-size: 9pt;">
                                        - ประกอบด้วยตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว</span><br>
                                    <span class="fst-normal" style="font-size: 9pt;">
                                        - ประกอบด้วยอักขระพิเศษอย่างน้อย 1 ตัว</span>
                                </div> -->

                                <div class="col-12 text-end">
                                    <a href="<?= base_url('/login') ?>"
                                        class="btn btn-light"><?= lang('profile.cancel') ?></a>
                                    <button type="submit" id="submitBtn"
                                        class="btn btn-primary"><?= lang('profile.seve-sign-up') ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function formatPhoneNumber(phoneNumber) {
        var cleaned = ('' + phoneNumber).replace(/\D/g, '');

        if (cleaned.length > 10) {
            cleaned = cleaned.substring(0, 10);
        }
        var match = cleaned.match(/^(\d{2})(\d{4})(\d{4})$/);

        if (match) {
            return match[1] + '-' + match[2] + '-' + match[3];
        } else {
            return cleaned.replace(/(\d{2})(\d{4})(\d{4})/, "$1-$2-$3");
        }
    }

    $('#phone').on('input', function () {
        var formattedPhoneNumber = formatPhoneNumber($(this).val());
        if (formattedPhoneNumber) {
            $(this).val(formattedPhoneNumber);
        }
    });



    $('#username').on('input', function () {
        var value = $(this).val();
        if (/[^a-zA-Z0-9]/.test(value)) {
            $(this).val(value.replace(/[^a-zA-Z0-9]/g, ''));
        }
    });

    $('#submitBtn').on('click', function (event) {
        event.preventDefault();
        let formData = $('#register').serialize();
        $.ajax({
            url: '<?= base_url('register'); ?>',
            type: 'POST',
            data: formData,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = '<?= base_url('login'); ?>'
                });
            },
        });
    });

</script>