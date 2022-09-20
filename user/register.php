<?php
ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    global $con;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '.././vendor/autoload.php';
    $error = "";

    if(isset($_GET['refer'])) {
        $reference_code = $_GET['refer'];
        $user_sql = mysqli_query($con,"SELECT * from users WHERE reference_id = '$reference_code'");
        $user_result =mysqli_fetch_assoc($user_sql);
        $refered_by=$user_result['username'];
        
    } else {
        $reference_code = "";
        $refered_by = "";
    }

// $code = mysqli_real_escape_string($con, md5(rand()));
if(isset($_POST['submit']) || $_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword =$_POST['cpassword'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    if(isset($_POST['sponsorId'])) {
        $refered_code_post = $_POST['sponsorId'];
    }
    $amount = $_POST['amount'];
    
    $code = mysqli_real_escape_string($con, md5(rand()));

    if(empty($username) || empty($email) || empty($password) || empty($cpassword))
    {
        $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
        text-align:center;border-radius:10px;'>Please Check your Registration </p>";
        // set_message($error);
    }
    else
    {
        if($password != $cpassword)
        {
            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
            text-align:center;border-radius:10px;'> Your Password not matched </p>";
            // set_message($error);
        }
        else
        {           
                    $query = "select * from users where email='$email'";
                    $result = mysqli_query($con,$query);
    
                    if(mysqli_num_rows($result))
                    {
                        $error = "<div class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Email Already Exists </div>";
                       
                    }
                    else
                    {
                        $hash = md5($password);
                        date_default_timezone_set('Asia/Kolkata');
                        $datetime = date("F j, Y g:i:s a");
                        function random_strings($length_of_string) 
                        { 
                            $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
                            return substr(str_shuffle($str_result), 0, $length_of_string); 
                        } 
                        $refer_code =  random_strings(8);
                         
                        $sql = "INSERT INTO users(username,email, phone_no, password, package,code,reference_id) VALUES('$username','$email','$phone', '$hash', '$amount','$code','$refer_code')";
                        $data = mysqli_query($con, $sql);
                        $package_sql = "INSERT INTO package(username,package_name,amount) VALUES('$username','$package','$amount')";
                        $package_data = mysqli_query($con, $package_sql);

                        
                        if($data)
                        {
                            echo "<div style='display: none;'>";
                            //Create an instance; passing `true` enables exceptions
                            $mail = new PHPMailer(true);
                            try 
                            {
                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                $mail->isSMTP();                                            //Send using SMTP
                                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                $mail->Username   = 'hardikzz0409@gmail.com';                  
                                $mail->Password   = 'cnrtxgwyqwmhocpa';        //SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                                //Recipients
                                $mail->setFrom('hardikzz0409@gmail.com');
                                $mail->addAddress($email);
        
                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Registration Successful';
                                $mail->Body    = "<!DOCTYPE html>
                                <html>
                                
                                <head>
                                    <title></title>
                                    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                                    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
                                    <style type='text/css'>
                                        @media screen {
                                            @font-face {
                                                font-family: 'Lato';
                                                font-style: normal;
                                                font-weight: 400;
                                                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                                            }
                                
                                            @font-face {
                                                font-family: 'Lato';
                                                font-style: normal;
                                                font-weight: 700;
                                                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                                            }
                                
                                            @font-face {
                                                font-family: 'Lato';
                                                font-style: italic;
                                                font-weight: 400;
                                                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                                            }
                                
                                            @font-face {
                                                font-family: 'Lato';
                                                font-style: italic;
                                                font-weight: 700;
                                                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                                            }
                                        }
                                
                                        /* CLIENT-SPECIFIC STYLES */
                                        body,
                                        table,
                                        td,
                                        a {
                                            -webkit-text-size-adjust: 100%;
                                            -ms-text-size-adjust: 100%;
                                        }
                                
                                        table,
                                        td {
                                            mso-table-lspace: 0pt;
                                            mso-table-rspace: 0pt;
                                        }
                                
                                        img {
                                            -ms-interpolation-mode: bicubic;
                                        }
                                
                                        /* RESET STYLES */
                                        img {
                                            border: 0;
                                            height: auto;
                                            line-height: 100%;
                                            outline: none;
                                            text-decoration: none;
                                        }
                                
                                        table {
                                            border-collapse: collapse !important;
                                        }
                                
                                        body {
                                            height: 100% !important;
                                            margin: 0 !important;
                                            padding: 0 !important;
                                            width: 100% !important;
                                        }
                                
                                        /* iOS BLUE LINKS */
                                        a[x-apple-data-detectors] {
                                            color: inherit !important;
                                            text-decoration: none !important;
                                            font-size: inherit !important;
                                            font-family: inherit !important;
                                            font-weight: inherit !important;
                                            line-height: inherit !important;
                                        }
                                
                                        /* MOBILE STYLES */
                                        @media screen and (max-width:600px) {
                                            h1 {
                                                font-size: 32px !important;
                                                line-height: 32px !important;
                                            }
                                        }
                                
                                        /* ANDROID CENTER FIX */
                                        div[style*='margin: 16px 0;'] {
                                            margin: 0 !important;
                                        }
                                    </style>
                                </head>
                                
                                <body style='background-color: #c0c0c0; margin: 0 !important; padding: 0 !important;'>
                                    <!-- HIDDEN PREHEADER TEXT -->
                                    
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <!-- LOGO -->
                                        <tr>
                                            <td bgcolor='#7132ed' align='center'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                    <tr>
                                                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor='#7132ed' align='center' style='padding: 0px 10px 0px 10px;'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                                            <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome!</h1> <img src='".$base_url."user/image/logo.png' width='150' style='display: block; border: 0px; user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;' draggable='false' />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #434343; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                            <p style='margin: 0; text-align: center;'>We're really very excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='left'>
                                                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                <tr>
                                                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                                                        <table border='0' cellspacing='0' cellpadding='0'>
                                                                            <tr>
                                                                                <td align='center' style='border-radius: 3px;' bgcolor='#7132ed'><a href='".$base_url."user/index.php?verification=".$code."'  style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #068f06; display: inline-block;'>Confirm Account</a></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr> <!-- COPY -->
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                            <p style='margin: 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
                                                        </td>
                                                    </tr> <!-- COPY -->
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                            <p style='margin: 0;'><a href='".$base_url."user/index.php?verification=".$code."' style='color: #068f06;'>".$base_url."user/index.php?verification=".$code."</a></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                            <p style='margin: 0;'>If you have any questions, just reply to this email&mdash;we're always happy to help out.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                            <p style='margin: 0;'>Cheers,<br>Easyearn Foundation</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                    <tr>
                                                        <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                                                            <p style='margin: 0;'><a href=''>We&rsquo;re here to help you out</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                                    <tr>
                                                        <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
                                                            <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='../' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </body>
                                
                                </html>";
                                $mail->send();
                                $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                                text-align:center;border-radius:10px;'>Successfully Registered </p>";
                               
                                
                            } 
                            catch (Exception $e) {
                                $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                                text-align:center;border-radius:10px;'>Message could not be sent. Mailer Error: { $mail->ErrorInfo } </p>";
                                // alert("Message could not be sent. Mailer Error: { $mail->ErrorInfo }");
                            }
                            echo "</div>";
                            $today = date("F j, Y, g:i a"); 
                            
                            if(isset($refered_code_post)) {
                                $get_sql = mysqli_query($con,"SELECT * from users WHERE reference_id = '$reference_code'");
                                $get_result =mysqli_fetch_assoc($get_sql);
                                $refered_by=$get_result['username'];
                                
                            
                            $sql1 = mysqli_query($con,"SELECT * from `reference` WHERE `username` = '$username' AND `reference_id` = '$reference_code'");
                            if(mysqli_num_rows($get_sql)){
                                if(mysqli_num_rows($sql1) == 0){
                                  if($reference_code != $refer_code){
                                    mysqli_query($con,"INSERT INTO `reference`(`username`,`refered_by`,`reference_id`,`timestamp`) VALUES ('$username','$refered_by','$reference_code','$today')");
                                    $check_users = mysqli_query($con,"SELECT * from `reference` WHERE `username` = '$refered_by'");
                                    $old_amount_query = mysqli_query($con,"SELECT * from `users` WHERE `username` = '$refered_by'");
                                    $old_amount_result =mysqli_fetch_assoc($old_amount_query);
                                    $old_amount = $old_amount_result['amount'];
                                    if(mysqli_num_rows($check_users) == 0){
                                        mysqli_query($con,"UPDATE users SET amount = $old_amount + 400 where reference_id = '$reference_code'");
                                        $error = "<p style='background: #f2dedf;color: #9y7c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;'>Inserted!!!</p>";
                                    }
                                    else{
                                        mysqli_query($con,"UPDATE users SET amount = $old_amount + 100 where reference_id = '$reference_code'");
                                        $error = "<p style='background: #f2dedf;color: #9y7c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;'>Inserted!!!</p>";
                                    }
                                  }
                                  else{
                                    $error = "<p style='background: #f2dedf;color: #9y7c4150;border: 1px solid #e7ced1;padding:10px;
                                    text-align:center;'>You can not use your reference code</p>";
                                  }
                                }
                                else{
                                    $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                                    text-align:center;'>Already exist</p>";
                                }
                            }
                        }
                            else{
                                $error ="<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                                text-align:center;'>Please Enter Valid Reference Code!!!</p>";
                            }
                            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                            text-align:center;border-radius:10px;'>We've send a verification link on your email address \n(Check your spam if not found ).</p>";
                            
                            // set_message($error);	
                        }
                        else {
                            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                            text-align:center;border-radius:10px;'>Something went wrong</p>";
                            // alert("Something went wrong");
                        }
            }
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
                                            <h4 class="card-title text-center" style="margin-top: 80%;">Register with Easyearn</h4>
                                            <hr>
                                           
                                            <?php echo $error ?>
                                            <form class="login-form mt-4" autocomplete="on" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Name" id="username" name="username" required="" value="">
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
                                                                <input type="text" class="form-control ps-5" placeholder="Referal Code" name="sponsorId" value = "<?php echo $reference_code?>" onchange="fetchName(this.value)" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3"> 
                                                            <label class="form-label">Referal User Name <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                                <input id = "sponsor" type="text" class="form-control ps-5" placeholder="Referal User Name" name="sponsorName" value="<?php echo $refered_by ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Select Package <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="package" class="fea icon-sm icons"></i>
                                                                <select name = "package" class="form-control ps-5" required onchange="updatePrice(this.value)" id="package_name">
                                                                    <option selected disabled value="">Select Package</option>
                                                                    <option value="Elite Package">Elite Package</option>
                                                                    <option value="Silver Package">Silver Package</option>
                                                                    <option value="Gold Package">Gold Package</option>                             
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3"> 
                                                            <label class="form-label">Amount <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  class="feather feather-user fea icon-sm icons"><path d="M.0022 64C.0022 46.33 14.33 32 32 32H288C305.7 32 320 46.33 320 64C320 81.67 305.7 96 288 96H231.8C241.4 110.4 248.5 126.6 252.4 144H288C305.7 144 320 158.3 320 176C320 193.7 305.7 208 288 208H252.4C239.2 266.3 190.5 311.2 130.3 318.9L274.6 421.1C288.1 432.2 292.3 452.2 282 466.6C271.8 480.1 251.8 484.3 237.4 474L13.4 314C2.083 305.1-2.716 291.5 1.529 278.2C5.774 264.1 18.09 256 32 256H112C144.8 256 173 236.3 185.3 208H32C14.33 208 .0022 193.7 .0022 176C.0022 158.3 14.33 144 32 144H185.3C173 115.7 144.8 96 112 96H32C14.33 96 .0022 81.67 .0022 64V64z"/></svg>
                                                                <input type="text" class="form-control ps-5" placeholder="Amount" name="amount" required="" readonly id="amt">
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
                                                            <!-- <button class="btn btn-info " onclick="pay_now()">Pay Now</button> -->
                                                            <button class="btn btn-primary" type="submit" name="submit" >Register</button>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script> 
        let package = {
            'Elite Package':'1','Silver Package':'1999','Gold Package':'3500',        };
        let packageExtra = {
            'Elite Package':'699','Silver Package':'2250','Gold Package':'3850',        };
//         function fetchName(data){
//             fetch('php/fetchname.php?mtid='+data)
//   .then(response => response.json())
//   .then(data => {
//       if(typeof(data.error) =='undefined'){
//           document.getElementById('sponsor').value = data[0].name;
//       }
//       else{
//         document.getElementById('sponsor').value = '';
//       }
//   });
        // }

        const urlParams = new URLSearchParams(window.location.search);
        let packSelect = urlParams.get('package');
        // console.log(packSelect);
        if(packSelect == 0 || packSelect =='0' ) {
            document.querySelector('option[value="Elite Package"]').selected = true;
            updatePrice('Elite Package');
        } else if(packSelect == 1 || packSelect =='1') {
            document.querySelector('option[value="Silver Package"]').selected = true;
            updatePrice('Silver Package');
        } else if(packSelect == 2 || packSelect =='2') {
            document.querySelector('option[value="Gold Package"]').selected = true;
            updatePrice('Gold Package');
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

        function pay_now(){
        var package_name=jQuery('#package_name').val();
        var amt=jQuery('#amt').val();
        var username=jQuery('#username').val();
        // console.log(package_name);
        // console.log(amt);
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&package_name="+package_name+"&username="+username,
               success:function(result){
                   var options = {
                        "key": "rzp_live_UhvoCF0admOUso", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Easyearn",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="register.php?auth=success";
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