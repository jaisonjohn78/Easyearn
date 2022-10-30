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
    $phone = $row['phone_no']; 
    $email = $row['email'];
    $refferral = $row['reference_id'];
    $amount = $row['amount'];

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
    $package_amount = $package_row['amount'];
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
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="edit-profile.php">
                                            <img src="image/<?php echo $img_photo ?>" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block"><?php echo $username ?></span>
                                                <small class="text-muted"><?php echo $refferral ?></small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-mail"></i></span> Package: <?php echo $package_name ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Package Amount: ₹<?php echo $package_amount ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-coin"></i></span> My Wallet: ₹<?php echo $amount ?></a>

                                        <!-- <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span> Sponsor ID: None</a> -->
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <style>
    .bg-fcb300d6{
        background: linear-gradient(45deg, #fff 10%, #fcb300d6 95%);
    }
    .bg-3eb6e4{
        background: linear-gradient(45deg, #3eb6e4 10%, #fff 95%);
    }
    .text-202942{
        color: #202942 !important;
    }
</style>
<div class="row dash-res-row">
    <div class="col-md-6">
        <div class="row row-cols-xl-2 row-cols-md-2 row-cols-1">
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-fcb300d6 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Today's Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?php echo $amount ?>"></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-fcb300d6 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Total's Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?php echo $amount ?>"></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <!--end col-->
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-3eb6e4 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Refferal Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target=""></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <!--end col-->




            <div class="col mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-3eb6e4 rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-users-alt fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Total Joining</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="8"></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <div class="col rounded dash-res-extra mt-4">
        <div class="card shadow border-0">
            <div class="p-4 border-bottom">
                <div class="row">
                    <div class="col-md-8 mt-4">
                        <h5 class="mb-0 text-left">Email</h5>
                        <h6 class="text-muted ps-2"><?php echo $email ?></h6>
                        <h5 class="mb-0 text-left">Phone</h5>
                        <h6 class="text-muted ps-2"><?php echo $phone ?></h6>
                        <h5 class="mb-0 text-left">Username</h5>
                        <h6 class="text-muted ps-2"><?php echo $username ?></h6>
                        <h5 class="mb-0 text-left">Package</h5>
                        <h6 class="text-muted ps-2">Elite Package</h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!--end col-->
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 mt-4 rounded">
        <div class="card shadow border-0">
            <div class="p-4 border-bottom dash-p-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mt-4 text-md-start text-center dash-res-user">
                            <div class="text-center">
                                <img src="image/<?php echo $img_photo ?>" class="avatar float-md-center avatar-medium rounded-circle shadow md-4" alt="">
                            </div>
                            <div class="pt-4">
                                <h6 class="mb-0 text-center"><?php echo $username ?></h6>
                                <h6 class="mb-0 text-center"><?php echo 'UserID : E'.$id ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-4 dash-res">
                        <h5 class="mb-0 text-left">Email</h5>
                        <h6 class="text-muted ps-2"><?php echo $email ?></h6>
                        <h5 class="mb-0 text-left">Phone</h5>
                        <h6 class="text-muted ps-2"><?php echo $phone ?></h6>
                        <h5 class="mb-0 text-left">Refferal Code</h5>
                        <h6 class="text-muted ps-2"><?php echo $refferral ?></h6>
                        <h5 class="mb-0 text-left">Package</h5>
                        <h6 class="text-muted ps-2">Elite Package</h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
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