<h1>Tìm kiếm</h1>
<form action="" method="get">
    <input type="hidden" name="controller" value="type"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label>Nhập tên thể loại</label>
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=type" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách thể loại</h1>
<a href="index.php?controller=type&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
  <?php if (!empty($types)): ?>
    <?php foreach ($types as $type): ?>
          <tr>
              <td>
                <?php echo $type['id']; ?>
              </td>
              <td>
                <?php echo $type['name']; ?>
              </td>
              <td>
                <?php echo date('d-m-Y H:i:s', strtotime($type['created_at'])); ?>
              </td>
              <td>
                <?php
                if (!empty($type['updated_at'])) {
                  echo date('d-m-Y H:i:s', strtotime($type['updated_at']));
                }
                ?>
              </td>
              <td>
                  <a href="index.php?controller=type&action=detail&id=<?php echo $type['id'] ?>"
                     title="Chi tiết">
                      <i class="fa fa-eye"></i>
                  </a>
                  <a href="index.php?controller=type&action=update&id=<?php echo $type['id'] ?>" title="Sửa">
                      <i class="fa fa-pencil-alt"></i>
                  </a>
                  <a href="index.php?controller=type&action=delete&id=<?php echo $type['id'] ?>" title="Xóa"
                     onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
          </tr>
    <?php endforeach ?>
      <tr>
          <td colspan="7"><?php echo $pages; ?></td>
      </tr>

  <?php else: ?>
      <tr>
          <td colspan="7">Không có bản ghi nào</td>
      </tr>
  <?php endif; ?>
</table>
<!--  hiển thị phân trang-->

