<?php
   require_once 'config/db.php'; 
   require_once 'config/function.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$msg = "";
if(isset($_POST['submit']))
{
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $phone = mysqli_real_escape_string($con, $_POST['phone']);
   $Message = mysqli_real_escape_string($con, $_POST['message']);

   echo "<div style='display: none;'>";
   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);

   try {
       //Server settings
       $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'hardikzz0409@gmail.com';                     //SMTP username
       $mail->Password   = 'cnrtxgwyqwmhocpa';                              //SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       $mail->SMTPOptions = array(
             'ssl' => array(
             'verify_peer' => false,
             'verify_peer_name' => false,
             'allow_self_signed' => true
           )
         );
       //Recipients
       $mail->setFrom('hardikzz0409@gmail.com');
       $mail->addAddress($email);

       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Reset Your Password';
       $mail->Body    = "<!DOCTYPE html>
       <html lang='en'>
         <head>
           <meta charset='UTF-8' />
           <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
           <meta name='viewport' content='width=device-width, initial-scale=1.0' />
           <title>Document</title>
           <style>
             @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap');
             * {
               box-sizing: border-box;
             }
       
             .page-contain {
               display: flex;
               min-height: 100vh;
               align-items: center;
               justify-content: center;
               background: #e7f3f1;
               border: 0.75em solid white;
               padding: 2em;
               font-family: 'Open Sans', sans-serif;
             }
       
             .data-card {
               display: flex;
               flex-direction: column;
               max-width: 100%;
               min-height: 20.75em;
               overflow: hidden;
               border-radius: 0.5em;
               text-decoration: none;
               background: white;
               margin: auto;
               padding: 2.75em 2.5em;
               box-shadow: 0 1.5em 2.5em -0.5em rgba(0, 0, 0, 0.1);
               transition: transform 0.45s ease, background 0.45s ease;
             }
             .data-card h3 {
               color: #2e3c40;
               font-size: 3.5em;
               font-weight: 600;
               line-height: 1;
               padding-bottom: 0.5em;
               margin: 0 0 0.142857143em;
               border-bottom: 2px solid #753bbd;
               transition: color 0.45s ease, border 0.45s ease;
             }
             .data-card h4 {
               color: #627084;
               text-transform: uppercase;
               font-size: 1.125em;
               font-weight: 700;
               line-height: 1;
               letter-spacing: 0.1em;
               margin: 0 0 1.777777778em;
               transition: color 0.45s ease;
             }
             .data-card p {
               opacity: 0;
               color: #ffffff;
               font-weight: 600;
               line-height: 1.8;
               margin: 0 0 1.25em;
               transform: translateY(-1em);
               transition: opacity 0.45s ease, transform 0.5s ease;
             }
             .data-card .link-text {
               display: block;
               color: #753bbd;
               font-size: 1.125em;
               font-weight: 600;
               line-height: 1.2;
               margin: auto 0 0;
               transition: color 0.45s ease;
             }
             .data-card .link-text svg {
               margin-left: 0.5em;
               transition: transform 0.6s ease;
             }
             .data-card .link-text svg path {
               transition: fill 0.45s ease;
             }
             .data-card:hover {
               background: #753bbd;
               transform: scale(1.02);
             }
             .data-card:hover h3 {
               color: #ffffff;
               border-bottom-color: #a754c4;
             }
             .data-card:hover label{
               color: #ffffff;
               border-bottom-color: #a754c4;
             }
             .data-card a {
               text-decoration:none !important;
               color:black !important;
             }
             .data-card:hover h4 {
               color: #ffffff;
             }
             .data-card:hover p {
               opacity: 1;
               transform: none;
             }
             .data-card:hover .link-text {
               color: #ffffff;
             }
             .data-card:hover .link-text svg {
               -webkit-animation: point 1.25s infinite alternate;
               animation: point 1.25s infinite alternate;
             }
             .data-card:hover .link-text svg path {
               fill: #ffffff;
             }
       
             @-webkit-keyframes point {
               0% {
                 transform: translateX(0);
               }
               100% {
                 transform: translateX(0.125em);
               }
             }
       
             @keyframes point {
               0% {
                 transform: translateX(0);
               }
               100% {
                 transform: translateX(0.125em);
               }
             }
           </style>
         </head>
         <body>
       <section class='page-contain'>
       <div class='data-card'>
       <div class='column'>
         <h3>{$name}</h3></br>
         <label>Name : </lable><h4>{$phone}</h4>
         <label>Email : </lable><h4>{$email}</h4>
         <label>Message : </lable><h4>{$Message}</h4>
         </div>
       </div>
     </section>
     </body>
     </html>";
       $mail->send();
       echo 'Message has been sent';
   } catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
   echo "</div>";     
   $msg = "<center><div class='alert alert-info' style='color:black;height:60px;width:500px;margin-top:50px;'>Mail Has Been Send Sucessfully</div></center >";
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Easyearn</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place logo.png in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/backToTop.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/huicalendar.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

    <!-- Add your site or application content here -->

    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loading-icon text-center d-flex flex-column align-items-center justify-content-center">
                    <img src="assets/images/logo.png" alt="" width="300px">
                    <img class="loading-logo" src="assets/img/logo/preloader.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- cart mini area start -->
    <div class="body-overlay"></div>
    <!-- cart mini area end -->

    <!-- side toggle start -->
    <div class="fix">
        <div class="side-info">
            <div class="side-info-content">
                <div class="offset-widget offset-logo mb-40">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <a href="index.html">
                                <img src="assets/images/logo.png" alt="Logo" width="100">
                            </a>
                        </div>
                        <div class="col-3 text-end"><button class="side-info-close"><i
                                    class="fal fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu d-xl-none fix"></div>

            </div>
        </div>
    </div>
    <!-- side toggle end -->

    <!-- header-area-start  -->
    <header>
        <!-- header-top start-->
        <!-- header-top end -->
        <div class="header-area sticky-header">
            <div class="container-fluid">
                <div class="header-main-wrapper">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-9 col-9">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="header-logo ">
                                    <a href="index.html"><img src="assets/images/logo.png" alt="logo" width="70"></a>
                                </div>
                                <div class="main-menu d-none d-xl-block">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="menu-item"><a href="index.php">Home</a>
                                            </li>
                                            <li class="menu-item"><a href="courses.php">Course</a>
                                            </li>
                                            <li class="menu-item"><a href="about.php">About US</a>
                                            </li>
                                            <li class="menu-item"><a href="contact.php">Contact US</a>
                                            </li>
                                            <li class="menu-item"><a href="user/index.php">Login</a>
                                            </li>
                                            <li class="menu-item"><a href="user/register.php">Enroll Now</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-3 col-3">
                            <div class="header-right d-flex align-items-center justify-content-end">
                                <div class="user-btn-inner p-relative d-none d-md-block">
                                    <div class="user-btn-wrapper">
                                        <div class="user-btn-content ">
                                            <a class="user-btn-sign-in" href="user/index.php">Sign In</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none d-md-block">
                                    <a class="user-btn-sign-up edu-btn" href="user/register.php">Sign Up</a>
                                </div>
                                <div class="menu-bar d-xl-none ml-20">
                                    <a class="side-toggle" href="javascript:void(0)">
                                        <div class="bar-icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->
    <main>
        <!-- hero-area-start -->
        <div class="hero-arera course-item-height" data-background="assets/img/slider/course-slider.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-course-1-text">
                            <h2>Contact</h2>
                        </div>
                        <div class="course-title-breadcrumb">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><span>Contact us</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero-area-end -->


        <!-- contact-area-start -->
        <?php echo $msg ?>
        <div class="contact-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="contact-area-wrapper">
                            <div class="section-title mb-50">
                                <h2>Get in Touch</h2>
                            </div>
                            <!-- <div class="contact-form">
                        <form action="#"></form>
                     </div> -->
                        </div>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="contact-from-input mb-20">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="contact-from-input mb-20">
                                        <input type="text" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="contact-from-input mb-20">
                                        <input type="text"  name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-from-input mb-20">
                                        <textarea placeholder="Message" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="colxl-2 ">
                                    <div class="cont-btn mb-20">
                                        <button type="submit" class="cont-btn" name="submit">Submit</button>
                                    </div>
                                </div>

                                <div class="google-map-area contact-map pt-100 mb-30">
                                    <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen
src="https://www.google.com/maps/embed/v1/place?q=place_id:EjFTYXlhamkgUGF0aCwgU3ViaGFucHVyYSwgVmFkb2RhcmEsIEd1amFyYXQsIEluZGlhIi4qLAoUChIJGQLpWLbIXzkRtLeM99vtADwSFAoSCfVjRICUyF85EV87ziwFLAwg&key=AIzaSyC1WXuxwiU9OXbbGozHoTNYreoZulVshxE"></iframe>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-8">
                        <div class="sidebar-widget-wrapper">
                            <div class="support-contact mb-30">
                                <div class="support-tittle">
                                    <h4>Support Contact</h4>
                                </div>
                                <div class="support-contact-inner">
                                    <div class="support-item">
                                        <div class="support-icon">
                                            <svg id="Layer_6" data-name="Layer 3" xmlns="http://www.w3.org/2000/svg"
                                                width="21.375" height="21.375" viewBox="0 0 21.375 21.375">
                                                <path id="Path_8" data-name="Path 8"
                                                    d="M1.688,16.386c.038-.031,4.3-3.085,5.463-2.885.556.1.875.477,1.513,1.238.1.123.35.415.541.624a8.877,8.877,0,0,0,1.176-.479,9.761,9.761,0,0,0,4.5-4.5A8.876,8.876,0,0,0,15.363,9.2c-.209-.192-.5-.439-.628-.544-.756-.634-1.135-.953-1.233-1.51C13.3,6,16.354,1.725,16.386,1.687A1.631,1.631,0,0,1,17.6,1c1.238,0,4.774,4.586,4.774,5.359,0,.045-.065,4.608-5.691,10.331C10.966,22.31,6.4,22.375,6.359,22.375,5.586,22.375,1,18.84,1,17.6A1.629,1.629,0,0,1,1.688,16.386Zm4.75,4.56c.623-.051,4.452-.556,9.239-5.26,4.727-4.813,5.22-8.653,5.269-9.248a19.276,19.276,0,0,0-3.353-3.962c-.028.029-.066.071-.115.127a25.216,25.216,0,0,0-2.546,4.32,8.469,8.469,0,0,0,.724.649,7.149,7.149,0,0,1,1.077,1.013l.173.242-.051.293A8.135,8.135,0,0,1,16.166,11,11.193,11.193,0,0,1,11,16.166a8.115,8.115,0,0,1-1.882.688l-.293.051-.242-.173A7.209,7.209,0,0,1,7.568,15.65c-.223-.266-.522-.622-.634-.722A25.054,25.054,0,0,0,2.6,17.477c-.059.05-.1.088-.128.113a19.259,19.259,0,0,0,3.962,3.354Z"
                                                    transform="translate(-1 -1)" fill="#2467ec" />
                                            </svg>
                                        </div>
                                        <div class="support-info-phone">
                                            <span>Phone</span>
                                            <p>Mobile :<a href="tel:+919023954613">+919023954613</a></p>
                                            
                                        </div>
                                    </div>
                                    <div class="support-item">
                                        <div class="support-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22.57" height="16.271"
                                                viewBox="0 0 22.57 16.271">
                                                <g id="email_3_" data-name="email (3)"
                                                    transform="translate(-1.25 -4.25)">
                                                    <path id="Path_10" data-name="Path 10"
                                                        d="M20.933,20.521H4.137A2.9,2.9,0,0,1,1.25,17.634V7.137A2.9,2.9,0,0,1,4.137,4.25h16.8A2.9,2.9,0,0,1,23.82,7.137v10.5A2.9,2.9,0,0,1,20.933,20.521Zm-16.8-14.7A1.312,1.312,0,0,0,2.825,7.137v10.5a1.312,1.312,0,0,0,1.312,1.312h16.8a1.312,1.312,0,0,0,1.312-1.312V7.137a1.312,1.312,0,0,0-1.312-1.312Z"
                                                        transform="translate(0 0)" fill="#2467ec" />
                                                    <path id="Path_11" data-name="Path 11"
                                                        d="M12.534,13.7a3.412,3.412,0,0,1-1.732-.472L1.638,7.778a.8.8,0,0,1-.283-1.05A.777.777,0,0,1,2.4,6.455l9.175,5.438a1.774,1.774,0,0,0,1.848,0L22.6,6.455a.777.777,0,0,1,1.05.273.8.8,0,0,1-.283,1.05l-9.1,5.448a3.412,3.412,0,0,1-1.732.472Z"
                                                        transform="translate(0.001 0.105)" fill="#2467ec" />
                                                </g>
                                            </svg>

                                        </div>
                                        <div class="support-info-email">
                                            <span>Email</span>
                                            <a href="mailto:easyearn@gmail.com"><span class="__cf_email__"
                                                    data-cfemail="6821060e07280d10090518040d460b0705">easyearn@gmail.com</span></a>
                                        </div>
                                    </div>
                                    <div class="support-item">
                                        <div class="support-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.41" height="21.729"
                                                viewBox="0 0 17.41 21.729">
                                                <g id="pin" transform="translate(-50.885)">
                                                    <g id="Group_2184" data-name="Group 2184"
                                                        transform="translate(55.556 4.671)">
                                                        <g id="Group_2183" data-name="Group 2183">
                                                            <path id="Path_3602" data-name="Path 3602"
                                                                d="M164.981,110.062a4.034,4.034,0,1,0,4.034,4.034A4.039,4.039,0,0,0,164.981,110.062Zm0,6.369a2.335,2.335,0,1,1,2.335-2.335A2.338,2.338,0,0,1,164.981,116.431Z"
                                                                transform="translate(-160.947 -110.062)"
                                                                fill="#2467ec" />
                                                        </g>
                                                    </g>
                                                    <g id="Group_2186" data-name="Group 2186"
                                                        transform="translate(50.885)">
                                                        <g id="Group_2185" data-name="Group 2185">
                                                            <path id="Path_3603" data-name="Path 3603"
                                                                d="M59.59,0a8.715,8.715,0,0,0-8.7,8.7v.241c0,2.428,1.392,5.256,4.137,8.408A35.783,35.783,0,0,0,59.056,21.3l.534.431.534-.431a35.775,35.775,0,0,0,4.035-3.944c2.745-3.151,4.137-5.98,4.137-8.408V8.705A8.715,8.715,0,0,0,59.59,0ZM66.6,8.946c0,4.1-5.286,9.068-7.006,10.576-1.721-1.508-7.006-6.474-7.006-10.576V8.705a7.006,7.006,0,0,1,14.013,0Z"
                                                                transform="translate(-50.885)" fill="#2467ec" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="support-info-phone">
                                            <span>Location</span>
                                            <p>Address :<a>1st Floor Besides Syaji Road Near Textile Market, Vadodara, Gujrat - 300018</a></p>
                                            <br />
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <footer>
        <div class="footer-area pt-100">
            <div class="container">
                <div class="footer-main">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget f-w1 mb-40">
                                <div class="footer-img">
                                    <a href="index.html"> <img src="assets/images/logo.png" alt="footer-logo"
                                            width="100"></a>
                                    <p>Great lesson ideas and lesson plans for Easyearn can customize lessons as
                                        best
                                        plans to knowledge.</p>
                                </div>
                                <div class="footer-icon">
                                    <a href="https://youtube.com/channel/UC6OjJGHT8OV1G2fxzaD46LA" target="_blank">
                                        <i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget f-w2 mb-40">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="courses.php">Course</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget f-w3 mb-40">
                                <h3>Links</h3>
                                <ul>
                                    <li><a href="become-affiliate.php">Become An Affiliate</a></li>
                                    <li><a href="become-instructor.php">Become An Instructor</a></li>
                                    <li><a href="user/register.php">Enroll Now</a></li>
                                    <li><a href="user/index.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget f-w4 mb-40">
                                <h3>Policys</h3>
                                <ul>
                                    <li><a href="return-policy.php">Return Policy</a></li>
                                    <li><a href="terms-condition.php">Terms And Condition</a></li>
                                    <li><a href="disclaimer.php">Disclaimer</a></li>
                                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->


    <!-- JS here -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/meanmenu.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/huicalendar.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/backToTop.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>