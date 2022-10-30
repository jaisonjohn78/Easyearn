<?php
    ob_start();
    require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    $id = $_SESSION['ID'];
    if(!isset($_SESSION['ID'])){
        header("location: index.php");
    }
    $query = "select * from users where id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $refferal = $row['reference_id'];
    $phone_number = $row['phone_no'];

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
    
    $error='';
    if(isset($_POST['updateProfile'])){
        $city = $_POST['city'];
        $address = $_POST['address'];

        if(empty($city) || empty($address))
        {
            $error = "<div style='color:#ff001d;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Please Fill all the details!!! </div>";
        }
        else{
        date_default_timezone_set('Asia/Kolkata');
        $datetime = date("F j, Y g:i:s a");
        $sql = "UPDATE users SET city = '$city',address='$address' WHERE id = $id";
        $data = mysqli_query($con, $sql);
      
        if($data){
            $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'>Successfully Inserted!!!</div>";
            header("Location:edit-profile.php");
        }
        else{
            $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'> Oops Something Went Wrong :( </div>";
        }
        }
    }

    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./image/" . $filename;
        $sql = "UPDATE users SET profile_photo = '$filename' where id = $id";
        mysqli_query($con, $sql);
        if (move_uploaded_file($tempname, $folder)) {
            $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'>Image uploaded successfully!</div>";
            header("Location:edit-profile.php");
        } else {
            $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'>Failed to upload image!</div>";
            header("Location:edit-profile.php");
        }
    }

    $img_query1 = "select * from users where id=$id ";
    $img_result1 = mysqli_query($con, $img_query1);
    $img_fetch = mysqli_fetch_assoc($img_result1);
    $img_photo = $img_fetch['profile_photo'];
    
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
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="image/<?php echo $img_photo; ?>" class="avatar avatar-ex-small rounded" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3"
                                        style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3"
                                            href="edit-profile.php">
                                           
                                            <img src="image/<?php echo $img_photo; ?>" class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="" id="file-data">
                                            
                                            <div class="flex-1 ms-2">
                                                <span class="d-block"><?php echo $username ?></span>
                                                <small class="text-muted"><?php echo $refferal ?></small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-mail"></i></span> Package: <?php echo $package_name ?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Package Amount: <?php echo $package_amount ?></a>

                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-coin"></i></span> My Wallet: ₹<?php echo $row['amount'] ?></a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span
                                                class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span>
                                            Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <style>
                    .modal {
                        position: fixed;
                    }
                    </style>
                    <div class="row">
                        <div class="col-lg-8 mt-4">
                            <div class="card border-0 rounded shadow">
                                <div class="card-body">
                                    <h5 class="text-md-start text-center mb-0">Personal Detail :</h5>
                                    <hr>
                                    <div class="mt-4 text-md-start text-center d-sm-flex">
                                        <?php echo $error ?>
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <?php
                                                $img_query = " select * from users where id=$id ";
                                                $img_result = mysqli_query($con, $img_query);
                                                    while ($img_data = mysqli_fetch_assoc($img_result)) {
                                                        ?>
                                            <img src="./image/<?php echo $img_data['profile_photo']; ?>" class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="" id="file-data">
                                            <?php
                                            }
                                                ?>
                                            
                                            <div class="mt-md-4 mt-3 mt-sm-0">
                                                <label class="form-label">Profile Photo Upload</label>
                                                <input class="form-control" type="file" name="uploadfile" value="" required/>
                                                <!-- <a onclick="document.getElementById('profile').click();" class="btn btn-primary mt-2">Change Picture</a> -->
                                                <button type="submit" name="upload" class="btn btn-primary mt-2">Change
                                                    Picture</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mb-3 mt-4">
                                        <label class="form-label">Referal Link</label>
                                        <div class="form-icon position-relative">
                                            <input name="address" id="referalLink" type="text" class="form-control ps-5"
                                                placeholder="Address :"
                                                value="https://www.easyearn.in/user/register.php?refer=<?php echo $refferal ?>">
                                        </div>
                                    </div>
                                    <div class="mt-md-4 mt-3 mt-sm-0">
                                        <a onclick="mycopy();" class="btn btn-primary mt-2 mb-2">Copy Referal Link</a>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="file" id="profile" hidden name="profile" />
                                        <?php echo $error ?>
                                        <div class="row mt-4">
                                            
                                            
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email</label>
                                                    <div class="form-icon position-relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-mail fea icon-sm icons">
                                                            <path
                                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                            </path>
                                                            <polyline points="22,6 12,13 2,6"></polyline>
                                                        </svg>
                                                        <input id="email" type="email" class="form-control ps-5"
                                                            placeholder="Your email :" disabled
                                                            value="<?php echo $email ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">User Name</label>
                                                    <div class="form-icon position-relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-user fea icon-sm icons">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <input name="username" id="first" type="text"
                                                            class="form-control ps-5" placeholder="First Name :"
                                                            disabled value="<?php echo $username ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone No</label>
                                                    <div class="form-icon position-relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-phone fea icon-sm icons">
                                                            <path
                                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                            </path>
                                                        </svg>
                                                        <input name="phone" id="number" type="number"
                                                            class="form-control ps-5" placeholder="Phone :" disabled
                                                            value="<?php echo $phone_number ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <div class="form-icon position-relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-map fea icon-sm icons">
                                                            <polygon
                                                                points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6">
                                                            </polygon>
                                                            <line x1="8" y1="2" x2="8" y2="18"></line>
                                                            <line x1="16" y1="6" x2="16" y2="22"></line>
                                                        </svg>
                                                        <input name="city" id="number" type="text"
                                                            class="form-control ps-5" placeholder="City :" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <div class="form-icon position-relative">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-map-pin fea icon-sm icons">
                                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                            </path>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                        </svg>
                                                        <input name="address" id="number" type="text"
                                                            class="form-control ps-5" placeholder="Address :" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="submit" id="submit" name="updateProfile"
                                                    class="btn btn-primary" value="Save Changes">
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                    <!--end form-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->

            

                        <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Crop Image Before Upload</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" id="cropperX">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">

                                            <img src="" id="sample_image" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                        <button type="button" class="btn btn-secondary"
                                            id="cropperClose">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"
                        integrity="sha512-synHs+rLg2WDVE9U0oHVJURDCiqft60GcWOW7tXySy8oIr0Hjl3K9gv7Bq/gSj4NDVpc5vmsNkMGGJ6t2VpUMA=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
                    <script src="https://unpkg.com/cropperjs"></script>
                    <script>
                    function mycopy() {
                        /* Get the text field */
                        var copyText = document.getElementById("referalLink");

                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        navigator.clipboard.writeText(copyText.value);

                        /* Alert the copied text */
                        alert("Referal Link Copy: " + copyText.value);
                    }


                    $(document).ready(function() {

                        var $modal = $('#modal');
                        var image = document.getElementById('sample_image');

                        var cropper;

                        $('#profile1').change(function(event) {
                            var files = event.target.files;
                            var done = function(url) {
                                image.src = url;
                                $modal.show();
                                cropper = new Cropper(image, {
                                    viewMode: 1,
                                    preview: '.preview'
                                });
                            };

                            if (files && files.length > 0) {
                                reader = new FileReader();
                                reader.onload = function(event) {
                                    done(reader.result);
                                };
                                reader.readAsDataURL(files[0]);
                            }
                        });


                        $('#crop').click(function() {
                            canvas = cropper.getCroppedCanvas({
                                width: 400,
                                height: 400
                            });

                            canvas.toBlob(function(blob) {
                                url = URL.createObjectURL(blob);
                                var reader = new FileReader();
                                reader.readAsDataURL(blob);
                                reader.onloadend = function() {
                                    var base64data = reader.result;
                                    $('#blob').val(base64data);
                                    cropper.destroy();
                                    cropper = null;
                                    $modal.hide();
                                };
                            });
                        });
                        $('#cropperX').click(function() {
                            cropper.destroy();
                            cropper = null;
                            $modal.hide();
                        });
                        $('#cropperClose').click(function() {
                            cropper.destroy();
                            cropper = null;
                            $modal.hide();
                        });

                    });
                    $('#profile').change(function(event) {
                        var files = event.target.files;
                        if (files && files.length > 0) {
                            reader = new FileReader();
                            reader.onload = function(event) {
                                document.getElementById('file-data').src = reader.result;
                            };
                            reader.readAsDataURL(files[0]);
                        }
                    });
                    </script>

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

</body>


</html>