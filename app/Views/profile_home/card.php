<?php foreach ($profile as $row): ?>
      <div class="col-sm-6 col-md-4 col-12 mt-3">
        <div class="card border shadow" data-aos="fade-up" data-aos-anchor=".other-element">
          <img src="<?= base_url($row['file_image']); ?>" class="card-img-top" width="150" height="200">
          <div class="card-body">
            <h5 class="card-title" style="font-weight: 600;">
              <?= $row['prefix'] . $row['fullname']; ?>
            </h5>
            <p class="card-text">
              <span style="font-weight: 500;">
                <?= $row['disease_name'] ?>
              </span>
              <br>
              <span class="text-primary" style="font-weight: 600;">
                <?= lang('profile.caretaker') ?> :
              </span>
              <?= !empty($row['caretaker']) ? $row['caretaker'] : lang('profile.null-value'); ?><br>
              <span class="text-primary" style="font-weight: 600;">
                <?= lang('profile.medicines') ?> :
              </span>
              <?= !empty($row['medicines']) ? $row['medicines'] : lang('profile.null-value'); ?>
            </p>
            <div class="col-12 text-end mb-3">
              <a href="<?= base_url() ?>">
                <i class="fa-solid fa-location-dot fs-3"></i>
              </a>
            </div>
            <div class="text-end">
              <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-danger" onclick="deleteBtn('<?= $row['user_uuid'] ?>');">
                  <i class="fa-solid fa-trash me-1"></i><?= lang('profile.delete-profile') ?>
                </button>
                <a href="<?= base_url('profile/load_edit_form_user/' . $row['user_uuid']); ?>" class="btn btn-warning">
                  <i class="fa-solid fa-pen-to-square me-1"></i><?= lang('profile.edit-profile') ?>
                </a>
                <a href="<?= base_url('profile/detail_all_user/' . $row['user_uuid']); ?>"
                  class="btn btn-primary"><?= lang('profile.detail-profile') ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>