<!-- Start Menu -->
<div class="row">
    <?php if (!empty($articles)): $count = 0?>
        <?php foreach ($articles as $article): ?>
            <?php if($count < 6):?>
                <?php $count++?>
                    <div class="col-md-6 padding_bottom2">
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
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>

        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*"><a href="index.php?controller=article&action=index">Xem thêm</a></button>
                    </div>
                </div>
            </div>
        </div>
<!-- End Menu -->
