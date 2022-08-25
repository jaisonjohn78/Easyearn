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
            global $con;
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
                                    if ($data) {
                                        $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Registered Succesfully !! </div>";
                                        set_message($error);
                                        $user_query = "select username from users where email='$email'";
                                                $user_result = mysqli_query($con,$user_query);
                                                if($user_row=mysqli_fetch_assoc($user_result))
                                                {
                                                $user_name = $user_row['username'];
                                                
                                                }
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