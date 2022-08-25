<?php
ob_start();
require_once 'config/db.php'; 
require_once 'config/function.php'; 

register_user();

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
                                            <h4 class="card-title text-center" style="margin-top:80px;">Register with Easyearn</h4>
                                            <hr>
                                            <?php
                                                if(isset($_SESSION['MESSAGE']))
                                                {
                                                    display_message();
                                                }
                                            ?>
                                            <form class="login-form mt-4" autocomplete="on" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Name" name="username" required="" value="">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                                <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="" value = "">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="phone-call" class="fea icon-sm icons"></i>
                                                                <input type="number" class="form-control ps-5" placeholder="Phone Number" name="phone" required="" maxlength="10" value = "">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Referal Code <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Referal Code" name="sponsorId" value = ""onchange="fetchName(this.value)">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3"> 
                                                            <label class="form-label">Referal User Name <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                                <input id = "sponsor" type="text" class="form-control ps-5" placeholder="Referal User Name" name="sponsorName"  readonly>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Select Package <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="package" class="fea icon-sm icons"></i>
                                                                <select name = "package" class="form-control ps-5" required onchange="updatePrice(this.value)">
                                                                    <option selected disabled value="">Select Package</option>
                                                                    <option value="Elite Package">Elite Package</option>
                                                                    <option value="Silver Package">Silver Package</option>
                                                                    <option value="Gold Package">Gold Package</option>                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3"> 
                                                            <label class="form-label">Amount <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  class="feather feather-user fea icon-sm icons"><path d="M.0022 64C.0022 46.33 14.33 32 32 32H288C305.7 32 320 46.33 320 64C320 81.67 305.7 96 288 96H231.8C241.4 110.4 248.5 126.6 252.4 144H288C305.7 144 320 158.3 320 176C320 193.7 305.7 208 288 208H252.4C239.2 266.3 190.5 311.2 130.3 318.9L274.6 421.1C288.1 432.2 292.3 452.2 282 466.6C271.8 480.1 251.8 484.3 237.4 474L13.4 314C2.083 305.1-2.716 291.5 1.529 278.2C5.774 264.1 18.09 256 32 256H112C144.8 256 173 236.3 185.3 208H32C14.33 208 .0022 193.7 .0022 176C.0022 158.3 14.33 144 32 144H185.3C173 115.7 144.8 96 112 96H32C14.33 96 .0022 81.67 .0022 64V64z"/></svg>
                                                                <input type="text" class="form-control ps-5" placeholder="Amount" name="amount" required="" readonly>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                                <input type="password" class="form-control ps-5" placeholder="Password" required="" value="" name = "password">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                                <input type="password" class="form-control ps-5" placeholder="Password" required="" value = "" name = "cpassword">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit" name="submit">Register</button>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="mx-auto">
                                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="index.php" class="text-dark fw-bold">Sign in</a></p>
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
            'Elite Package':'508','Silver Package':'1999','Gold Package':'3500',        };
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