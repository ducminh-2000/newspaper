<?php
require_once 'helpers/Helper.php';
?>
<div class="container" style="">
    <div class="row">
        <div class="detail-content-wrap con-md-8 col-sm-8 col-xs-12">
            <div class="article-info-wrap">
                <div class="article-image-info">
                    <img src="assets/uploads/<?php echo $article['avatar'] ?>" width="260"
                         title="<?php echo $article['title']; ?>">
                </div>
                <div class="article-info">
                    <h3 class="article-title">
                      <?php echo "<h1>Tiêu đề bài viết: " .$article['title'] ."</h1>"; ?>
                    </h3>

                    <div class="article-description" style="word-wrap:break-word">
                      <?php echo "<p>Thể loại: " .$article['type_name'] ."</p>"; ?>
                    </div>
                    <div class="article-description" style="word-wrap:break-word">
                      <?php echo "<p>Tác giả: " .$article['author'] ."</p>"; ?>
                    </div>
                    <div class="article-description" style="word-wrap:break-word">
                      <?php echo "<p>Mô tả: " .$article['description'] ."</p>"; ?>
                    </div>
                    <div class="article-description" style="word-wrap:break-word">
                      <?php echo "<p>Nội dung: " .$article['content'] ."</p>"; ?>
                    </div>

                    <div class="article-content" style="word-wrap:break-word">
                      <p >Ngày tạo: <?php echo date('d-m-Y H:i:s', strtotime($article['created_at'])); ?></p>
                    </div>
                    <div class="article-content" style="word-wrap:break-word">
                      <p >Ngày cập nhật: <?php echo date('d-m-Y H:i:s', strtotime($article['updated_at'])); ?></p>
                    </div>
                </div>
            </div>
            <a href="index.php?controller=article&action=index" class="btn btn-default" style="padding-bottom:50px">Back</a>
        </div>
    </div>
</div>
