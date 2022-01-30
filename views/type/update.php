<?php if (empty($type)): ?>
    <h2>Không tồn tại thể loại</h2>
<?php else: ?>
    <h2>Chỉnh sửa thể loại #<?php echo $type['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên thể loại</label>
            <input type="text" name="name"
                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : $type['name']; ?>"
                   class="form-control"/>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
<?php endif; ?>