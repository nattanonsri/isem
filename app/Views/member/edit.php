<div class="container mt-3">
    <h2><?= esc($title); ?></h2>
    <?= \Config\Services::validation()->listErrors(); ?>

    <form action="/member/edit/<?= esc($member['id']); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="<?= esc($member['name']); ?>" />
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?= esc($member['username']); ?>" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter new password if you want to change" />
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input class="form-control" type="date" name="birthdate" value="<?= esc($member['birthdate']); ?>">
        </div>
        <div class="form-group">
            <label for="image">Current Image</label><br>
            <?php if (!empty($member['image'])): ?>
                <img src="<?= base_url($member['image']); ?>" alt="Current Image" style="max-width: 150px;">
            <?php else: ?>
                <p>No image available</p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="image">Change Image (optional)</label>
            <input class="form-control" type="file" name="image" />
        </div>
        <a class="btn btn-light" href="/member">Cancel</a>
        <button class="btn btn-warning" type="submit" name="submit">แก้ไขข้อมูล</button>
    </form>
</div>
