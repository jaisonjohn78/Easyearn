<?php 

    ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    
    $_GET['authen'] = '';
    if($_GET['authen'] == 'success') {
                        
        $error = "<div style='color:red'> Payment Successfull please login to Visit Dashboard </div>";
        // set_message($error);
    }

    global $con;
    $error = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query_1 = mysqli_query($con, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query_1) {
        $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Account verification has been successfully completed.</p> ";
                // set_message($error);
            }
        } else {
            header("Location: index.php");
        }
    }
            if (isset($_POST['login_submit']) || $_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                if(isset($_GET['authen'])) {
                    if($_GET['authen'] == 'success') {
                        $id = $_POST['username'];
                        $sql = mysqli_query($con, "UPDATE `users` SET `package`='success' WHERE `email`='$username' OR `phone_no`='$username'");
                    }
                    
                }
        
        
                if (empty($username) || empty($password)) {
                    $error = "<div style='color:red'> Please fill your Credentials </div>";
                    set_message($error);
                } else {
                    $query = "select * from users where phone_no='$username' or email='$username'";
                    $result = mysqli_query($con, $query);
        
                    if ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['id'] = $row['id'];
                        $db_pass = $row['password'];
                        if((md5($password) != $db_pass)) {
                            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Please Enter Valid Password</p> ";
                        }
                        elseif ((md5($password) == $db_pass) && empty($row['code'])) {
                            $pack = $row['package'];
                            if($pack == '699' || $pack == 699)
                            {
                                redirect("https://pmny.in/jIEoN5GXJ7kQ");
                            }
                            if($pack == 2250 || $pack == '2250')
                            {
                                redirect("https://pmny.in/UI1VYoNLLxbz");
                            }
                            if($pack == 3850 || $pack == '3850')
                            {
                                redirect("https://pmny.in/Xr1VYhjpCfKz");
                            }
                            if($pack == 'success' )
                            {
                        ?>
                        <script>
                        window.location.href = '../user/dashboard.php';
                        </script>
                        <?php
                        }
                            $_SESSION['ID'] = $row['id'];
                            // $_SESSION['email'] = $row['email'];
                        } else {
                            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>First verify your account and try again</p> ";
                            // set_message($error);
                        }
                    } else {
                        $error = "<div class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 17px;text-align: center;'>Please enter valid Phone no and Email.</div>";
                        // set_message($error);
                    }
                }
            }
            ob_end_flush();
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
        <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/tabler-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
        <!-- Css -->
        <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>

        <!-- Hero Start -->
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row g-0 position-relative">
                <div class="col-lg-7 padding-less img order-1" style="background-image:url('assets/images/login.jpg')" data-jarallax='{"speed": 0.5}'></div>
                    <div class="col-lg-5 cover-my-30 order-2 offset-lg-7">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card login-page border-0" style="z-index: 1">
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-center font-weight-800">Login to your account</h4>  
                                            <hr>
                                            <?php
                                                echo $error ;
                                            ?>
                                            <form class="login-form mt-4" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Email Or Phone no" name="username" required="">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
        
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                                <input type="password" class="form-control ps-5" placeholder="Password" required="" name = "password">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
        
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="forgot-pass mb-3"><a href="reset-password.php" class="text-dark fw-bold">Forgot password ?</a></p>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-lg-12 mb-0">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary"  name="login_submit" type="submit">Sign in</button>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-12 text-center">
                                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="register.php" class="text-dark fw-bold">Sign Up</a></p>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->
        
        <!-- javascript -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- simplebar -->
        <script src="assets/js/simplebar.min.js"></script>
        <!-- Icons -->
        <script src="assets/js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        
    </body>
</html>