<?php if (empty($role)): ?>
    <h2>Không tồn tại quyền</h2>
<?php else: ?>
    <h2>Chỉnh sửa quyền #<?php echo $role['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên quyền</label>
            <input type="text" name="name"
                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : $role['name']; ?>"
                   class="form-control"/>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
<?php endif; ?>