<div class="container">
<h2 class="mt-4">Create New table</h2>
<a class="btn btn-primary mt-3 mb-3 " href="member/create">Create</a>
<!-- <a class="btn btn-sm btn-warning " href="member/edit">Edit</a> -->
<!-- <a class="btn btn-danger" href="member/delete" onclick="return confirm('Are you sure you want to delete this member?');">Delete</a> -->
<table class="table">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>username</th>
            <th>birthdate</th>
            <th>image</th>
            <th></th>
        </tr>
    </thead>
    <?php $i = 1; ?>
    <?php if (!empty($member) && is_array($member)): ?>
        <?php foreach ($member as $row): ?>
            
            <tbody>

                <td><?php echo $i ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><img src="<?= base_url(esc($row['image'])); ?>" style="width: 200px; height: 200px;"></td>
                <td>
                    <!-- <a class="btn btn-sm btn-info mx-1" href="">View</a> -->
                    
                    <a class="btn btn-warning" href="/member/edit/<?= $row['id']; ?>">Edit</a>
                    <a class="btn btn-danger" href="/member/delete/<?= $row['id'] ?>" onclick="return confirm('คุณแน่ใจที่จะลบใช้หรือไม่');">Delete</a>
                </td>
            </tbody>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td class="text-center">
                No News <br>
                Unable to find any news for you.
            </td>
        </tr>
    <?php endif; ?>
</table>
</div>