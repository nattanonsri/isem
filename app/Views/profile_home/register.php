<!-- Web -->
<div class="d-none d-sm-block">
    <div class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">

                            <h2 class="fw-bold mb-5 text-capitalize">Register From</h2>
                            <form id="registerFormWeb" method="POST">
                                <?= csrf_field() ?> 
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="fname" id="fnameWeb"
                                                placeholder="ชื่อจริง" required>
                                            <label for="fnameWeb">ชื่อจริง</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="lname" id="lnameWeb"
                                                placeholder="นามสกุล" required>
                                            <label for="lnameWeb">นามสกุล</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-4">
                                            <input type="date" class="form-control" name="birthday" id="birthdayWeb"
                                                placeholder="วัน/เดือน/ปีเกิด" required>
                                            <label for="birthdayWeb">วัน/เดือน/ปีเกิด</label>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <h6 class="mb-2 pb-1">เพศ: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="femaleGenderWeb" value="ชาย" checked />
                                            <label class="form-check-label" for="femaleGenderWeb">ชาย</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="maleGenderWeb" value="หญิง" />
                                            <label class="form-check-label" for="maleGenderWeb">หญิง</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="otherGenderWeb" value="อื่นๆ" />
                                            <label class="form-check-label" for="otherGenderWeb">อื่นๆ</label>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="phone" id="phoneWeb"
                                                placeholder="เบอร์โทรศัพท์" required>
                                            <label for="phoneWeb">เบอร์โทรศัพท์</label>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="username" id="usernameWeb"
                                                placeholder="username" required>
                                            <label for="usernameWeb">username</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-2">
                                            <input type="password" class="form-control" name="password" id="passwordWeb"
                                                placeholder="password" required>
                                            <label for="passwordWeb">password</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-2">
                                            <input type="password" class="form-control" name="repeat_password"
                                                id="repeat_passwordWeb" placeholder="repeat password" required>
                                            <label for="repeat_passwordWeb">repeat password</label>
                                        </div>
                                    </div>
                                    <div class="col-12  mb-4">
                                        <span class="fs-6 fst-normal">- มีความยาวอย่างน้อย 8 ตัวอักษร</span><br>
                                        <span class="fs-6 fst-normal">- ประกอบด้วยตัวเลขอย่างน้อย 1 ตัว</span><br>
                                        <span class="fs-6 fst-normal">- ประกอบด้วยตัวอักษรพิมพ์ใหญ่อย่างน้อย 1
                                            ตัว</span><br>
                                        <span class="fs-6 fst-normal">- ประกอบด้วยตัวอักษรพิมพ์เล็กอย่างน้อย 1
                                            ตัว</span><br>
                                        <span class="fs-6 fst-normal">- ประกอบด้วยอักขระพิเศษอย่างน้อย 1 ตัว</span>
                                    </div>

                                    <div class="col-12 text-end">
                                        <a href="<?= base_url('/login') ?>" class="btn btn-light">ย้อนกลับ</a>
                                        <button type="submit" id="submitBtnWeb"
                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Web -->

<!-- mobile -->
<div class="d-block d-sm-none d-md-none d-lg-none">
    <div class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">

                            <h2 class="fw-bold mb-5 text-capitalize">Register From</h2>
                            <form id="registerFormMobile" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="fname" id="fnameMobile"
                                                placeholder="ชื่อจริง" required>
                                            <label for="fname">ชื่อจริง</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="lname" id="lnameMobile"
                                                placeholder="นามสกุล" required>
                                            <label for="lname">นามสกุล</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-4">
                                            <input type="date" class="form-control" name="birthday" id="birthdayMobile"
                                                placeholder="วัน/เดือน/ปีเกิด" required>
                                            <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <h6 class="mb-2 pb-1">เพศ: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="femaleGenderMobile" value="ชาย" checked />
                                            <label class="form-check-label" for="femaleGender">ชาย</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="maleGenderMobile" value="หญิง" />
                                            <label class="form-check-label" for="maleGender">หญิง</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="otherGenderMobile" value="อื่นๆ" />
                                            <label class="form-check-label" for="otherGender">อื่นๆ</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="phone" id="phoneMobile"
                                                placeholder="เบอร์โทรศัพท์" required>
                                            <label for="phone">เบอร์โทรศัพท์</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="username" id="usernameMobile"
                                                placeholder="username" required>
                                            <label for="username">username</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-2">
                                            <input type="password" class="form-control" name="password"
                                                id="passwordMobile" placeholder="password" required>
                                            <label for="passwordMobile">password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-2">
                                            <input type="password" class="form-control" name="repeat_password"
                                                id="repeat_passwordMobile" placeholder="repeat password" required>
                                            <label for="repeat_passwordMobile">repeat password</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <span class="fst-normal" style="font-size: 9pt;">-
                                            มีความยาวอย่างน้อย 8
                                            ตัวอักษร</span><br>
                                        <span class="fst-normal" style="font-size: 9pt;">-
                                            ประกอบด้วยตัวเลขอย่างน้อย 1
                                            ตัว</span><br>
                                        <span class="fst-normal" style="font-size: 9pt;">-
                                            ประกอบด้วยตัวอักษรพิมพ์ใหญ่อย่างน้อย
                                            1
                                            ตัว</span><br>
                                        <span class="fst-normal" style="font-size: 9pt;">-
                                            ประกอบด้วยตัวอักษรพิมพ์เล็กอย่างน้อย
                                            1
                                            ตัว</span><br>
                                        <span class="fst-normal" style="font-size: 9pt;">-
                                            ประกอบด้วยอักขระพิเศษอย่างน้อย 1
                                            ตัว</span>
                                    </div>

                                    <div class="col-12 text-end">
                                        <a href="/login" class="btn btn-light">ย้อนกลับ</a>
                                        <button type="submit" id="submitBtnMobile"
                                            class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end mobile -->
<script>
    // ฟังก์ชันเพื่อแบ่งรหัสโทรศัพท์ให้ถูกต้อง
    function formatPhoneNumber(phoneNumber) {
        var cleaned = ('' + phoneNumber).replace(/\D/g, ''); // ลบทุกอักขระที่ไม่ใช่ตัวเลข
        // ตรวจสอบว่ามีตัวเลขไม่เกิน 10 ตัว
        if (cleaned.length > 10) {
            cleaned = cleaned.substring(0, 10); // ถ้ามีมากกว่า 10 ตัวให้เอาเฉพาะ 10 ตัวแรก
        }
        var match = cleaned.match(/^(\d{2})(\d{4})(\d{4})$/); // แบ่งเป็นกลุ่ม 2-4-4

        if (match) {
            return match[1] + '-' + match[2] + '-' + match[3];
        } else {
            return cleaned.replace(/(\d{2})(\d{4})(\d{4})/, "$1-$2-$3");
        }
    }

    // เมื่อเสร็จสิ้นการป้อนข้อมูลให้แสดงผลรหัสโทรศัพท์ใหม่
    $('#phoneWeb').on('input', function () {
        var formattedPhoneNumber = formatPhoneNumber($(this).val());
        if (formattedPhoneNumber) {
            $(this).val(formattedPhoneNumber);
        }
    });

    $('#phoneMobile').on('input', function () {
        var formattedPhoneNumber = formatPhoneNumber($(this).val());
        if (formattedPhoneNumber) {
            $(this).val(formattedPhoneNumber);
        }
    });
    $(document).ready(function () {
        $('#submitBtnWeb').on('click', function (event) {
            event.preventDefault();

            var fname = $('#fnameWeb').val();
            var lname = $('#lnameWeb').val();

            checkDuplicateRegistration(fname, lname, function (isDuplicate) {
                if (isDuplicate) {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ข้อมูลผู้ใช้มีอยู่แล้ว กรุณาไปที่หน้าลืมรหัสผ่าน'
                    }).then(function () {
                        window.location.href = '<?= base_url('forgot_password'); ?>';
                    });
                } else {
                    if (validateForm('registerFormWeb')) {
                        var password = $('#passwordWeb').val();
                        var repeat_password = $('#repeat_passwordWeb').val();

                        // เช็คความยาวของรหัสผ่าน
                        if (password.length < 8) {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร'
                            });
                            return;
                        }

                        // เช็คว่ารหัสผ่านมีตัวเลขหรือไม่
                        var hasNumber = /\d/.test(password);
                        if (!hasNumber) {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'รหัสผ่านต้องประกอบด้วยตัวเลขอย่างน้อย 1 ตัว'
                            });
                            return;
                        }

                        // เช็คว่ารหัสผ่านมีตัวอักษรพิมพ์ใหญ่หรือไม่
                        var hasUpperCase = /[A-Z]/.test(password);
                        if (!hasUpperCase) {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'รหัสผ่านต้องประกอบด้วยตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว'
                            });
                            return;
                        }

                        // เช็คว่ารหัสผ่านมีตัวอักษรพิมพ์เล็กหรือไม่
                        var hasLowerCase = /[a-z]/.test(password);
                        if (!hasLowerCase) {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'รหัสผ่านต้องประกอบด้วยตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว'
                            });
                            return;
                        }

                        // เช็คว่ารหัสผ่านมีอักขระพิเศษหรือไม่
                        var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                        if (!hasSpecialChar) {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'รหัสผ่านต้องประกอบด้วยอักขระพิเศษอย่างน้อย 1 ตัว'
                            });
                            return;
                        }

                        // เช็ครหัสผ่านและการยืนยันรหัสผ่าน
                        if (password !== repeat_password) {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'รหัสผ่านและการยืนยันรหัสผ่านไม่ตรงกัน'
                            });
                            return;
                        }

                        const formData = $('#registerFormWeb').serialize();

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
                                    window.location.href = '<?= base_url('login'); ?>';
                                });
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'เกิดข้อผิดพลาด',
                                    text: error
                                });
                            }
                        });
                    }
                }
            });

            // ฟังก์ชันสำหรับเช็คการลงทะเบียนซ้ำ
            function checkDuplicateRegistration(fname, lname, callback) {
                $.ajax({
                    url: '<?= base_url('check_duplicate'); ?>',
                    type: 'POST',
                    data: { fname: fname, lname: lname },
                    success: function (response) {
                        callback(response.isDuplicate);
                    },
                    error: function () {
                        callback(false);
                    }
                });
            }

            // ฟังก์ชันสำหรับเช็คฟอร์ม
            function validateForm(formId) {
                var isValid = true;
                $('#' + formId + ' input').each(function () {
                    if ($(this).val() === '') {
                        isValid = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณากรอกข้อมูลให้ครบถ้วน'
                        });
                        return false;
                    }
                });
                return isValid;
            }
        });

        // end web

        // mobile

        $('#submitBtnMobile').on('click', function (event) {
            event.preventDefault();

            var password = $('#passwordMobile').val();
            var repeat_password = $('#repeat_passwordMobile').val();

            // เช็คความยาวของรหัสผ่าน
            if (password.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร'
                });
                return;
            }

            // เช็คว่ารหัสผ่านมีตัวเลขหรือไม่
            var hasNumber = /\d/.test(password);
            if (!hasNumber) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'รหัสผ่านต้องประกอบด้วยตัวเลขอย่างน้อย 1 ตัว'
                });
                return;
            }

            // เช็คว่ารหัสผ่านมีตัวอักษรพิมพ์ใหญ่หรือไม่
            var hasUpperCase = /[A-Z]/.test(password);
            if (!hasUpperCase) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'รหัสผ่านต้องประกอบด้วยตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว'
                });
                return;
            }

            // เช็คว่ารหัสผ่านมีตัวอักษรพิมพ์เล็กหรือไม่
            var hasLowerCase = /[a-z]/.test(password);
            if (!hasLowerCase) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'รหัสผ่านต้องประกอบด้วยตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว'
                });
                return;
            }

            // เช็คว่ารหัสผ่านมีอักขระพิเศษหรือไม่
            var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            if (!hasSpecialChar) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'รหัสผ่านต้องประกอบด้วยอักขระพิเศษอย่างน้อย 1 ตัว'
                });
                return;
            }

            // เช็ครหัสผ่านและการยืนยันรหัสผ่าน
            if (password !== repeat_password) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'รหัสผ่านและการยืนยันรหัสผ่านไม่ตรงกัน'
                });
                return;
            }

            const formData = $('#registerFormMobile').serialize();

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
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: error
                    });
                }
            });
        });
        // end mobile
    });

</script>