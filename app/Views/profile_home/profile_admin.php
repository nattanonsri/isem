<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow" style="border-radius: 1rem;" data-aos="fade-up"
                    data-aos-anchor=".other-element">
                    <div class="card-body p-5 ">
                        <h2 class="fw-bold mb-5 text-capitalize"><?= lang('profile.details') ?></h2>
                        <form id="frmDetailProifle">
                            <input type="hidden" name="uuid" value="<?= $admin['uuid']; ?>">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="fname" id="fname"
                                            value="<?= $admin['fname']; ?>"
                                            oninput="this.value = this.value.replace(/[^a-z\u0E00-\u0E7F]/gi, '')"
                                            placeholder="<?= lang('profile.fname') ?>">
                                        <label for="fname"><?= lang('profile.fname') ?></label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="lname" id="lname"
                                            value="<?= $admin['lname']; ?>"
                                            oninput="this.value = this.value.replace(/[^a-z\u0E00-\u0E7F]/gi, '')"
                                            placeholder="<?= lang('profile.lname') ?>">
                                        <label for="lname"><?= lang('profile.lname') ?></label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-4">
                                        <input type="date" class="form-control" name="birthday" id="birthday"
                                            value="<?= $admin['birthday'] ?>"
                                            placeholder="<?= lang('profile.birthday') ?>">
                                        <label for="birthday"><?= lang('profile.birthday') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-4">
                                    <h6 class="mb-2 pb-1"><?= lang('profile.gender') ?>: </h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                            value="<?= lang('profile.male') ?>"
                                            <?= $admin['gender'] == lang('profile.male') ? 'checked' : '' ?> />
                                        <label class="form-check-label"
                                            for="femaleGender"><?= lang('profile.male') ?></label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                            value="<?= lang('profile.female') ?>"
                                            <?= $admin['gender'] == lang('profile.female') ? 'checked' : '' ?> />
                                        <label class="form-check-label"
                                            for="maleGender"><?= lang('profile.female') ?></label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                            value="<?= lang('profile.other') ?>"
                                            <?= $admin['gender'] == lang('profile.other') ? 'checked' : '' ?> />
                                        <label class="form-check-label"
                                            for="otherGender"><?= lang('profile.other') ?></label>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="<?= $admin['phone']; ?>" placeholder="<?= lang('profile.phone') ?>">
                                        <label for="phone"><?= lang('profile.phone') ?></label>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="username" id="username"
                                            value="<?= $admin['username']; ?>"
                                            placeholder="<?= lang('profile.username') ?>">
                                        <label for="username"><?= lang('profile.username') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="<?= lang('profile.password') ?>">
                                        <label for="password"><?= lang('profile.password') ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="repeat_password"
                                            id="repeat_password" placeholder="<?= lang('profile.repeat-password') ?>">
                                        <label for="repeat_password"><?= lang('profile.repeat-password') ?></label>
                                    </div>
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <a href="<?= base_url('/profile') ?>"
                                        class="btn btn-light"><?= lang('profile.cancel') ?></a>
                                    <button type="submit" id="BtnEditAdmin"
                                        class="btn btn-warning"><?= lang('profile.edit') ?></button>
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

    $(document).ready(function () {
        
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#birthday').attr('max', today);
    });

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

    $('#BtnEditAdmin').on('click', function (e) {
        e.preventDefault();
        let formData = $('#frmDetailProifle').serialize();
        $.ajax({
            url: '<?= base_url('profile/update_admin_profile/user_admin'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                    }).then(function () {
                        window.location.href = '<?= base_url('profile'); ?>'
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: data.message,
                    })
                }

            },
        });
    });

</script>

<?= $this->endSection() ?>