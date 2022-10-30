<?php 

    ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../vendor/autoload.php';
    
    $msg = "";
    $error = '';
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $code = mysqli_real_escape_string($con, md5(rand()));
    
        $user_query = "select username from users where email='$email'";
        $user_result = mysqli_query($con,$user_query);
        if($user_row=mysqli_fetch_assoc($user_result))
    {
        $user_name = $user_row['username'];
        
    }
    
        if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $query = mysqli_query($con, "UPDATE users SET code='{$code}' WHERE email='{$email}'");
    
            if ($query) {        
                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
    
                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'easyearnfoundation@gmail.com';                     //SMTP username
                    $mail->Password   = 'yxcnugdwnjpvulsr';                              //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                    //Recipients
                    $mail->setFrom('easyearnfoundation@gmail.com');
                    $mail->addAddress($email);
    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Reset Your Password';
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
                                                <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Greetings !</h1> <img src='http://localhost/Easyearn/user/image/logo.png' width='150' style='display: block; border: 0px;' style='display: block; border: 0px; user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;' draggable='false' />
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
                                                <p style='margin: 0;'>We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor='#ffffff' align='left'>
                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                    <tr>
                                                        <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                                            <table border='0' cellspacing='0' cellpadding='0'>
                                                                <tr>
                                                                    <td align='center' style='border-radius: 3px;' bgcolor='#7132ed'><a href='".$base_url."user/change-password.php?reset=".$code."'  style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #068f06; display: inline-block;'>Confirm Account</a></td>
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
                                                <p style='margin: 0;'><a href='".$base_url."user/change-password.php?reset=".$code."' style='color: #068f06;'>Click Me</a></p>
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
                                                <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='#' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                    
                    </html>";
                    $mail->send();
                    $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Mail has been sent</p> ";
                        // alert("Mail has been sent");
                   
                } catch (Exception $e) {
                    $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>Message could not be sent. Mailer Error: $mail->ErrorInfo</p> ";
                        ?>
                        <script>
                        alert("Message could not be sent. Mailer Error: <?php echo $mail->ErrorInfo ?>");
                        </script>
                        <?php
                
                }
                echo "</div>";      
                    $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>We've send a verification link on your email address.</p> ";
            }
        } else {
            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;text-align:center;border-radius:10px;'>This email address do not found.</p> ";
            // alert("This email address do not found.");
           
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
                                                echo $error;
                                            ?>
                                            <form class="login-form mt-4" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Enter Your Email" name="email" required="">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12 mb-0">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary"  name="submit" type="submit">Forgot Password</button>
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