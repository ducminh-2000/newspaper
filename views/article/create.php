<h2>Thêm mới bài viết</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="type_id">Chọn thể loại</label>
        <select name="type_id" class="form-control" id="type_id">
            <?php foreach ($types as $type):
                $selected = '';
                if (isset($_POST['type_id']) && $type['id'] == $_POST['type_id']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $type['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $type['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Nhập tiêu để</label>
        <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description"
                  class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : '' ?></input>
    </div>
    <div class="form-group">
        <label for="content">Nội dung</label>
        <textarea name="content" class="form-control" id="content">
            <?php echo isset($_POST['content']) ? $_POST['content'] : '' ?>
        </textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=article&action=index" class="btn btn-default">Back</a>
    </div>
</form>
