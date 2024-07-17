<!-- mobile -->
<div class="container bg-white shadow mt-3 mb-3">
    <div class="row">
        <div class="col-12 mt-3">

        </div>
    </div>
    <form id="frmEditMobile" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" value="<?= $profile['uuid']; ?>" name="uuid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="prefix"><?= lang('profile.prefix') ?><span class="me-1 text-danger">*</span></label>
                    <br>
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" type="radio" name="prefix" id="prefix1"
                            value="<?= lang('profile.prefix-mr') ?>" <?= $profile['prefix'] == 'นาย' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="prefix1"><?= lang('profile.prefix-mr') ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prefix" id="prefix2"
                            value="<?= lang('profile.prefix-mrs') ?>" <?= $profile['prefix'] == 'นาง' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="prefix2"><?= lang('profile.prefix-mrs') ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prefix" id="prefix3"
                            value="<?= lang('profile.prefix-miss') ?>" <?= $profile['prefix'] == 'นางสาว' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="prefix3"><?= lang('profile.prefix-miss') ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="fname" id="fname" class="form-control"
                        placeholder="<?= lang('profile.fname') ?>" value="<?= esc($profile['fname']) ?>" />
                    <label for="fname"><?= lang('profile.fname') ?><span class=" me-1 text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-3">
                <div class="form-floating ">
                    <input type="text" name="lname" id="lname" class="form-control"
                        placeholder="<?= lang('profile.lname') ?>" value="<?= esc($profile['lname']) ?>" />
                    <label for="lname"><?= lang('profile.lname') ?><span class="me-1 text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-7 col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="card_id" id="card_id" class="form-control"
                        placeholder="<?= lang('profile.card_id') ?>" value="<?= esc($profile['card_id']) ?>" />
                    <label for="card_id"><?= lang('profile.card_id') ?><span class="me-1 text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-5 col-12 mt-3">
                <div class="form-floating">
                    <input type="date" name="birthdate" id="birthdate" class="form-control"
                        placeholder="<?= lang('profile.birthday') ?>" value="<?= esc($profile['birthdate']) ?>" />
                    <label for="birthdate"><?= lang('profile.birthday') ?><span
                            class="me-1 text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-3">
                <div class="form-floating">
                    <input class="form-control" type="text" name="phone" id="phone_number"
                        placeholder="<?= lang('profile.phone') ?>" value="<?= esc($profile['phone']) ?>">
                    <label for="phone_number"><?= lang('profile.phone') ?><span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-3">
                <div class="form-floating position-relative">
                    <input type="text" name="coordinates" id="coordinatesMobile" class="form-control"
                        placeholder="xx.xxxxxx, xx.xxxxxx" value="<?= esc($profile['coordinates']) ?>" />
                    <label for="coordinatesMobile">พิกัด&nbsp;<span class="text-danger">*</span></label>
                    <button class="btn btn-outline-secondary position-absolute end-0 top-0 h-100" type="button"
                        onclick="getLocation()" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12.003 11.73q.668 0 1.14-.475t.472-1.143t-.475-1.14t-1.143-.472t-1.14.476t-.472 1.143t.475 1.14t1.143.472M12 3q.327 0 .625.024t.606.091V4.5q0 .936.666 1.603q.667.666 1.603.666h.73V7.5q0 .936.667 1.603t1.603.666h.579q.011.121.014.258t.003.27q0 1.457-.685 2.938q-.686 1.48-1.662 2.81q-.976 1.328-2.036 2.412T12.92 20.21q-.191.173-.434.26t-.487.086q-.235 0-.47-.077t-.432-.25q-1.067-.98-2.163-2.185q-1.097-1.204-1.992-2.493t-1.467-2.633t-.572-2.622q0-3.173 2.066-5.234T12 3m6 2h-2.5q-.213 0-.356-.144T15 4.499t.144-.356T15.5 4H18V1.5q0-.213.144-.356T18.5 1t.356.144T19 1.5V4h2.5q.213 0 .356.144q.144.144.144.357q0 .212-.144.356T21.5 5H19v2.5q0 .213-.144.356Q18.712 8 18.5 8t-.356-.144T18 7.5z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disease_id" id="disease1" value="1"
                            onclick="toggleCheckboxDisease(false)" <?= $profile['disease_id'] == '1' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="disease1"><?= lang('profile.not-disease') ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disease_id" id="disease2" value="2"
                            onclick="toggleCheckboxDisease(true)" <?= $profile['disease_id'] == '2' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="disease2"><?= lang('profile.disease') ?></label>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="disease_details" id="disease_detailse" class="form-control"
                        placeholder="โรคประจำตัว" <?= $profile['disease_id'] == '2' ? '' : 'disabled' ?>
                        value="<?= esc($profile['disease_details']) ?>" />
                    <label for="disease_detailse"><?= lang('profile.disease_details') ?></label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="succor_id" id="succor1" value="1"
                            <?= $profile['succor_id'] == '1' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="succor1"><?= lang('profile.not-succor') ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="succor_id" id="succor2" value="2"
                            <?= $profile['succor_id'] == '2' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="succor2"><?= lang('profile.succor') ?></label>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="relative_id" id="relative1" value="1"
                            onclick="toggleCheckboxRelative(false)" <?= $profile['relative_id'] == '1' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="relative1"><?= lang('profile.not-relative') ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="relative_id" id="relative2" value="2"
                            onclick="toggleCheckboxRelative(true)" <?= $profile['relative_id'] == '2' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="relative2"><?= lang('profile.relative') ?></label>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="caretaker" id="caretaker" class="form-control" placeholder="ผู้ดูแล"
                        <?= $profile['relative_id'] == '2' ? '' : 'disabled' ?>
                        value="<?= esc($profile['caretaker']) ?>" />
                    <label for="caretaker"><?= lang('profile.caretaker') ?></label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="medicines" id="medicines" class="form-control" placeholder="ยาที่ใช้"
                        value="<?= esc($profile['medicines']) ?>" />
                    <label for="medicines"><?= lang('profile.medicines') ?></label>
                </div>
            </div>
            <div class="col-12 mt-3 mb-3">
                <div class="form-group">
                    <label for="file_image"><?= lang('profile.image-home') ?><span
                            class="mx-1 text-danger"><?= lang('profile.caution') ?>*</span></label>
                    <input class="form-control" type="file" name="file_image" id="file_image" accept=".jpg, .jpeg, .png"
                        capture="camera">
                </div>
            </div>
            <div class="col-12 mb-3 text-right">
                <a class="btn btn-light" href="<?= base_url('/profile'); ?>"><?= lang('profile.cancel') ?></a>
                <button class="btn btn-warning" type="submit"
                    id="submitBtnMobile"><?= lang('profile.seve-edit-profile') ?></button>
            </div>
        </div>
    </form>
</div>

<script>
    $('#phone_number').on('input', function () {
        let value = $(this).val().replace(/\D/g, '');
        let formattedValue = '';

        if (value.length > 0) {
            formattedValue += value.substr(0, 2);
        }
        if (value.length > 2) {
            formattedValue += '-' + value.substr(2, 4);
        }
        if (value.length > 6) {
            formattedValue += '-' + value.substr(6, 4);
        }

        $(this).val(formattedValue);
    });


    function toggleCheckboxDisease(enable) {
        $('#disease_detailse').prop('disabled', !enable);
    }
    function toggleCheckboxRelative(enable) {
        $('#caretaker').prop('disabled', !enable)
    }

    $('#card_id').on('input', function (e) {
        let value = $(this).val().replace(/\D/g, '');
        let formattedValue = '';

        // Apply the format 1-1031-00693-84-9
        if (value.length > 0) {
            formattedValue += value.substr(0, 1);
        }
        if (value.length > 1) {
            formattedValue += '-' + value.substr(1, 4);
        }
        if (value.length > 5) {
            formattedValue += '-' + value.substr(5, 5);
        }
        if (value.length > 10) {
            formattedValue += '-' + value.substr(10, 2);
        }
        if (value.length > 12) {
            formattedValue += '-' + value.substr(12, 1);
        }

        $(this).val(formattedValue);
    });


    function getLocation() {
        let x = $("#coordinates");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.val("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        let x = $("#coordinates");
        x.val(position.coords.latitude + ", " + position.coords.longitude);
    }

    $('#submitBtnMobile').on('click', function (e) {
        $(this).prop('disabled', true);

        e.preventDefault();

        var form = $('#frmEditMobile')[0];
        var formData = new FormData(form);

        $.ajax({
            url: '<?= base_url('/profile/edit_form_user/') . $profile['uuid']; ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                var data = JSON.parse(data);
                if (data.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: true,
                    }).then(function () {
                        window.location.href = '<?= base_url('profile') ?>'
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: data.message,
                        showConfirmButton: true,
                    }).then(function () {
                        window.location.reload();
                    });
                }

            },
            complete: function () {
                // เมื่อเสร็จสิ้นการส่งข้อมูล ให้เปิดปุ่มอีกครั้ง
                $('#submitBtnMobile').prop('disabled', false);
            }
        });
    });
</script>