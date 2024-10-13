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
            <div class="container-fluid item-content d-none" id="sidebar-officer">
                <div id="content-admin" data-aos="fade-up"></div>
            </div>
            <div class="container-fluid item-content d-none" id="sidebar-users">
                <div id="content-users" data-aos="fade-up"></div>
            </div>
            <div class="container-fluid item-content d-none" id="sidebar-admin">
                <div id="content-administrator" data-aos="fade-up"></div>
            </div>
            <div class="item-content d-none" id="sidebar-maps">
                <div id="content-maps" data-aos="fade-up"></div>
            </div>
        </div>
        <!-- <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <!-- <span>Copyright &copy; Your Website 2021</span> -->
    </div>
</div>
</footer> -->
</div>
</div>

<!-- editadminModal -->
<div class="modal fade" id="editadminModal" tabindex="-1" aria-labelledby="editadminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= lang('profile.edit') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="detailsAdmin" class="row">
                </div>
            </div>
        </div>
    </div>
</div>




<!-- register_user_modal -->
<div class="modal fade" id="register_user_modal" tabindex="-1" aria-labelledby="register_user_Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= lang('profile.create-profile') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmUsers" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="prefix"><?= lang('profile.prefix') ?><span
                                        class="me-1 text-danger">*</span></label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="prefix" id="prefix1"
                                        value="<?= lang('profile.prefix-mr') ?>" checked>
                                    <label class="form-check-label"
                                        for="prefix1"><?= lang('profile.prefix-mr') ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="prefix" id="prefix2"
                                        value="<?= lang('profile.prefix-mrs') ?>">
                                    <label class="form-check-label"
                                        for="prefix2"><?= lang('profile.prefix-mrs') ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="prefix" id="prefix3"
                                        value="<?= lang('profile.prefix-miss') ?>">
                                    <label class="form-check-label"
                                        for="prefix3"><?= lang('profile.prefix-miss') ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control form-field" type="text" name="fname" id="fname"
                                    placeholder="<?= lang('profile.fname') ?>" required
                                    oninput="this.value = this.value.replace(/[^\u0E00-\u0E7F]/g, '')">
                                <label for="fname"><?= lang('profile.fname') ?><span
                                        class=" me-1 text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control form-field" type="text" name="lname" id="lname"
                                    placeholder="<?= lang('profile.lname') ?>" required
                                    oninput="this.value = this.value.replace(/[^\u0E00-\u0E7F]/g, '')">
                                <label for="lname"><?= lang('profile.lname') ?><span
                                        class="me-1 text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-7 col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control form-field" type="text" name="card_id" id="card_idCreate"
                                    placeholder="<?= lang('profile.card_id') ?>" required>
                                <label for="card_idCreate"><?= lang('profile.card_id') ?><span
                                        class="me-1 text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control form-field" type="date" name="birthdate" id="birthdateCreate"
                                    placeholder="<?= lang('profile.birthday') ?>" required>
                                <label for="birthdateCreate"><?= lang('profile.birthday') ?><span
                                        class="me-1 text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control form-field" type="text" name="phone" id="phone_number"
                                    placeholder="<?= lang('profile.phone') ?>" required>
                                <label for="phone_number"><?= lang('profile.phone') ?><span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control form-field" type="text" name="coordinates" id="coordinates"
                                    placeholder="xx.xxxxxx, xx.xxxxxx" value="" required>
                                <label for="coordinates"><?= lang('profile.coordinates') ?><span
                                        class=" me-1 text-danger">*</span></label>
                                <button class="btn btn-outline-secondary position-absolute end-0 top-0 h-100"
                                    type="button" onclick="getLocation()">
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
                                    <input class="form-check-input" type="radio" name="disease_id" id="disease1"
                                        value="1" onclick="toggleCheckboxDisease(false)" checked />
                                    <label class="form-check-label"
                                        for="disease1"><?= lang('profile.not-disease') ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="disease_id" id="disease2"
                                        value="2" onclick="toggleCheckboxDisease(true)" />
                                    <label class="form-check-label"
                                        for="disease2"><?= lang('profile.disease') ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="disease_details" id="disease_detailse"
                                    placeholder="<?= lang('profile.disease_details') ?>" disabled>
                                <label for="disease_detailse"><?= lang('profile.disease_details') ?></label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="succor_id" id="succor1" value="1"
                                        checked />
                                    <label class="form-check-label"
                                        for="succor1"><?= lang('profile.not-succor') ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="succor_id" id="succor2"
                                        value="2" />
                                    <label class="form-check-label" for="succor2"><?= lang('profile.succor') ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="relative_id" id="relative1"
                                        value="1" onclick="toggleCheckboxRelative(false)" checked />
                                    <label class="form-check-label"
                                        for="relative1"><?= lang('profile.not-relative') ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="relative_id" id="relative2"
                                        value="2" onclick="toggleCheckboxRelative(true)">
                                    <label class="form-check-label"
                                        for="relative2"><?= lang('profile.relative') ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="caretaker" id="caretaker"
                                    placeholder="<?= lang('profile.caretaker') ?>" disabled>
                                <label for="caretaker"><?= lang('profile.caretaker') ?></label>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="medicines" id="medicines"
                                    placeholder="<?= lang('profile.medicines') ?>">
                                <label for="medicines"><?= lang('profile.medicines') ?></label>
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <div class="form-group">
                                <label for="file_image"><?= lang('profile.image-home') ?><span
                                        class="mx-1 text-danger form-field"><?= lang('profile.caution') ?>*</span></label>
                                <input class="form-control" type="file" name="file_image" id="file_image"
                                    accept=".jpg, .jpeg, .png" capture="camera" required>
                            </div>
                        </div>
                        <div class="col-12 mb-3 text-right">
                            <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal"><?= lang('profile.cancel') ?></button>

                            <button class="btn btn-primary" type="submit" id="submitBtn"
                                disabled><?= lang('profile.seve-add-profile') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- editUsersModal -->
<div class="modal fade" id="editUsersModal" tabindex="-1" aria-labelledby="editUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= lang('profile.edit') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="detailsUsers" class="row">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Register Modal -->
<div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= lang('profile.register-from') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmAddUserAdmin">
                    <div class="row">
                        <input type="hidden" name="type" id="type">
                        <div class="col-2">
                            <div class="form-floating">
                                <select class="form-select" name="prefix" id="prefix_officer_admin">
                                    <!-- <option ><?= lang('profile.prefix') ?></option> -->
                                    <option selected value="<?= lang('profile.prefix-mr') ?>"> <?= lang('profile.prefix-mr') ?>
                                    </option>
                                    <option value="<?= lang('prfile.prefix-mrs') ?>"><?= lang('profile.prefix-mrs') ?>
                                    </option>
                                    <option value="<?= lang('profile.prefixmiss') ?>"><?= lang('profile.prefix-miss') ?>
                                    </option>
                                </select>
                                <label for="floatingSelectGrid"><?= lang('profile.prefix') ?><span class="te    xt-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="fname" id="fname_officer_admin" required>
                                <label for="fname_officer_admin"><?= lang('profile.fname') ?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="lname" id="lname_officer_admin" required>
                                <label for="lname_officer_admin"><?= lang('profile.lname') ?><span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="username_officer_admin"
                                    oninput="this.value = this.value.replace(/[^a-zA-z0-9_]/g, '')" required>
                                <label for="username_officer_admin"><?= lang('profile.username') ?><span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password_officer_admin" required>
                                <label for="password_officer_admin"><?= lang('profile.password') ?><span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="birtday" id="birthday_officer_admin">
                                <label for="birthday_officer_admin"><?= lang('profile.birthday') ?></label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control phone" name="phone" id="phone_officer_admin">
                                <label for="phone_officer_admin"><?= lang('profile.phone') ?></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"><?= lang('profile.cancel') ?></button>
                <button type="submit" id="btnAddUserAdmin"
                    class="btn btn-primary"><?= lang('profile.seve-add-profile') ?></button>
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
        loadContentDashboard();
        loadContentOfficer();
        loadContentUsers();
        loadContentAdministrator();
        loadContentMaps();

        // Format phone number in a standard way
        const formatPhoneNumber = (phoneNumber) => {
            const cleaned = phoneNumber.replace(/\D/g, '').substring(0, 10);
            const match = cleaned.match(/^(\d{2})(\d{4})(\d{4})$/);
            return match ? `${match[1]}-${match[2]}-${match[3]}` : cleaned;
        };

        // Format phone number on input
        $('.phone').on('input', function () {
            $(this).val(formatPhoneNumber($(this).val()));
        });

        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#birthdateCreate').attr('max', today);

    });

    $('.form-field').on('change', function () {
        $('#submitBtn').prop('disabled', false);
    });

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

    $('#card_idCreate').on('input', function (e) {
        let value = $(this).val().replace(/\D/g, ''); // Remove all non-digit characters
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

    $('#frmUsers').submit(function (e) {
        e.preventDefault();
        var form = $(this)[0];
        var formData = new FormData(form);
        $.ajax({
            url: '<?= base_url('/profile/add_from_user') ?>',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status == 200) {
                    Swal.fire({
                        icon: "success",
                        title: data.message,
                        text: ''
                    }).then(function () {
                        window.location.href = '<?= base_url('/backend') ?>';
                    });
                }
                else {
                    Swal.fire({
                        icon: "warning",
                        title: data.message,
                        text: ''

                    });
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    })


    function btnCreateOfficertAdmin(type) {
        $('#type').val(type);
        $('#register_modal').modal('show');
    }

    $('.sidebar-backend-item').click(function () {
        let target = $(this).attr('data-target');
        $('.item-content').addClass('d-none');
        $(target).removeClass('d-none');
        $('.sidebar-backend-item').removeClass('active');
        $(this).addClass('active');
    });

    function loadContentDashboard() {
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

    function loadContentOfficer() {
        $.ajax({
            url: '<?= base_url('backend/load_content_officer') ?>',
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

    function loadContentUsers() {
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

    function loadContentAdministrator() {
        $.ajax({
            url: '<?= base_url('backend/load_content_administrator') ?>',
            type: 'POST',
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#content-administrator').html(result);
            }
        });
    }
    function loadContentMaps() {
        $.ajax({
            url: '<?= base_url('backend/load_content_maps') ?>',
            type: 'POST',
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#content-maps').html(result);
            }
        });
    }

    function btnEditModal(uuidEdit) {
        $.ajax({
            url: '<?= base_url('backend/openEditOfficerModal') ?>',
            type: 'POST',
            data: {
                uuid: uuidEdit,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#detailsAdmin').html(result);
                $('#editadminModal').modal('show');
            }
        });
    }
    function btnEditUsers(uuid) {
        $.ajax({
            url: '<?= base_url('backend/openEditUsersModal') ?>',
            type: 'POST',
            data: {
                uuid: uuid,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
            },
            dataType: 'html',
            success: function (result) {
                $('#detailsUsers').html(result);
                $('#editUsersModal').modal('show');
            }
        });
    }

    function deleteUsers(uuid) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณไม่สามารถย้อนกลับได้หลังจากลบข้อมูล!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบข้อมูล!',
            cancelButtonText: 'ยกเลิก'
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('profile/delete_form_user/') ?>' + uuid,
                    type: 'DELETE',
                    success: function (data) {
                        var data = JSON.parse(data);
                        if (data.status === 200) {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                text: '',
                                showConfirmButton: true,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: data.message,
                                text: '',
                            });
                        }
                    },
                });
            }
        });
    }


    $('#btnAddUserAdmin').click(function (e) {
        e.preventDefault();

        var formData = $('#frmAddUserAdmin').serialize();

        var type = $('#type').val();
        var prefix = $('#prefix_officer_admin').val();
        var fname = $('#fname_officer_admin').val().trim();
        var lname = $('#lname_officer_admin').val().trim();
        var username = $('#username_officer_admin').val().trim();
        var password = $('#password_officer_admin').val().trim();

        if (!prefix || !fname || !lname || !username || !password) {
            var message = '';
            if (!prefix) message = 'กรุณากรอกคำนำหน้า';
            else if (!fname) message = 'กรุณากรอกชื่อ';
            else if (!lname) message = 'กรุณากรอกนามสกุล';
            else if (!username) message = 'กรุณากรอกชื่อผู้ใช้';
            else if (!password) message = 'กรุณากรอกรหัสผ่าน';

            Swal.fire({
                icon: 'warning',
                title: '<?= lang('backend.warn') ?>',
                text: message
            });
            return;
        }
        $.ajax({
            url: '<?= base_url('backend/add_user_admin/') ?>' + type,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                if (data.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: data.message,
                    });
                }
            }
        });

    });
</script>

<?= $this->endSection() ?>