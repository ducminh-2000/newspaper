<h2>Cập nhật bài viết</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="typeId">Chọn thể loại</label>
        <select name="typeId" class="form-control" id="typeId">
          <?php
          foreach ($types as $type):
            $selected = '';
            if ($type['id'] == $article['typeId']) {
              $selected = 'selected';
            }
            if (isset($_POST['typeId']) && $type['id'] == $_POST['typeId']) {
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
        <label for="title">Nhập tiêu đề</label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $article['title'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
      <?php if (!empty($article['avatar'])): ?>
          <img height="80" src="assets/uploads/<?php echo $article['avatar'] ?>"/>
      <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="description">Mô tả ngắn</label>
        <input type="text" name="description" value="<?php echo isset($_POST['description']) ? $_POST['description'] : $article['description'] ?>"
               class="form-control" id="description"/>
    </div>
    <div class="form-group">
        <label for="content">Nội dung </label>
        <textarea name="content" id="content"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $article['content'] ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=article&action=index" class="btn btn-default">Back</a>
    </div>
</form>