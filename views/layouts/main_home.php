<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>E-Newspaper</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="assets/frontend/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="assets/frontend/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="assets/frontend/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="assets/frontend/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <div class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="assets/frontend/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <?php require_once 'header_home.php';?>
      <!-- end header -->
      <!-- main -->
      <div class="blog_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Bài viết mới</h2>
                  </div>
               </div>
            </div>
             <!-- three section -->
            <!-- <div class="row">
                  <div class="col-md-6 padding_bottom2">
                  <div class="our_img">
                     <figure><img src="images/our_img3.jpg" alt="#"/></figure>
                  </div>
                  <div class="our_text_box three_box">
                     
                     
                     <div class="post_box d_flex padding_top3">
                        <h3 class="awesome padding_flot">Chad-Montano</h3>
                        <h4 class="flot_left1">Post By : Blogger </h4>
                        <ul class="like padding_left2">
                           <li><a href="#"><img src="images/like.png" alt="#"/>Like</a></li>
                              <li><a href="#"><img src="images/comm.png" alt="#"/>Comment</a></li>
                        </ul>
                     </div>
                     <p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimquis nostrud exercitation ullamco laboris </p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="our_img">
                     <figure><img src="images/our_img4.jpg" alt="#"/></figure>
                  </div>
                  <div class="our_text_box three_box">
                     
                     
                     <div class="post_box d_flex padding_top3">
                           <h3 class="awesome padding_flot">Amezing  Place</h3>
                        <h4 class="flot_left1">Post By : Blogger </h4>
                        <ul class="like padding_left2">
                           <li><a href="#"><img src="images/like.png" alt="#"/>Like</a></li>
                              <li><a href="#"><img src="images/comm.png" alt="#"/>Comment</a></li>
                        </ul>
                     </div>
                     <p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimquis nostrud exercitation ullamco laboris </p>
                  </div>
               </div>
            </div> -->
            <?php echo $this->content;?>
         
     
    <!-- end three section -->


         </div>
      </div>
      <!-- end main -->

      <!-- footer -->
      <?php require_once 'footer_home.php';?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="assets/frontend/js/jquery.min.js"></script>
      <script src="assets/frontend/js/popper.min.js"></script>
      <script src="assets/frontend/js/bootstrap.bundle.min.js"></script>
      <script src="assets/frontend/js/jquery-3.0.0.min.js"></script>
      
      <!-- sidebar -->
      <script src="assets/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/frontend/js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

