<?php
    ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    $id = $_SESSION['ID'];
    $msg="";
    $query = "select * from users where id=$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $ref_code = $row['reference_id'];
 
    $package_query = "select * from package where username='$username'";
    $package_result = mysqli_query($con, $package_query);
    $package_row = mysqli_fetch_assoc($package_result);
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
    
    if(isset($_POST['refer'])){
        $reference_code = trim($_POST['reference_code']);
        $today = date("F j, Y, g:i a"); 

        $sql = mysqli_query($con,"SELECT * from users WHERE reference_id = '$reference_code'");
        $result =mysqli_fetch_assoc($sql);
        if($result){
        
            $refered_by=$result['username'];
            $userid = $_SESSION['id'];
            $query = "SELECT * FROM `users` WHERE `id`=$userid";
            $result_query = mysqli_query($con,$query);
            $result = mysqli_fetch_assoc($result_query);
            $username = $result['username'];
            // $total_balance = $result['amount'];
            $sql1 = mysqli_query($con,"SELECT * from `reference` WHERE `user_id` = '$id' AND `reference_id` = '$reference_code'");
        }else {
            $msg = "Invalid Reference Code";
        }
        if(mysqli_num_rows($sql)){
            if(mysqli_num_rows($sql1) == 0){
              if($reference_code != $ref_code){
                mysqli_query($con,"INSERT INTO `reference`(`user_id`,`username`,`refered_by`,`reference_id`,`timestamp`) VALUES ('$id','$username','$refered_by','$reference_code','$today')");
                // $ref_profit = ($total_balance*10)/100;
                // $new_total_balance = $total_balance + $ref_profit;
                $check_users = mysqli_query($con,"SELECT * from `reference` WHERE `username` = '$refered_by'");
                $old_amount_query = mysqli_query($con,"SELECT * from `users` WHERE `username` = '$refered_by'");
                $old_amount_result =mysqli_fetch_assoc($old_amount_query);
                $old_amount = $old_amount_result['amount'];
                if(mysqli_num_rows($check_users) == 0){
                    mysqli_query($con,"UPDATE users SET amount = $old_amount + 400 where reference_id = '$reference_code'");
                    $msg = "<p style='background: #f2dedf;color: #9y7c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;'>Inserted!!!</p>";
                }
                else{
                    mysqli_query($con,"UPDATE users SET amount = $old_amount + 100 where reference_id = '$reference_code'");
                    $msg = "<p style='background: #f2dedf;color: #9y7c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;'>Inserted!!!</p>";
                }
              }
              else{
                $msg = "<p style='background: #f2dedf;color: #9y7c4150;border: 1px solid #e7ced1;padding:10px;
                text-align:center;'>You can not use your reference code</p>";
              }
            }
        else{
            $msg = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
            text-align:center;'>Already exist</p>";
        }
    }
        else{
            $msg ="<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
            text-align:center;'>Please Enter Valid Reference Code!!!</p>";
        }
    }
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
                                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="image/<?php echo $img_photo ?>" class="avatar avatar-ex-small rounded" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="edit-profile.php">
                                            <img src="image/<?php echo $img_photo ?>" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block"><?php echo $username ?></span>
                                                <small class="text-muted"> </small>
                                                
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-mail"></i></span> Package: <?php echo $package_name ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-coin"></i></span> Pckage amount: ₹<?php echo $package_amount ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-coin"></i></span> My Wallet: ₹<?php echo $row['amount'] ?></a>
                                        <a class="dropdown-item text-dark" href="logout.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><div class="row g-2">
    <!--end col-->

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-4">
    <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="d-flex top_box justify-content-center text-center my-2">
                                        <h3 class="m-0">Your Reference Code: </h3>

                                    </div>
                                </div>
                                <div class="col-xl-6 text-center my-2">

                                    <h1 class="fw-500 m-0" id="copycode">
                                        <?php echo $ref_code ?>
                                        <i class="mx-3 mdi mdi-checkbox-multiple-blank-outline btn-rounded btn-success down_box" 
                                            onclick="copyElementText()">
                                        </i>

                                    </h1>
                                </div>
                            </div>
            </div>
                       <div class="col-xl-8" style="margin:auto" ;>
                            <div class="card vh-auto">
                                <div class="card-header">
                                    <h1 class="card-title text-dark fw-500">Refer and Earn </h1>
                                </div>
                                <form action="" method="post">
                                    
                                    <div class="card-body">
                                    <?php echo $msg ?>
                                        <h5>Enter referral code</h5>
                                        <h4 class="msg"></h4>
                                        <div class="d-flex justify-content-end bg-light rounded p-30 mx-10 my-15">
                                            <input type="text" class="form-control" name="reference_code"
                                                placeholder="referral code" required>
                                            <input type="submit" class="btn btn-primary" name="refer" value="submit">
                                        </div>
                                        <hr>


                                    </div>

                                    <h5 style="margin-left:1rem"> Your referral link</h5>

                                    <?php
                                            $user_id = $_SESSION['id'];
                                            $query  = mysqli_query($con,"SELECT * FROM `users` WHERE `id`=$user_id");
                                            $result = mysqli_fetch_assoc($query);
                                            $ureferral_code = $result['reference_id'];
                                            $string_url = $base_url.'user/register.php?refer='.$ureferral_code;
                                            echo "<script>console.log($ureferral_code);</script>";
                                            ?>
                                    <div class="d-flex justify-content-end bg-light rounded p-15 mx-5 my-10">
                                        <input type="text" class="form-control" id="user_ref_code" name="reference_link"
                                            placeholder="your referral code" value="<?php echo $string_url?>" readonly>
                                        <i class="mx-3 mdi mdi-checkbox-multiple-blank-outline btn-rounded btn-success down_box"
                                            style="font-size:2rem;margin-top:.1rem;cursor:pointer" id="copy"
                                            onclick="myFunction()">
                                        </i>
                                        <!-- <input type="submit" class="btn btn-primary" name="refer" value="copy"> -->

                                        <hr>


                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
    <!--end col-->
</div>

            <!-- sidebar-wrapper  -->

            <!-- Start Page Content -->
 
        <!-- Offcanvas End -->
        <script>
            function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("user_ref_code");


            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
        }

        function copyElementText() {
            var text = document.getElementById("copycode").innerText;
            var elem = document.createElement("textarea");
            document.body.appendChild(elem);
            elem.value = text;
            elem.select();
            document.execCommand("copy");
            document.body.removeChild(elem);
            alert("copied code: " + text);
        }
        </script>
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