<?php
    ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    $id = $_SESSION['ID'];
    if(!isset($_SESSION['ID'])){
        header("location: index.php");
    }
    $error = "";
    $query = "select * from users where id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $refferal = $row['reference_id'];
    $amount = $row['amount'];
    
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $get_package_name = $_GET['package'];
    }
    else{
        $get_package_name = "";
    }
    $package_query = "select * from package where username='$username'";
    $package_result = mysqli_query($con, $package_query);
    $package_row = mysqli_fetch_assoc($package_result);
    if($package_row){
    $package_name = $package_row['package_name'];
    $package_amount = $package_row['amount'];
    }
    else{
        $package_name = "Package is not selected!!";
    }

    $img_query1 = "select * from users where id=$id ";
    $img_result1 = mysqli_query($con, $img_query1);
    $img_fetch = mysqli_fetch_assoc($img_result1);
    $img_photo = $img_fetch['profile_photo'];


    if($get_package_name != ""){
        $buy1_sql = "UPDATE `package` SET `package_name` = '$get_package_name' , amount = 2250 WHERE `username` = '$username'";
        $buy1_data = mysqli_query($con, $buy1_sql);
        header("Location: courses.php");
    }
    //     if($buy1_data){
    //         $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
    //                         text-align:center;border-radius:10px;'>Silver Package has been selected</p>";
    //         ?>
            <script>
    //             window.location.href = "courses.php";
    //             </script>
                <?php
    //     }
    //     else{
    //         $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
    //                         text-align:center;border-radius:10px;'> Oops Something Went Wrong :( </p>";
    //     }
    // }
    // if(isset($_POST['buy2']))
    // {
    //     $buy1_sql = "UPDATE `package` SET `package_name` = 'Gold Package' , amount = 3500 WHERE `username` = '$username'";
    //     $buy1_data = mysqli_query($con, $buy1_sql);

    //     if($buy1_data){
    //         $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
    //                         text-align:center;border-radius:10px;'>Silver Package has been selected</p>";
    //                         ?>
                            <script>
    //                         window.location.href = "courses.php";
    //                         </script>
                          <?php
    //     }
    //     else{
    //         $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
    //                         text-align:center;border-radius:10px;'> Oops Something Went Wrong :( </p>";
    //     }
    // }
    // if(isset($_POST['buy3']))
    // {
    //     $buy1_sql = "UPDATE `package` SET `package_name` = 'Gold Package' , amount = 3500 WHERE `username` = '$username'";
    //     $buy1_data = mysqli_query($con, $buy1_sql);

    //     if($buy1_data){
    //         $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
    //                         text-align:center;border-radius:10px;'>Silver Package has been selected</p>";
    //                        ?>
                          <script>
    //             window.location.href = "courses.php";
    //             </script>
              <?php
    //     }
    //     else{
    //         $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
    //                         text-align:center;border-radius:10px;'> Oops Something Went Wrong :( </p>";
    //     }
    // }

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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>

    <div class="page-wrapper landrick-theme toggled">
        <nav id="sidebar" class="sidebar-wrapper sidebar-colored">
            <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
                <div class="sidebar-brand">
                    <a href="logout.php">
                        <img src="assets/images/logo.png" height="24" alt="">
                    
                        <span class="sidebar-colored">
                            <img src="assets/images/logo.png" height="24" style="height:50px;">
                            Easyearn
                        </span>
                    </a>
                </div>

                <ul class="sidebar-menu">
                    <li><a href="dashboard.php"><i class="ti ti-home me-2"></i>Overview</a></li>
                    <li><a href="courses.php"><i class="ti ti-home me-2"></i>Courses</a></li>
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
                                            href="edit-profile.php">
                                            <?php
                                                $img_query1 = " select * from users where id=$id ";
                                                $img_result1 = mysqli_query($con, $img_query1);
                                                    while ($img_data1 = mysqli_fetch_assoc($img_result1)) {
                                            ?>
                                            <img src="./image/<?php echo $img_data1['profile_photo']; ?>"
                                                class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4"
                                                alt="" id="file-data">
                                            <?php
                                            }
                                                ?>
                                            <div class="flex-1 ms-2">
                                                <span class="d-block"><?php echo $username ?></span>
                                                <small class="text-muted"><?php echo $refferal ?></small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i
                                                    class="ti ti-mail"></i></span> Package:
                                            <?php echo $package_name ?></a>
                                            <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Package Amount: <?php echo $package_amount ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-coin"></i></span> My Wallet: ₹<?php echo $amount ?></a>
                                        <!-- <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i
                                                    class="ti ti-settings"></i></span> Sponsor ID: None</a> -->
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span
                                                class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span>
                                            Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php echo $error ?>
                    <div class="row justify-content-center">
                        <?php
                            if($package_name == "Elite Package"){
                        ?>
                        <div class="col-md-4">
                            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                <img src="../admin@millionairetrack/images/Package1646364123.png"
                                    class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                <form action="" method="POST"></form>
                                    <div class="section-title ms-md-4">
                                        <h5>Elite Package</h5>
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <h6 class="text-muted mb-0">₹ 699 </h6>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-primary ms-2" href="elite-learning-courses.php?course=">Enroll</a>
                                            <!-- <a href="" ><button class="btn btn-soft-primary ms-2" type="submit" name="package1">Buy Now</button></a> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                <img src="../admin@millionairetrack/images/Package1646364204.png"
                                    class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                <div class="section-title ms-md-4">
                                    <h5 id="silver">Silver Package</h5>
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <h6 class="text-muted mb-0">₹ 2250 </h6>
                                    </div>
                                    <div class="mt-4">
                                            <div class="mt-4">
                                                <a class="btn btn-primary ms-2" >Enroll</a>
                                                <!-- <input type="submit" class="btn btn-soft-primary ms-2"
                                                    name="buy1" value="Buy Now"/> -->
                                                    <input type="button" class="btn btn-soft-primary ms-2" name="btn" id="btn" value="Buy Now" onclick="silver_pay_now()"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                       
                        <div class="col-md-4">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                    <img src="../admin@millionairetrack/images/Package1646364247.png"
                                        class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                    <div class="section-title ms-md-4">
                                        <h5 id="gold">Gold Package</h5>
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <h6 class="text-muted mb-0">₹ 3850 </h6>
                                        </div>

                                        <div class="mt-4">
            
                                            <div class="mt-4">
                                                <a class="btn btn-primary ms-2" >Enroll</a>
                                                <!-- <input type="submit" class="btn btn-soft-primary ms-2"
                                                        name="buy2" value="Buy Now"/> -->
                                                <input type="button" class="btn btn-soft-primary ms-2" name="btn" id="btn" value="Buy Now" onclick="e_gold_pay_now()"/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                            <?php
                                }elseif($package_name == "Silver Package"){
                            ?>
                            <div class="col-md-4">
                                <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                    <img src="../admin@millionairetrack/images/Package1646364123.png"
                                        class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                    <div class="section-title ms-md-4">
                                        <h5>Elite Package</h5>
                                        <!-- <div class="d-md-flex justify-content-between align-items-center">
                                            <h6 class="text-muted mb-0">₹ 508 </h6>
                                        </div> -->
                                        <div class="mt-4">
                                            <a class="btn btn-primary ms-2" href="elite-learning-courses.php?course=">Enroll</a>
                                            <!-- <a href="" ><button class="btn btn-soft-primary ms-2" type="submit" name="package1">Buy Now</button></a> -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                <img src="../admin@millionairetrack/images/Package1646364204.png"
                                    class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                <div class="section-title ms-md-2">
                                    <h5>Silver Package</h5>
                                    <div>
                                        <h6 class="text-muted mb-0">₹ 2250 </h6>
                                </div>
                                    <!-- <div>
                                        <h6 class=" mb-0"  style="color:red">₹ 508 </h6>
                                </div>
                                    <div>
                                        <h6 class=" mb-0" style="font-size:20px;">₹ 1491 </h6>
                                    </div> -->
                                    <div class="mt-4">
                                        
                                        <div class="mt-4">
                                            <a class="btn btn-primary ms-2" href="silver-learning-courses.php?course=">Enroll</a>
                                            <!-- <a class="btn btn-soft-primary ms-2"
                                                href="php/upgrade-cashfree-package.php?package=1">Buy Now</a> -->
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <form method="POST" action="" enctype="multipart/form-data">
                                <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                    <img src="../admin@millionairetrack/images/Package1646364247.png"
                                        class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                    <div class="section-title ms-md-4">
                                        <h5 id="s_gold">Gold Package</h5>
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <h6 class="text-muted mb-0">₹ 3850 </h6>
                                        </div>

                                        <div class="mt-4">
            
                                            <div class="mt-4">
                                                <a class="btn btn-primary ms-2" >Enroll</a>
                                                <!-- <input type="submit" class="btn btn-soft-primary ms-2"
                                                            name="buy3" onclick="pay_now()" value="Buy Now"/> -->
                                                            <input type="button" class="btn btn-soft-primary ms-2" name="btn" id="btn" value="Buy Now" onclick="pay_now()"/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                            }elseif($package_name == "Gold Package"){
                        ?>
                        <div class="col-md-4">
                            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                <img src="../admin@millionairetrack/images/Package1646364123.png"
                                    class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                <div class="section-title ms-md-4">
                                    <h5>Elite Package</h5>
                                    <!-- <div class="d-md-flex justify-content-between align-items-center">
                                        <h6 class="text-muted mb-0">₹ 508 </h6>
                                    </div> -->
                                    <div class="mt-4">
                                        <a class="btn btn-primary ms-2" href="elite-learning-courses.php?course=">Enroll</a>
                                        <!-- <a href="" ><button class="btn btn-soft-primary ms-2" type="submit" name="package1">Buy Now</button></a> -->
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                <img src="../admin@millionairetrack/images/Package1646364204.png"
                                    class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                <div class="section-title ms-md-4">
                                    <h5>Silver Package</h5>
                                    <!-- <div class="d-md-flex justify-content-between align-items-center">
                                        <h6 class="text-muted mb-0">₹ 1999 </h6>
                                    </div> -->
                                    <div class="mt-4">
                                        
                                        <div class="mt-4">
                                            <a class="btn btn-primary ms-2" href="silver-learning-courses.php?course=">Enroll</a>
                                            <!-- <a class="btn btn-soft-primary ms-2"
                                                href="php/upgrade-cashfree-package.php?package=1">Buy Now</a> -->
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                                <img src="../admin@millionairetrack/images/Package1646364247.png"
                                    class="img-fluid rounded courseImageExtra" alt="" width="260px">
                                <div class="section-title ms-md-4">
                                    <h5>Gold Package</h5>
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <h6 class="text-muted mb-0">₹ 3850 </h6>
                                    </div>
                                    <!-- <div>
                                        <h6 class="mb-0" style="color:red">₹ 1999 </h6>
                                    </div>
                                    <div>
                                        <h6 class=" mb-0"  style="color:red">₹ 508 </h6>
                                    </div>
                                    <div>
                                        <h6 class=" mb-0" style="font-size:20px;">₹ 2009 </h6>
                                    </div> -->
                                    <div class="mt-4">
        
                                        <div class="mt-4">
                                            <a class="btn btn-primary ms-2" href="gold-learning-courses.php?course=">Enroll</a>
                                            <!-- <a class="btn btn-soft-primary ms-2"
                                                href="php/upgrade-cashfree-package.php?package=1">Buy Now</a> -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            } 
                        ?>
                    </div>
                    <h5 class="mb-0 fw-bold p-3">Courses in your enrolled Package</h5>
                    <div class="row">
                        <a class="col-md-4" href="learning-courses.php?course=">
                            <div class="card shadow border-0 rounded">
                                <div class="d-flex align-items-center">
                                    <img src="../admin@millionairetrack/images/Package1646449414.png"
                                        class="img-fluid avatar avatar-md-md rounded shadow" alt="">
                                    <h6 class="mb-0 ms-3 me-3">Sales Master Class</h6>
                                </div>
                            </div>
                        </a>
                        <a class="col-md-4" href="lead-learning-courses.php?course=">
                            <div class="card shadow border-0 rounded">
                                <div class="d-flex align-items-center">
                                    <img src="../admin@millionairetrack/images/course1657015785.png"
                                        class="img-fluid avatar avatar-md-md rounded shadow" alt="">
                                    <h6 class="mb-0 ms-3 me-3">Lead Generation Mastery</h6>
                                </div>
                            </div>
                        </a>
                    </div>
        </main>
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

    <script>
        function gold_pay_now(){
            var package_name=jQuery('#package_name').text();
           
            var amt = 3850;
            // console.log(package_name);
            // console.log(amt);
            jQuery.ajax({
                type:'post',
                url:'update_package.php',
                data:"amt="+amt+"&package_name="+package_name,
                success:function(result){
                    var options = {
                            "key": "rzp_live_UhvoCF0admOUso", 
                            "amount": amt*100, 
                            "currency": "INR",
                            "name": "Easyearn",
                            "description": "Proceed To Enroll",
                            "image": "./image/logo.png",
                            "handler": function (response){
                            jQuery.ajax({
                                type:'post',
                                url:'update_package.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="courses.php?package=Gold Package";
                                }
                            });
                            console.log(response);
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
            });
        }
        function silver_pay_now(){
            var package_name=jQuery('#silver').text();
            var amt = 2250;
            // console.log(package_name);
            // console.log(amt);
            jQuery.ajax({
                type:'post',
                url:'update_package.php',
                data:"amt="+amt+"&package_name="+package_name,
                success:function(result){
                    var options = {
                            "key": "rzp_live_UhvoCF0admOUso", 
                            "amount": amt*100, 
                            "currency": "INR",
                            "name": "Easyearn",
                            "description": "Proceed To Enroll",
                            "image": "./image/logo.png",
                            "handler": function (response){
                            jQuery.ajax({
                                type:'post',
                                url:'update_package.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="courses.php?package=Silver Package";
                                }
                            });
                            console.log(response);
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
            });
        }
        function e_gold_pay_now(){
            var package_name=jQuery('#gold').text();
            var amt = 3850;
            // console.log(package_name);
            // console.log(amt);
            jQuery.ajax({
                type:'post',
                url:'update_package.php',
                data:"amt="+amt+"&package_name="+package_name,
                success:function(result){
                    var options = {
                            "key": "rzp_live_UhvoCF0admOUso", 
                            "amount": amt*100, 
                            "currency": "INR",
                            "name": "Easyearn",
                            "description": "Proceed To Enroll",
                            "image": "./image/logo.png",
                            "handler": function (response){
                            jQuery.ajax({
                                type:'post',
                                url:'update_package.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="courses.php?package=Gold Package";
                                }
                            });
                            console.log(response);
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
            });
        }
        // console.log(username);
        function pay_now(){
            var package_name=jQuery('#s_gold').text();
            var amt = 3850;
            
            // console.log(package_name);
            // console.log(amt);
            jQuery.ajax({
                type:'post',
                url:'update_package.php',
                data:"amt="+amt+"&package_name="+package_name,
                success:function(result){
                    var options = {
                            "key": "rzp_live_UhvoCF0admOUso", 
                            "amount": amt*100, 
                            "currency": "INR",
                            "name": "Easyearn",
                            "description": "Proceed To Enroll",
                            "image": "./image/logo.png",
                            "handler": function (response){
                            jQuery.ajax({
                                type:'post',
                                url:'update_package.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="courses.php?package=Gold Package";
                                }
                            });
                            console.log(response);
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                }
            });
        }
    </script>
</body>


</html>