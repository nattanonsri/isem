<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="fs-4 mx-4 text-gray-800"><?= lang('backend.elderly-people') ?></div>

<div class="row m-4">
    <div class="card shadow">
        
        <div class="card-body mt-4">
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                data-bs-target="#register_user_modal"
                style="float: inline-end;"><?= lang('profile.add-profile') ?></button>
            <div class="table-responsive">
                <table class="table table-striped" id="my_table_users">
                    <thead>
                        <tr>
                            <th style="width: 6%"></th>
                            <th style="width: 20%"><?= lang('profile.image-home') ?></th>
                            <th style="width: 7%"><?= lang('profile.prefix') ?></th>
                            <th><?= lang('profile.fullname') ?></th>
                            <th style="width: 16%"><?= lang('profile.card_id') ?></th>
                            <th style="width: 12%"><?= lang('profile.birthday') ?></th>
                            <th style="width: 12%"><?= lang('profile.phone') ?></th>
                            <th style="width: 7%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($users as $user):
                            $timestamp = strtotime($user['birthdate']);
                            $user['birthdate'] = date('d-m-', $timestamp) . (date('Y', $timestamp) + 543);

                            ?>

                            <tr>
                                <td><?= $i ?></td>
                                <td><img src="<?= base_url() . LIBRARY_PATH . $user['file_image'] ?>" width="200"></td>
                                <td><?= $user['prefix'] ?></td>
                                <td><?= $user['fullname'] ?></td>
                                <td><?= $user['card_id'] ?></td>
                                <td><?= $user['birthdate'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td>
                                    <a role="button" data-bs-toggle="tooltip" data-bs-title="<?= lang('profile.edit') ?>"
                                        class="modalButton" onclick="btnEditUsers('<?= $user['user_uuid'] ?>')">
                                        <i class="fa-solid fa-pen-to-square fs-3 text-warning"></i>
                                    </a>
                                    <a onclick="deleteUsers('<?= $user['user_uuid'] ?>');" role="button"
                                        data-bs-toggle="tooltip" data-bs-title="<?= lang('profile.delete') ?>">
                                        <i class="fa-solid fa-trash fs-3 text-danger"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    new DataTable('#my_table_users', {
        language: {
            lengthMenu: "_MENU_"
        }
    });

    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>

<?= $this->endSection() ?>