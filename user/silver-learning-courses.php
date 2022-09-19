<?php
    ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    $id = $_SESSION['ID'];
    if(!isset($_SESSION['ID'])){
        header("location: index.php");
    }
    $query = "select * from users where id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    
    if($_GET['course'] != ""){
        $get_course = $_GET['course'];
        $video_query ="select * from videos where course = '$get_course'";
        $video_result = mysqli_query($con, $video_query);
        $video_row = mysqli_fetch_assoc($video_result);
        if($video_row){
        $course = $video_row['course'];
        }
        else{
            $course = "not";
        }
    }
    else{
        $course = "https://www.youtube.com/embed/TXdAvH4Pkhk";
    }

    $img_query1 = "select * from users where id=$id ";
    $img_result1 = mysqli_query($con, $img_query1);
    $img_fetch = mysqli_fetch_assoc($img_result1);
    $img_photo = $img_fetch['profile_photo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Easyearn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- logo -->
    <link rel="shortcut icon" href="assets/images/logo.png">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- simplebar -->
    <link href="assets/css/simplebar.css" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <!-- <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" integrity="sha512-fXnjLwoVZ01NUqS/7G5kAnhXNXat6v7e3M9PhoMHOTARUMCaf5qNO84r5x9AFf5HDzm3rEZD8sb/n6dZ19SzFA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="assets/css/tabler-icons.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" referrerpolicy="no-referrer" />
    <link href="assets/css/line.css" rel="stylesheet">
    <!-- Css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>

    <div class="page-wrapper landrick-theme toggled">
        <nav id="sidebar" class="sidebar-wrapper sidebar-colored">
            <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
                <div class="sidebar-brand">
                    <a href="logout.php">
                        <img src="assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                        <img src="assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                        <span class="sidebar-colored">
                            <img src="assets/images/logo.png" height="24" alt="" style="height:50px;">
                            Easyearn
                        </span>
                    </a>
                </div>

                <ul class="sidebar-menu">
                    <li><a href="dashboard.php"><i class="ti ti-home me-2"></i>Overview</a></li>
                    <li><a href="courses.php"><i class="ti ti-home me-2"></i>Courses</a></li>
                    <li><a href="certificate.php"><i class="ti ti-home me-2"></i>Certificate</a></li>
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-user me-2"></i>Profile</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="edit-profile.php">User Profile</a></li>
                                <li><a href="edit-KYC.php">KYC Details</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-brand-gravatar me-2"></i>Affiliate Panel</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="affiliate.php">Dashboard</a></li>
                                <li><a href="commission-list.php">Commision</a></li>
                                <li><a href="leaderboard.php">Leaderboard</a></li>
                                <li><a href="webinar.php">Webinar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href=""><i class="ti ti-home me-2"></i>Setting</a></li>
                </ul>
                <!-- sidebar-menu  -->
            </div>
            <!-- Sidebar Footer -->
            <ul class="sidebar-footer list-unstyled mb-0">
                <li class="list-inline-item mb-0">
                    <a href="login.php" class="btn btn-icon btn-soft-light"><i class="ti ti-shopping-cart"></i></a><a
                        href="logout.php"><small class="color-white ms-1">Logout</small></a>
                </li>
            </ul>
            <!-- Sidebar Footer -->
        </nav>
        <main class="page-content bg-light">
            <div class="top-header topHeader-display">
                <div class="header-bar d-flex justify-content-between border-bottom">
                    <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                    <a href="#" class="logo-icon me-3 top-header-extra">
                        <img src="assets/images/logo-icon.png" height="30" class="small" alt="">
                    </a>
                </div>
            </div>
            <div class="container-fluid">
                <div class="layout-specing">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-1">Welcome back, <?php echo $username ?> !</h6>
                            <h5 class="mb-0 text-cap">overview</h5>
                        </div>
                        <ul class="list-unstyled mb-0">


                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                            src="image/<?php echo $img_photo ?>" class="avatar avatar-ex-small rounded" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3"
                                        style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3"
                                            href="profile.html">
                                            <img src="image/<?php echo $img_photo ?>" class="avatar avatar-md-sm rounded-circle border shadow"
                                                alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block">patel hiren vanrajbhai</span>
                                                <small class="text-muted">MT190713</small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i
                                                    class="ti ti-mail"></i></span> Package: Elite Package</a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i
                                                    class="ti ti-home"></i></span> Sponsor: None</a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i
                                                    class="ti ti-settings"></i></span> Sponsor ID: None</a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span
                                                class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span>
                                            Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <style>
                    .lecture {
                        border: 5px solid #fcb300d6;
                        background: #fcb300d6;
                        border-radius: 10px;
                    }

                    .lecture-heading {
                        display: block;
                        background: #fcb300d6;
                        padding: 10px;
                    }

                    .lecture-name {
                        display: block;
                        background: #fff;
                        color: #2f55d4;
                        padding: 5px 10px;
                    }
                    </style>
                    <div class="row">
                        <div class="col-md-6">
                            <iframe width="420" height="315" src="<?php echo $course ?>">
                            </iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="lecture">
                                <span class="lecture-heading">Lecture Video</span>
                                <?php
                                        $lecture_query =$con->query("select * from videos WHERE category='Silver Package'");
                                        if(mysqli_num_rows($lecture_query)>0){
                                        while($lecture_row = $lecture_query->fetch_assoc()){
                                          $lecture_title = $lecture_row['lecture_title'];
                                          $lecture_id = $lecture_row['id'];
                                          $lecture_course = $lecture_row['course'];
                                         
                                        
                                ?>
                                <a
                                    href="silver-learning-courses.php?lectureId=<?php echo $lecture_id?>&course=<?php echo $lecture_course ?>">
                                    <span class="lecture-name">1 <?php echo $lecture_id ?> . <?php echo $lecture_title ?></span></a><a
                                    href="silver-learning-courses.php?lectureId=14&course=1679091c5a880faf6fb5e6087eb1b2dc">
                                    <?php 
                                }}
                                else
                                {
                                    echo "<h3 style='text-align:center;'>Video Lecturs are not uploaded !!</h3>";
                                }?>
                            </div>
                        </div>
                    </div>

                    <!-- sidebar-wrapper  -->

                    <!-- Start Page Content -->

                    <!-- Offcanvas End -->

                    <!-- javascript -->
                    <script src="assets/js/bootstrap.bundle.min.js"></script>
                    <!-- simplebar -->
                    <script src="assets/js/simplebar.min.js"></script>
                    <!-- Icons -->
                    <script src="assets/js/feather.min.js"></script>
                    <!-- Chart -->
                    <script src="assets/js/apexcharts.min.js"></script>
                    <!-- Main Js -->
                    <script src="assets/js/plugins.init.js"></script>
                    <script src="assets/js/app.js"></script>

</body>

</html>