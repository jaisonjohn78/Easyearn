<?php
session_start();
include('db.php');

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['MESSAGE'] = $msg;
    } else {
        $msg = '';
    }
}

$pack1 = "https://pmny.in/jIEoN5GXJ7kQ";
$pack2 = "https://pmny.in/UI1VYoNLLxbz";
$pack3 = "https://pmny.in/Xr1VYhjpCfKz";

function redirect($location)
{
   ?>
<script>
window.location.href = "<?php echo $location; ?>";
</script>
<?php
}

//display session messg
function display_message()
{
    if (isset($_SESSION['MESSAGE'])) {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}

function register_user()
        {
            // require '../vendor/autoload.php';
            global $con;
            // $code = mysqli_real_escape_string($con, md5(rand()));
            if(isset($_POST['submit']) || $_SERVER['REQUEST_METHOD']=='POST')
            {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword =$_POST['cpassword'];
                $phone = $_POST['phone'];
                $package = $_POST['package'];
                $amount = $_POST['amount'];
                

                if(empty($username) || empty($email) || empty($password) || empty($cpassword))
                {
                    $error = "<div style='color:#ff001d;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Please Check your Registration </div>";
                    set_message($error);
                }
                else
                {
                    if($password != $cpassword)
                    {
                        $error = "<div style='color:#ff001d;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Your Password not matched </div>";
                        set_message($error);
                    }
                    else
                    {           
                                $query = "select * from users where email='$email'";
                                $result = mysqli_query($con,$query);
                
                                if(mysqli_num_rows($result))
                                {
                                    $error = "<div class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Email Already Exists </div>";
                                    set_message($error);
                                }
                                else
                                {
                                    $hash = md5($password);
                                    date_default_timezone_set('Asia/Kolkata');
                                    $datetime = date("F j, Y g:i:s a");
                                    $sql = "INSERT INTO users(username,email, phone_no, password, package, create_datetime) VALUES('$username','$email','$phone', '$hash', '$amount','$datetime')";
                                    $data = mysqli_query($con, $sql);
                                    $package_sql = "INSERT INTO package(username,package_name,amount,create_time) VALUES('$username','$package','$amount','$datetime')";
                                    $package_data = mysqli_query($con, $package_sql);
                                    if ($data) 
                                    {
                                        // $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Registered Succesfully !! </div>";
                                        // set_message($error);
                                        // $user_query = "select username from users where email='$email'";
                                        //         $user_result = mysqli_query($con,$user_query);
                                        //         if($user_row=mysqli_fetch_assoc($user_result))
                                        //         {
                                        //         $user_name = $user_row['username'];
                                                
                                        //         }
                                        
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
                                            $mail->Username   = $my_email;                     //SMTP username
                                            $mail->Password   = $password;                               //SMTP password
                                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                                            //Recipients
                                            $mail->setFrom($my_email);
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
                                                                        <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome!</h1> <img src='https://raw.githubusercontent.com/jaisonjohn78/Peradot/main/assets/img/logo.png' width='150' style='display: block; border: 0px; user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;' draggable='false' />
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
                                                                        <p style='margin: 0;'>Cheers,<br>Peradot Foundation</p>
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
                                                                        <p style='margin: 0;'><a href='http://peradot.in/' target='_blank' style='color: #068f06;'>We&rsquo;re here to help you out</a></p>
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
                                           
                                        } catch (Exception $e) 
                                        {
                                            $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                                            text-align:center;border-radius:10px;'>Message could not be sent. Mailer Error: { $mail->ErrorInfo } </p>";
                                            // alert("Message could not be sent. Mailer Error: { $mail->ErrorInfo }");
                                        }
                                        echo "</div>";
                                        $error = "<p style='background: #f2dedf;color: #9c4150;border: 1px solid #e7ced1;padding:10px;
                                        text-align:center;border-radius:10px;'>We've send a verification link on your email address \n(Check your spam if not found ).</p>";
                                        
                                        // set_message($error);	
                                    }
                                    else
                                    {
                                        $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Oops Something Went Wrong :( </div>";
                                        set_message($error);
                                    }
                                }
                    }
                }
            }
        }

function login_user()
        {
            
            global $con;



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
        
                        if ((md5($password) == $db_pass)) {
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
                            $error = "<div class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight:bold;font-size: 17px;text-align: center;'>Please Enter valid password</div>";
                            set_message($error);
                        }
                    } else {
                        $error = "<div class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 17px;text-align: center;'>Please enter valid Phone no and Email.</div>";
                        set_message($error);
                    }
                }
            }
        }
?>