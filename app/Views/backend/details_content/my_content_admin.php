<div class="fs-4 mb-0 text-gray-800 ">ข้อมูลผู้ลงทะเบียน Admin</div>

<div class="row mt-4">

    <div class="card shadow mb-4">
        <div class="card-body mt-4">
            <div class="table-responsive">
                <table class="table table-striped" id="my_table_admin" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 6%;"></th>
                            <th style="width: 10%;"><?= lang('profile.gender') ?></th>
                            <th><?= lang('profile.fullname') ?></th>
                            <th><?= lang('profile.username') ?></th>
                            <th style="width: 15%;"><?= lang('profile.birthday') ?></th>
                            <th style="width: 15%;"><?= lang('profile.phone') ?></th>
                            <th style="width: 7%"></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;
                        foreach ($admin as $row):
                            $timestamp = strtotime($row['birthday']);
                            $row['birthday'] = date('d-m-', $timestamp) . (date('Y', $timestamp) + 543);
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['birthday'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td>
                                    <a role="button" data-bs-toggle="tooltip" data-bs-title="<?= lang('profile.edit') ?>"
                                        class="modalButton">
                                        <i class="fa-solid fa-pen-to-square fs-3 text-warning"></i>
                                    </a>
                                    <a onclick="deleteAdmin('<?= $row['uuid'] ?>');" role="button" data-bs-toggle="tooltip"
                                        data-bs-title="<?= lang('profile.delete') ?>">
                                        <i class="fa-solid fa-trash fs-3 text-danger"></i>
                                    </a>


                                </td>
                            </tr>
                            <?php
                            $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="editadminModal" tabindex="-1" aria-labelledby="editadminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= lang('profile.edit') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-2">
                        <div class="form-floating">
                            <select class="form-select" id="prefix">
                                <!-- <option selected><?= lang('profile.prefix') ?></option> -->
                                <option value="<?= lang('profile.prefix-mr') ?>"><?= lang('profile.prefix-mr') ?>
                                </option>
                                <option value="<?= lang('prfile.prefix-mrs') ?>"><?= lang('profile.prefix-mrs') ?>
                                </option>
                                <option value="<?= lang('profile.prefixmiss') ?>"><?= lang('profile.prefix-miss') ?>
                                </option>
                            </select>
                            <label for="floatingSelectGrid"><?= lang('profile.prefix') ?></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fname" placeholder="">
                            <label for="fname"><?= lang('profile.fname') ?></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lname" placeholder="">
                            <label for="lname"><?= lang('profile.lname') ?></label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" placeholder="">
                            <label for="username"><?= lang('profile.username') ?></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="">
                            <label for="password"><?= lang('profile.password') ?></label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="birthday" placeholder="">
                            <label for="birthday"><?= lang('profile.birthday') ?></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone" placeholder="">
                            <label for="phone"><?= lang('profile.phone') ?></label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal"><?= lang('profile.cancel') ?></button>
                <button type="button" class="btn btn-warning"><?= lang('profile.seve-edit-profile') ?></button>
            </div>
        </div>
    </div>
</div>



<script>
    new DataTable('#my_table_admin', {
        language: {
            lengthMenu: "_MENU_"
        }
    });

    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    $('.modalButton').click(function () {
        var myModal = new bootstrap.Modal($('#editadminModal'));
        myModal.show();
    });

    function deleteAdmin(uuid) {
        console.log(uuid);

        Swal.fire({
            icon: 'warning',
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณไม่สามารถย้อนกลับได้หลังจากลบข้อมูล!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบข้อมูล!',
            cancelButtonText: 'ยกเลิก'
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('backend/delete_profile_admin/') ?>' + uuid,
                    type: 'DELETE',
                    data: {
                        '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == 200) {
                            swal.fire({
                                icon: 'success',
                                title: 'data.message',
                                text: '',
                                showConfirmButton: true,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'data.message',
                                text: '',

                            });
                        }
                    }
                });
            }
        });
    }
</script>