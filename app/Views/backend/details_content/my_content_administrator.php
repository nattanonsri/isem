<div class="fs-4 mx-4 text-gray-800 "><?= lang('backend.administrator') ?></div>

<div class="row m-4">

    <div class="card shadow ">
        <div class="card-body mt-4">
            <button type="button" class="btn btn-primary btn-lg" onclick="btnCreateOfficertAdmin('admin')"
                style="float: inline-end;"><?= lang('profile.add-admin') ?></button>
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
                                        class="modalButton" onclick="btnEditModal('<?= $row['uuid'] ?>')">
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



<script>
    new DataTable('#my_table_admin', {
        language: {
            lengthMenu: "_MENU_",
            search: "ค้นหา:",
        }
    });

    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    function deleteAdmin(uuid) {

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
                    }
                });
            }
        });
    }
</script>