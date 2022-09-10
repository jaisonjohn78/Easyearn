<?php
  require_once '../../user/config/db.php'; 
  require_once '../../user/config/function.php'; 
  $id = $_SESSION['ID'];
  if(!isset($_SESSION['ID'])){
      header("location: ../../user/index.php");
  }

  if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../../user/image/" . $filename;
    $sql = "UPDATE users SET profile_photo = '$filename' where id = $id";
    mysqli_query($con, $sql);
    if (move_uploaded_file($tempname, $folder)) {
        $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'>Image uploaded successfully!</div>";
        header("Location:pages-profile.php");
    } else {
        $error = "<div  class='alert' style='color:#ff001d;height:50px;border: 2px solid #869ceb;background-color:#ededed;font-weight: bold;font-size: 20px;text-align: center;'>Failed to upload image!</div>";
        header("Location:pages-profile.php");
    }
  }

  $img_query1 = "select * from users where id=$id ";
  $img_result1 = mysqli_query($con, $img_query1);
  $img_fetch = mysqli_fetch_assoc($img_result1);
  $img_photo = $img_fetch['profile_photo'];
  $username = $img_fetch['username'];
  $phone = $img_fetch['phone_no'];
  $email = $img_fetch['email'];
  $address = $img_fetch['address'];
  $city = $img_fetch['city'];

  $user_query = "select count(id) AS id from users where status = 0 ";
  $user_result = mysqli_query($con, $user_query);
  $user_fetch = mysqli_fetch_assoc($user_result);
  $count_user = $user_fetch['id'];

  $admin_query = "select count(id) AS id from users where status = 1 ";
  $admin_result = mysqli_query($con, $admin_query);
  $admin_fetch = mysqli_fetch_assoc($admin_result);
  $total_admin = $admin_fetch['id'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, easyearn admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, easyearn admin lite design, easyearn admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Easyearn</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/easyearn-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../user/assets/images/logo.png" />
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ms-4" href="index.php">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="../../user/assets/images/logo.png"
                  alt="homepage"
                  class="dark-logo" width="70"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
                <h3 class="dark-logo" style="color:white">Easyearn</h3>
              </span>
            </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none">
                                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                                <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2" /><?php echo $username ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php"
                                aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.php"
                                aria-expanded="false">
                                <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-basic.php"
                                aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span
                                    class="hide-menu">Table</span></a>
                        </li>
                        <!-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="icon-material.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-emoticon"></i
                  ><span class="hide-menu">Icon</span></a
                >
              </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="map-google.php"
                                aria-expanded="false"><i class="mdi me-2 mdi-earth"></i><span class="hide-menu">Google
                                    Map</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-blank.php"
                                aria-expanded="false"><i class="mdi me-2 mdi-book-open-variant"></i><span
                                    class="hide-menu">Videos</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-error-404.php"
                                aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                                    class="hide-menu">Error 404</span></a>
                        </li>
                        <li class="text-center p-20 upgrade-btn">
                            <a href="../../user/logout.php"
                                class="btn btn-warning text-white mt-4" target="_blank">Logout</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                                class="ti-settings"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                                class="mdi mdi-gmail"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="../../user/logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <a href="../../user/logout.php"
                                class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4">
                                    <img src="../../user/image/<?php echo $img_photo ?>" class="rounded-circle"
                                        width="150" />
                                    <h4 class="card-title mt-2"><?php echo $username ?></h4>
                                    <h6 class="card-subtitle">Admin</h6>
                                    <div class="row text-center justify-content-center">
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                            <h6 class="card-subtitle">Total Users</h6>
                                                <i class="icon-people" aria-hidden="true"></i>
                                                <span class="value-digit"><?php echo $count_user ?></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                            <h6 class="card-subtitle">Total Admin</h6>
                                                <i class="icon-picture" aria-hidden="true"></i>
                                                <span class="value-digit"><?php echo $total_admin ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                      <?php
                                                  $img_query = " select * from users where id=$id ";
                                                  $img_result = mysqli_query($con, $img_query);
                                                      while ($img_data = mysqli_fetch_assoc($img_result)) {
                                      ?>
                                      <img src="image/<?php echo $img_data['profile_photo']; ?>"
                                          class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt=""
                                          id="file-data">
                                      <?php
                                              }
                                      ?>

                                      <div class="mt-md-4 mt-3 mt-sm-0">
                                          <label class="form-label">Profile Photo Upload</label>
                                          <input class="form-control" type="file" name="uploadfile" value="" />
                                          <!-- <a onclick="document.getElementById('profile').click();" class="btn btn-primary mt-2">Change Picture</a> -->
                                          <button type="submit" name="upload" class="btn btn-primary mt-2">Change
                                              Picture</button>
                                      </div>
                                    </form>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe" class="form-control ps-0 form-control-line" disabled value = "<?php echo $username ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com"
                                                class="form-control ps-0 form-control-line" name="example-email"
                                                id="example-email" disabled value = "<?php echo $email ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890"
                                                class="form-control ps-0 form-control-line" disabled value = "<?php echo $phone ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                      <label class="col-md-12 mb-0">Address</label>
                      <div class="col-md-12">
                        <textarea
                          rows="5"
                          class="form-control ps-0 form-control-line"
                        value = <?php echo $address ?> disabled></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 mb-0">City</label>
                      <div class="col-md-12">
                        <input type="text" placeholder=""
                            class="form-control ps-0 form-control-line"  disabled  value = "<?php echo $city ?>" />
                      </div>
                    </div>
                                    <!-- <div class="form-group">
                      <label class="col-sm-12">Select Country</label>
                      <div class="col-sm-12 border-bottom">
                        <select
                          class="form-select shadow-none ps-0 border-0 form-control-line"
                        >
                          <option>London</option>
                          <option>India</option>
                          <option>Usa</option>
                          <option>Canada</option>
                          <option>Thailand</option>
                        </select>
                      </div>
                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white" disabled>
                                                Disabled!!
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
          © 2021 Admin by
          <a href="">Easyearn</a>
        </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>