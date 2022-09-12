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

    if($row['package'] != 'success'){
        header("location: index.php");
    }
    if($row['status'] == 1){
        header("location: ../newadmin/html/");
    }
    $package_query = "select * from package where username='$username'";
    $package_result = mysqli_query($con, $package_query);
    $package_row = mysqli_fetch_assoc($package_result);
    $selected_package = $package_row['package_name'];
    if($package_row){
    $package_name = $package_row['package_name'];
    }
    else{
        $package_name = "Package is not selected!!";
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
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>

    <div class="page-wrapper landrick-theme toggled">
        <nav id="sidebar" class="sidebar-wrapper sidebar-colored">
            <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
                <div class="sidebar-brand">
                    <a href="logout.php">
                        <img src="assets/images/logo.png" height="24" class="logo-light-mode" alt="">
                        <img src="assets/images/logo.png" height="24" class="logo-dark-mode" alt="">
                        <span class="sidebar-colored">
                            <img src="assets/images/logo.png" height="24" style="height: 50px;" alt="">
                            EASYEARN
                        </span>
                    </a>
                </div>

                <ul class="sidebar-menu">
                    <li><a href="dashboard.php"><i class="ti ti-home me-2"></i>Overview</a></li>
                    <li><a href="courses.php"><i class="ti ti-home me-2"></i>Courses</a></li>
                    <!-- <li><a href="certificate.php"><i class="ti ti-home me-2"></i>Certificate</a></li> -->
                    <li><a href="reference.php"><i class="ti ti-home me-2"></i>Reference</a></li>
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-user me-2"></i>Profile</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="edit-profile.php">User Profile</a></li>
                                <li><a href="edit-KYC.php">KYC Details</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- <li class="sidebar-dropdown">
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
                    <li><a href=""><i class="ti ti-home me-2"></i>Setting</a></li> -->
                </ul>
                <!-- sidebar-menu  -->
            </div>
            <!-- Sidebar Footer -->
            <ul class="sidebar-footer list-unstyled mb-0">
                <li class="list-inline-item mb-0">
                    <a href="login.php" class="btn btn-icon btn-soft-light"><i class="ti ti-shopping-cart"></i></a><a href="logout.php"><small class="color-white ms-1">Logout</small></a>
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
                        <img src="assets/images/logo.png" height="38" class="small" alt="">
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
                                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="image/<?php echo $img_photo ?>" class="avatar avatar-ex-small rounded" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="profile.html">
                                            <img src="image/<?php echo $img_photo ?>" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block"><?php echo $username ?></span>
                                                <small class="text-muted">EE190713</small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-mail"></i></span> Package: <?php echo $package_name ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Sponsor: None</a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span> Sponsor ID: None</a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-user-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Paackage Enrolled</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><span><?php echo $selected_package ?></span></p>
                </div>
            </div>
        </a>
    </div>
    <!--end col-->
    <!--end col-->
</div>
<!--end row-->

<div class="row">
    <div class="col-xl-8 col-lg-7 mt-4">
        <h5 class="mb-0 fw-bold p-3">Enrolled Courses</h5>
        <div class="row">
                        <a class="col-md-4" href = "learning-courses.php?course=1679091c5a880faf6fb5e6087eb1b2dc">
                <div class="card shadow border-0 rounded">
                    <div class="d-flex align-items-center">
                        <img src="assets/images/sales.png" class="img-fluid avatar avatar-md-md rounded shadow" alt="">
                        <h6 class="mb-0 ms-3 me-3">Sales Master Class</h6>
                    </div>
                </div>
            </a>
                        <a class="col-md-4" href = "learning-courses.php?course=9bf31c7ff062936a96d3c8bd1f8f2ff3">
                <div class="card shadow border-0 rounded">
                    <div class="d-flex align-items-center">
                        <img src="assets/images/lead.png" class="img-fluid avatar avatar-md-md rounded shadow" alt="">
                        <h6 class="mb-0 ms-3 me-3">Lead Generation Mastery</h6>
                    </div>
                </div>
            </a>
                    </div>
    </div>
    <!--end col-->

    <div class="col-xl-4 col-lg-5 mt-4 rounded">
        <div class="card shadow border-0">
            <div class="p-4 border-bottom row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <img src="assets/images/elite.png" width="100%" />
                </div>
            </div>
            <div class="d-flex justify-content-center m-3">
            <a href="courses.php" class="btn btn-outline-primary col-md-6">Start Learning</a>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
</main>
<!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->

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