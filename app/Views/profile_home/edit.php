<!-- mobile -->
<div class="container d-block d-sm-none d-md-none d-lg-none ">
    <div class="row">
        <div class="col-12 mt-3">
            <h4><?= esc($title); ?></h4>
        </div>
    </div>
    <form id="frmEditMobile" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="row mt-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="prefix">คำนำหน้า&nbsp;<span class="text-danger">*</span></label> <br>
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" type="radio" name="prefix" id="prefix4" value="นาย"
                            <?= $profile['prefix'] == 'นาย' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="prefix4">นาย</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prefix" id="prefix5" value="นาง"
                            <?= $profile['prefix'] == 'นาง' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="prefix5">นาง</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prefix" id="prefix6" value="นางสาว"
                            <?= $profile['prefix'] == 'นางสาว' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="prefix6">นางสาว</label>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-3">
                <div class="form-floating">
                    <input type="text" name="fname" id="fnameMobile" class="form-control" placeholder="ชื่อจริง"
                        value="<?= esc($profile['fname']) ?>" />
                    <label for="fnameMobile">ชื่อจริง&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-6 mt-3">
                <div class="form-floating ">
                    <input type="text" name="lname" id="lnameMobile" class="form-control" placeholder="นามสกุล"
                        value="<?= esc($profile['lname']) ?>" />
                    <label for="lnameMobile">นามสกุล&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="card_id" id="card_idMobile" class="form-control"
                        placeholder="เลขบัตรประจำตัวประชาชน" value="<?= esc($profile['card_id']) ?>" />
                    <label for="card_idMobile">เลขบัตรประจำตัวประชาชน&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="date" name="birthdate" id="birthdateMobile" class="form-control"
                        placeholder="วัน/เดือน/ปีเกิด" value="<?= esc($profile['birthdate']) ?>" />
                    <label for="birthdateMobile">วัน/เดือน/ปีเกิด&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating position-relative">
                    <input type="text" name="coordinates" id="coordinatesMobile" class="form-control"
                        placeholder="xx.xxxxxx, xx.xxxxxx" value="<?= esc($profile['coordinates']) ?>" required />
                    <label for="coordinatesMobile">พิกัด&nbsp;<span class="text-danger">*</span></label>
                    <button class="btn btn-outline-secondary position-absolute end-0 top-0 h-100" type="button"
                        onclick="getLocationMobile()" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
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
                        <input class="form-check-input" type="radio" name="disease_id" id="disease3"
                            value="ผู้สูงอายุไม่มีโรคประจำตัว" onclick="toggleCheckbox3(false)"
                            <?= $profile['disease_id'] == '1' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="disease3">ผู้สูงอายุไม่มีโรคประจำตัว</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disease_id" id="disease4"
                            value="ผู้สูงอายุมีโรคประจำตัว" onclick="toggleCheckbox3(true)"
                            <?= $profile['disease_id'] == '2' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="disease4">ผู้สูงอายุมีโรคประจำตัว</label>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="disease_details" id="disease_detailseMobile" class="form-control"
                        placeholder="โรคประจำตัว" <?= $profile['disease_id'] == '2' ? '' : 'disabled' ?>
                        value="<?= esc($profile['disease_details']) ?>" />
                    <label for="disease_detailseMobile">โรคประจำตัว</label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="succor_id" id="succor3"
                            value="ผู้สูงอายุช่วยเหลือตัวเองไม่ได้"
                            <?= $profile['succor_id'] == '1' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="succor3">ผู้สูงอายุช่วยเหลือตัวเองไม่ได้</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="succor_id" id="succor4"
                            value="ผู้สูงอายุช่วยเหลือตัวเองได้" <?= $profile['succor_id'] == '2' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="succor4">ผู้สูงอายุช่วยเหลือตัวเองได้</label>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="relative_id" id="relative3"
                            value="ผู้สูงอายุไม่มีญาติ" onclick="toggleCheckbox4(false)"
                            <?= $profile['relative_id'] == '1' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="relative3">ผู้สูงอายุไม่มีญาติ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="relative_id" id="relative4"
                            value="ผู้สูงอายุมีญาติ" onclick="toggleCheckbox4(true)"
                            <?= $profile['relative_id'] == '2' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="relative4">ผู้สูงอายุมีญาติ</label>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="caretaker" id="caretakerMobile" class="form-control" placeholder="ผู้ดูแล"
                        <?= $profile['relative_id'] == '2' ? '' : 'disabled' ?>
                        value="<?= esc($profile['caretaker']) ?>" />
                    <label for="caretakerMobile">ผู้ดูแล</label>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="form-floating">
                    <input type="text" name="medicines" id="medicinesMobile" class="form-control" placeholder="ยาที่ใช้"
                        value="<?= esc($profile['medicines']) ?>" />
                    <label for="medicinesMobile">ยาที่ใช้</label>
                </div>
            </div>
            <div class="col-12 mt-3 mb-3">
                <div class="form-group">
                    <label for="file_imageMobile">รูปภาพบ้าน&nbsp;<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="file_image" id="file_imageMobile"
                        accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="col-12 mb-3 text-right">
                <a class="btn btn-light" href="<?= base_url('/profile'); ?>">Cancel</a>
                <button class="btn btn-primary" type="submit" id="submitBtnMobile">บันทึกการแก้ไข</button>
            </div>
        </div>
    </form>
</div>
<!-- end mobile -->

<script>
    function toggleCheckbox3(enable) {
        document.getElementById('disease_detailseMobile').disabled = !enable;
    }
    function toggleCheckbox4(enable) {
        document.getElementById('caretakerMobile').disabled = !enable;
    }

    document.getElementById('card_idMobile').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
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

        e.target.value = formattedValue;
    });

    function getLocationMobile() {
        const x = document.getElementById("coordinatesMobile");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPositionMobile);
        } else {
            x.value = "Geolocation is not supported by this browser.";
        }
    }

    function showPositionMobile(position) {
        const x = document.getElementById("coordinatesMobile");
        x.value = position.coords.latitude + ", " + position.coords.longitude;
    }

    $('#submitBtnMobile').on('click', function (e) {
        $(this).prop('disabled', true);

        e.preventDefault();

        var form = $('#frmEditMobile')[0];
        var formData = new FormData(form);
        var url = '<?= base_url('/profile/edit/') . $profile['id']; ?>';

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = '<?= base_url('profile') ?>'                    
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: xhr.responseText
                });
            },
            complete: function () {
                // เมื่อเสร็จสิ้นการส่งข้อมูล ให้เปิดปุ่มอีกครั้ง
                $('#submitBtnMobile').prop('disabled', false);
            }
        });
    });
</script>