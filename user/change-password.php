<?php
ob_start();
require_once 'config/db.php'; 
require_once 'config/function.php'; 

$error = "";
if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($con, md5($_POST['confirm-password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($con, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    
					$error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Password Successfully changed.</p> ";
                    ?>
                    <script>
                        // alert("Password Successfully changed.");
                    window.location.href="index.php";
                </script>
                <?php
                }
            } else {
                
					$error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Password and Confirm Password do not match.</p> ";
                // alert("Password and Confirm Password do not match.");
             
            }
        }
    } else {
		$error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Reset Link do not match.</p> ";

        // alert("Reset Link do not match.");
      
    }
} else {
    header("Location: change-password.php");
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
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

        <!-- Hero Start -->
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row g-0 position-relative">
                    <div class="col-lg-5 cover-my-30 order-2">
                        <div class="cover-user-img1 d-lg-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0" style="z-index: 1">
                            
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-center" >Register with Easyearn</h4>
                                            <hr>
                                           
                                            <?php echo $error ?>
                                            <form class="login-form mt-4" autocomplete="on" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email<span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Email" name="email" required="" value="">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Password<span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                                <input type="password" class="form-control ps-5" placeholder="Password" name="password" required="" value = "">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm-password <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="phone-call" class="fea icon-sm icons"></i>
                                                                <input type="password" class="form-control ps-5" placeholder="Confirm-password" name="confirm-password" required="" maxlength="10" value = "">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit" name="submit">Register</button>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="mx-auto">
                                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Back To ?</small> <a href="index.php" class="text-dark fw-bold">Sign in</a></p>
                                                    </div>
                                                </div><!--end row-->
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->    

                    <div class="col-lg-7 offset-lg-5 padding-less img order-1" style="background-image:url('assets/images/register.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->
        
        <!-- javascript -->
        <script> 
        let package = {
            'Elite Package':'699','Silver Package':'2250','Gold Package':'3850',        };
        let packageExtra = {
            'Elite Package':'699','Silver Package':'2250','Gold Package':'3850',        };
        function fetchName(data){
            fetch('php/fetchname.php?mtid='+data)
  .then(response => response.json())
  .then(data => {
      if(typeof(data.error) =='undefined'){
          document.getElementById('sponsor').value = data[0].name;
      }
      else{
        document.getElementById('sponsor').value = '';
      }
  });

        }
                function submitForm(e){
            var val = document.getElementById('sponsor').value;
            if(val!=''){
                return true;
            }
            return false;
        }
           function updatePrice(data){
               var referal = document.getElementById('sponsor').value;
               if(referal==''){
                   document.getElementsByName('amount')[0].value = packageExtra[data];
               }else{
                   document.getElementsByName('amount')[0].value = package[data];
               }
           }
                   </script>
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