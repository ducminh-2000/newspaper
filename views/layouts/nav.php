<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $id = $_SESSION['user']['id'];
    // $avatar = $_SESSION['user']['avatar'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}

?>
<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.php?controller=article&action=index"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
        <i class="mdi mdi-menu"></i>
    </button>
    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
        <li class="nav-item nav-profile dropdown border-0">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
            <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
            <span class="profile-name"><?php echo $username?></span>
        </a>
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="index.php?controller=user&action=detail&id=<?php echo $id?>">
                <i class="mdi mdi-cached mr-2 text-success"></i> Profile 
            </a>
            <a class="dropdown-item" href="index.php?controller=user&action=logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout 
            </a>
        </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
    </button>
    </div>
</nav>