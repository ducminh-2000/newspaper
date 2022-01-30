<!--form search-->
<form action="" method="GET">
    <div class="form-group">
        <label for="title">Nhập tiêu đề bài viết</label>
        <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" id="title"
               class="form-control"/>
    </div>
    <input type="hidden" name="controller" value="article"/>
    <input type="hidden" name="action" value="index"/>
    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
    <a href="index.php?controller=article" class="btn btn-default">Xóa filter</a>
</form>


<h2>Danh sách bài viết</h2>
    <a href="index.php?controller=article&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên thể loại</th>
        <th>Tiêu đề</th>
        <th>Ảnh đại diện</th>
        <th>Mô tả ngắn</th>
        <th>Tác giả</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article['id'] ?></td>
                <td><?php echo $article['type_name'] ?></td>
                <td><?php echo $article['title'] ?></td>
                <td>
                    <?php if (!empty($article['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $article['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td ><p style="width: 200px;text-overflow: ellipsis;white-space:nowrap;overflow: hidden;">
                <?php
                    echo $article['description'] 
                ?></p></td>
                <td><?php echo $article['author'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($article['created_at'])) ?></td>
                <td><?php echo !empty($article['updated_at']) ? date('d-m-Y H:i:s', strtotime($article['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=article&action=detail&id=" . $article['id'];
                    $url_update = "index.php?controller=article&action=update&id=" . $article['id'];
                    $url_delete = "index.php?controller=article&action=delete&id=" . $article['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <?php if($_SESSION['user']['id'] == $article['userId']):?>
                        <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;

                        <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                    class="fa fa-trash"></i></a>
                    <?php endif;?>            
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>
<?php echo $pages; ?>