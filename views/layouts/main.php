<!DOCTYPE html>
<html lang="en" style="height:100%">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script src="assets/ckfinder/ckfinder.js"></script>

</head>
<body style="height:100%">
<div class="container-scroller"  style="height:100%">
    <!-- sidebar -->
        <?php require_once 'sidebar.php';?>
    <!-- end -->
    <div class="container-fluid page-body-wrapper">

    <!-- nav -->
        <?php require_once 'nav.php';?>
        <div class="main-panel">
          <div class="content-wrapper pb-0" style="overflow:auto">
            <!-- header -->
            <?php require_once 'header.php';?>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($this->error)): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $this->error;
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
            <?php echo $this->content?>
          </div>
          
          <!-- footer -->
          <?php require_once 'footer.php';?>
        </div>
    </div>
      <!-- page-body-wrapper ends -->
</div>
<script>
    ClassicEditor
        .create(document.querySelector( '#content' ),{
           ckfinder: {
                uploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
            },
            toolbar:{
                items: ['selectAll', 'undo', 'redo', 'bold', 'italic', 'blockQuote', 'link', 'ckfinder', 'uploadImage', 'imageUpload', 'heading', 'imageTextAlternative', 'toggleImageCaption', 'imageStyle:inline', 'imageStyle:alignLeft', 'imageStyle:alignRight', 'imageStyle:alignCenter', 'imageStyle:alignBlockLeft', 'imageStyle:alignBlockRight', 'imageStyle:block', 'imageStyle:side', 'imageStyle:wrapText', 'imageStyle:breakText', 'indent', 'outdent', 'numberedList', 'bulletedList', 'mediaEmbed', 'insertTable', 'tableColumn', 'tableRow', 'mergeTableCells'],                
                shouldNotGroupWhenFull: true
            }

        })
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/vendors/flot/jquery.flot.js"></script>
<script src="assets/vendors/flot/jquery.flot.resize.js"></script>
<script src="assets/vendors/flot/jquery.flot.categories.js"></script>
<script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
<script src="assets/vendors/flot/jquery.flot.stack.js"></script>
<script src="assets/vendors/flot/jquery.flot.pie.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
</body>
</html>