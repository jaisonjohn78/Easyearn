<?php
  require_once '../../user/config/db.php'; 
  require_once '../../user/config/function.php'; 
  $id = $_SESSION['ID'];
  if(!isset($_SESSION['ID'])){
      header("location: ../../user/index.php");
  }

  $user_query = "select * from users where id=$id ";
  $user_result = mysqli_query($con, $user_query);
  $user_fetch = mysqli_fetch_assoc($user_result);
  $img_photo = $user_fetch['profile_photo'];
  $username = $user_fetch['username'];

  $package_query = "select count(id) AS id from package";
  $package_result = mysqli_query($con, $package_query);
  $package_row = mysqli_fetch_assoc($package_result);
  $total_package = $package_row['id'];

  $silver_query = "select count(id) AS id from package WHERE package_name = 'Silver Package'";
  $silver_result = mysqli_query($con, $silver_query);
  $silver_row = mysqli_fetch_assoc($silver_result);
  $silver_total_package = $silver_row['id'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>  
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, easyearn admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, easyearn admin lite design, easyearn admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Easyearn</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/easyearn-lite/"
    />
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../user/assets/images/logo.png"
    />
    <!-- chartist CSS -->
    <link
      href="../assets/plugins/chartist-js/dist/chartist.min.css"
      rel="stylesheet"
    />
    <link
      href="../assets/plugins/chartist-js/dist/chartist-init.css"
      rel="stylesheet"
    />
    <link
      href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
      rel="stylesheet"
    />
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet" />
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
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
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
            <a
              class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <ul class="navbar-nav d-lg-none d-md-block">
              <li class="nav-item">
                <a
                  class="nav-toggler nav-link waves-effect waves-light text-white"
                  href="javascript:void(0)"
                  ><i class="ti-menu ti-close"></i
                ></a>
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
                <a class="nav-link text-muted" href="javascript:void(0)"
                  ><i class="ti-search"></i
                ></a>
                <form class="app-search" style="display: none">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search &amp; enter"
                  />
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
                <a
                  class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="../assets/images/users/1.jpg"
                    alt=""
                    class="profile-pic me-2"
                  /><?php echo $username ?>
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
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="index.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-gauge"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pages-profile.php"
                  aria-expanded="false"
                >
                  <i class="mdi me-2 mdi-account-check"></i
                  ><span class="hide-menu">Profile</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="table-basic.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-table"></i
                  ><span class="hide-menu">Table</span></a
                >
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
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="map-google.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-earth"></i
                  ><span class="hide-menu">Google Map</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pages-blank.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-book-open-variant"></i
                  ><span class="hide-menu">Videos</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pages-error-404.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-help-circle"></i
                  ><span class="hide-menu">Error 404</span></a
                >
              </li>
              <li class="text-center p-20 upgrade-btn">
                <a
                  href="../../user/logout.php"
                  class="btn btn-warning text-white mt-4"
                  target="_blank"
                  >Logout</a
                >
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
              <a
                href=""
                class="link"
                data-toggle="tooltip"
                title=""
                data-original-title="Settings"
                ><i class="ti-settings"></i
              ></a>
            </div>
            <div class="col-4 link-wrap">
              <!-- item-->
              <a
                href=""
                class="link"
                data-toggle="tooltip"
                title=""
                data-original-title="Email"
                ><i class="mdi mdi-gmail"></i
              ></a>
            </div>
            <div class="col-4 link-wrap">
              <!-- item-->
              <a
                href="../../user/logout.php"
                class="link"
                data-toggle="tooltip"
                title=""
                data-original-title="Logout"
                ><i class="mdi mdi-power"></i
              ></a>
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
              <h3 class="page-title mb-0 p-0">Dashboard</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dashboard
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
              <div class="text-end upgrade-btn">
                <a
                  href="../../user/logout.php"
                  class="btn btn-danger d-none d-md-inline-block text-white"
                  target="_blank"
                  >Logout</a
                >
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
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <center><h1>All Three Packages</h1></center>
                  <hr>
                  <div class="column">
                    <img src="../../user/image/elite.png" height="246" width="246" alt="">
                    <img src="../../user/image/silver.png" height="246" width="246" alt="">
                    <img src="../../user/image/gold.png" height="246" width="246" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Total Packages</h3>
                  <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                  <div
                    id="visitor"
                    style="
                      height: 290px;
                      width: 100%;
                      max-height: 290px;
                      position: relative;
                    "
                    class="c3"
                  >
                    <div
                      class="c3-tooltip-container"
                      style="
                        position: absolute;
                        pointer-events: none;
                        display: none;
                      "
                    ></div>
                  </div>
                </div>
                <div>
                  <hr class="mt-0 mb-0" />
                </div>
                <div class="card-body text-center">
                  <ul
                    class="list-inline d-flex justify-content-center align-items-center mb-0"
                  >
                    <li class="me-4">
                      <h6 class="text-info">
                        <i class="fa fa-circle font-10 me-2"></i>Mobile
                      </h6>
                    </li>
                    <li class="me-4">
                      <h6 class="text-primary">
                        <i class="fa fa-circle font-10 me-2"></i>Desktop
                      </h6>
                    </li>
                    <li class="me-4">
                      <h6 class="text-success">
                        <i class="fa fa-circle font-10 me-2"></i>Tablet
                      </h6>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
            <!-- column -->
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Login Users Detail</h4>
                  <h6 class="card-subtitle">Admin : <code><?php echo $username ?></code></h6>
                  <div class="table-responsive">
                    <table class="table user-table">
                      <thead>
                        <tr>
                          <th class="border-top-0">#</th>
                          <th class="border-top-0">UserName</th>
                          <th class="border-top-0">Email</th>
                          <th class="border-top-0">Phone_no</th>
                          <th class="border-top-0">Transaction Status</th>
                          <!-- <th class="border-top-0">Profile</th> -->
                          <th class="border-top-0">Login Time</th>
                        </tr>
                      </thead>
                      <?php 
                         $user_tb_query = " select * from users where status = 0 ";
                         $user_tb_result = mysqli_query($con, $user_tb_query);
                             while ($user_tb_row = mysqli_fetch_assoc($user_tb_result)) {
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $user_tb_row['id']?></td>
                          <td><?php echo $user_tb_row['username']?></td>
                          <td><?php echo $user_tb_row['email']?></td>
                          <td><?php echo $user_tb_row['phone_no']?></td>
                          <td><?php echo $user_tb_row['package']?></td>
                          <td><?php echo $user_tb_row['create_datetime']?></td>
                        </tr>
                      </tbody>
                      <?php 
                             }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <footer class="footer">
          © 2021 Admin by
          <a href="">Easyearn</a>
        </footer>
      </div>
    </div>
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!--Custom JavaScript -->
    <!-- <script src="js/pages/dashboards/dashboard1.js"></script> -->
    <script src="js/custom.js"></script>
    <script type="text/javascript"></script>
    <script>
      /*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
    "use strict";

    // ============================================================== 
    // Sales overview
    // ============================================================== 
    var chart2 = new Chartist.Bar('.amp-pxl', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        series: [
            [9, 5, 3, 7, 5, 10, 3],
            [6, 3, 9, 5, 4, 6, 4]
        ]
    }, {
        axisX: {
            // On the x-axis start means top and end means bottom
            position: 'end',
            showGrid: false
        },
        axisY: {
            // On the y-axis start means left and end means right
            position: 'start'
        },
        high: '12',
        low: '0',
        plugins: [
            Chartist.plugins.tooltip()
        ]
    });

    var chart = [chart2];

    // ============================================================== 
    // This is for the animation
    // ==============================================================

    for (var i = 0; i < chart.length; i++) {
        chart[i].on('draw', function (data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 500 * data.index,
                        dur: 500,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
            if (data.type === 'bar') {
                data.element.animate({
                    y2: {
                        dur: 500,
                        from: data.y1,
                        to: data.y2,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    },
                    opacity: {
                        dur: 500,
                        from: 0,
                        to: 1,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
        });
    }

    // ============================================================== 
    // Our visitor
    // ============================================================== 
    
    var chart = c3.generate({
        bindto: '#visitor',
        data: {
            columns: [
                ['Other', 4],
                ['Desktop', 10],
                ['Tablet', 40],
                ['Mobile', 50],
            ],

            type: 'donut',
            onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            title: "Total Packages: " + <?php echo $total_package ?>,
            width: 20,

        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#eceff1', '#745af2', '#26c6da', '#1e88e5']
        }
    });

});
      </script>
  </body>
</html>
