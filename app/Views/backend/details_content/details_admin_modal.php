<div class="col-2">
    <div class="form-floating">
        <select class="form-select" name="prefix" id="prefix">
            <option value=""><?= lang('profile.prefix') ?></option>
            <?php
            $prefixOptions = [
                'mr' => lang('profile.prefix-mr'),
                'mrs' => lang('profile.prefix-mrs'),
                'miss' => lang('profile.prefix-miss'),
            ];

            foreach ($prefixOptions as $value => $label) {
                $selected = ($user['gender'] == $label) ? 'selected' : '';
                echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
            }
            ?>
        </select>
        <label for="prefix"><?= lang('profile.prefix') ?></label>
    </div>
</div>
<div class="col-5">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="fname" value="<?= $user['fname'] ?>"
            oninput="this.value = this.value.replace(/[^a-z\u0E00-\u0E7F]/gi, '')">
        <label for="fname"><?= lang('profile.fname') ?></label>
    </div>
</div>
<div class="col-5">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lname" value="<?= $user['lname'] ?>"
            oninput="this.value = this.value.replace(/[^a-z\u0E00-\u0E7F]/gi, '')">
        <label for="lname"><?= lang('profile.lname') ?></label>
    </div>
</div>

<div class="col-6">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="username" value="<?= $user['username'] ?>">
        <label for="username"><?= lang('profile.username') ?></label>
    </div>
</div>
<div class="col-6">
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password"
            oninput="this.value = this.value.replace(/[^a-zA-Z0-9!@#$%^&*]/g, '')">
        <label for="password"><?= lang('profile.password') ?></label>
    </div>
</div>

<div class="col-6">
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="birthday" value="<?= $user['birthday'] ?>">
        <label for="birthday"><?= lang('profile.birthday') ?></label>
    </div>
</div>
<div class="col-6">
    <div class="form-floating mb-3">
        <input type="text" class="form-control phone" id="phone" maxlength="10" minlength="9"
            value="<?= $user['phone'] ?>">
        <label for="phone"><?= lang('profile.phone') ?></label>
    </div>
</div>

<div>
    <button type="button" class="btn" data-bs-dismiss="modal"><?= lang('profile.cancel') ?></button>
    <button type="button" id="btnEditUserAdmin" class="btn btn-warning"><?= lang('profile.seve-edit-profile') ?></button>
</div>