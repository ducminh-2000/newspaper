<div class="container">
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
                    <div class="article-description">
                      <?php echo "<h3>" .$article['description'] ."</h3>"; ?>
                    </div>
                    <div class="article-content" style="word-wrap:break-word">
                      <p ><?php echo $article['content']; ?></p>
                    </div>
                </div>
            </div>
            <a href="index.php?controller=article&action=index" class="btn btn-default">Back</a>
        </div>
    </div>
</div>