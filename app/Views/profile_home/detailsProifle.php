<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="container mt-5 overflow-hidden">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="fs-4 text-center mt-3 text-primary" style="font-weight: 600;">
                    <i class="fa-solid fa-house-chimney"></i> <?= lang('profile.image-home') ?>
                </div>
                <div class="card-body text-center">
                    <img src="<?= base_url(LIBRARY_PATH . $users['file_image'])?>" width="300" height="200">
                </div>
            </div>

        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="p-md-4 p-2">
                    <div class="py-2">
                        <i class="fa-solid fa-user fs-5 me-1 text-primary"></i>
                        <sapn class="text-primary" style="font-weight: 600;">
                            <?= lang('profile.fname') ?> - <?= lang('profile.lname') ?> :
                        </sapn>
                        <?= $users['prefix']; ?><?= $users['fullname'] ?>
                    </div>
                    <div class="py-2">
                        <i class="fa-solid fa-calendar-days fs-5 me-1 text-primary"></i>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= lang('profile.birthday') ?> :
                        </span>
                        <?= $users['birthdate'] ?>
                    </div>
                    <div class="py-2">
                        <i class="fa-solid fa-id-card fs-5 me-1 text-primary"></i>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= lang('profile.card_id') ?> :
                        </span>
                        <?= $users['card_id'] ?>
                    </div>
                    <div class="py-2">
                        <i class="fa-solid fa-phone fs-5 me-1 text-primary"></i>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= lang('profile.phone') ?> :
                        </span>
                        <?= !empty($users['phone']) ? $users['phone'] : lang('profile.null-value') ?>
                    </div>
                    <div class="py-2">
                        <?= $users['succor_id'] == 1 ? '<i class="fa-solid fa-circle-xmark fs-5 me-1 text-danger"></i>' : '<i class="fa-solid fa-circle-check fs-5 me-1 text-success"></i>'; ?>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= $users['succor_name'] ?>
                        </span>
                    </div>
                    <div class="py-2">
                        <?= $users['relative_id'] == 1 ? '<i class="fa-solid fa-circle-xmark fs-5 me-1 text-danger"></i>' : '<i class="fa-solid fa-circle-check fs-5 me-1 text-success"></i>'; ?>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= $users['relative_name'] ?>
                        </span>
                        <div class="col-12 fs-6 ms-3 mt-2">
                            <span class="text-primary" style="font-weight: 600;">
                                <?= lang('profile.caretaker') ?> :
                            </span>
                            <?= !empty($users['caretaker']) ? $users['caretaker'] : lang('profile.null-value')?>
                        </div>
                    </div>
                    <div class="py-2">
                        <?= $users['disease_id'] == 1 ? '<i class="fa-solid fa-circle-xmark fs-5 me-1 text-danger"></i>' : '<i class="fa-solid fa-circle-check fs-5 me-1 text-success"></i>'; ?>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= $users['disease_name'] ?>
                        </span>
                        <div class="col-12 fs-6 ms-3 mt-2">
                            <span class="text-primary" style="font-weight: 600;">
                                <?= lang('profile.disease_details') ?> :
                            </span>
                            <?= !empty($users['disease_details']) ? $users['disease_details'] : lang('profile.null-value')?>
                        </div>
                    </div>
                    <div class="py-2">
                        <i class="fa-solid fa-capsules fs-5 me-1 text-primary"></i>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= lang('profile.medicines') ?> :
                        </span>
                        <?= !empty($users['medicines']) ? $users['medicines'] : lang('profile.null-value')?>
                    </div>
                    <div class="py-2">
                        <i class="fa-solid fa-location-dot fs-5 me-1 text-primary"></i>
                        <span class="text-primary" style="font-weight: 600;">
                            <?= lang('profile.coordinates') ?> :
                        </span>
                        <?= $users['coordinates'] ?>
                    </div>
                    
                    <div class="pb-4 text-end">
                    <a class="btn btn-light me-3" href="<?= base_url('/profile') ?>"><?= lang('profile.cancel') ?></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>