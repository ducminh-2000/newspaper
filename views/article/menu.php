    
    <div class="row">
        <div class="text-center" style="width:100%">
            <!-- <h1><p>Lọc</p></h1> -->
            <form action="" method="GET">
                <div class="form-group">
                    <label for="title">Nhập tên sách</label>
                    <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" id="title"
                        class="form-control"/>
                </div>
                <input type="hidden" name="controller" value="article"/>
                <input type="hidden" name="action" value="index"/>
                <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
                <a href="index.php?controller=article" class="btn btn-default">Xóa filter</a>
            </form>
        </div>
    </div>
    <div class="row" style="padding-top:50px">
        <?php if (!empty($articles)): $count = 0?>
            <?php foreach ($articles as $article): ?>

                <div class="col-md-4 padding_bottom2">
                <a href="index.php?controller=article&action=detail&id=<?php echo $article['id']?>">

                    <div class="our_img">
                        <figure><img src="assets/uploads/<?php echo $article['avatar'] ?>" alt="#"/></figure>
                    </div>
                    <div class="our_text_box three_box">
                        <div class="post_box d_flex padding_top3">
                            <h3 class="awesome padding_flot"><?php echo $article['title']?></h3>
        
                            <h4 class="flot_left1">Post By : <?php echo $article['author']?> </h4>
                        </div>
                        <p><?php echo $article['description']?></p>
                    </div>
                    </a>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
        <?php endif; ?>
    </div>

        

<?php echo $pages; ?>