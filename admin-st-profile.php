<?php

error_reporting(0);

session_start();

include('database.php');

if(!isset($_SESSION['admin_id']))
{
  header('location:admin-login.php');
}

$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin_table WHERE admin_id = '$admin_id' ";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

############################################

$college_id = $info['college_id'];
$cl_sql = "SELECT * FROM class_admin WHERE college_id = '$college_id'";
$cl_result = mysqli_query($data, $cl_sql);
$cl_info = mysqli_fetch_all($cl_result);

$class_count_sql = "SELECT COUNT(*) FROM class_admin WHERE college_id = '$college_id' ";
$class_count_result = mysqli_query($data, $class_count_sql);
$class_count_info = mysqli_fetch_array($class_count_result);
$class_count = $class_count_info[0];

$college_name = $info['college_name'];

?>









<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>S-Tracker - Admin</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="websiteicon" type="ico" href="Images/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="files-dashboard/boxicons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="files-dashboard/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="files-dashboard/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="files-dashboard/demo.css">
    <link rel="stylesheet" href="files-dashboard/dashboard.css">
    <link rel="stylesheet" href="files-dashboard/admin.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="files-dashboard/perfect-scrollbar.css" />

    <link rel="stylesheet" href="files-dashboard/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="files-dashboard/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="files-dashboard/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="admin-home.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">s-tracker</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width=20 height=20 fill=white>
                <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
              </svg>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="admin-home.php" class="menu-link">
                <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=18 fill=#755dff style="margin-left: 0px">
                  <path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/>
                </svg>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>



            
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Tasks</span></li>
            <li class="menu-item">
              <a href="admin-class-teachers.php" class="menu-link">
              <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width=18 fill=white>
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
                <div data-i18n="Basic">Manage Classrooms</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="admin-teachers.php" class="menu-link">
              <svg class="performance" style="width: 19px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill=white>
                <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/>
              </svg>
                <div data-i18n="Boxicons">Manage Teachers</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="admin-students.php" class="menu-link" id="active-side-menu">
              <svg class="performance" style="width: 19px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill=#755dff>
                <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/>
              </svg>
                <div data-i18n="Boxicons">List of Students</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="admin-courses.php" class="menu-link">
                <svg class="performance"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=18 fill=white>
                <path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"/>
              </svg>
                <div data-i18n="Boxicons">List of Courses</div>
              </a>
            </li>


            <li class="menu-header small text-uppercase"><span class="menu-header-text">Account</span></li>
            <li class="menu-item">
              <a href="admin-profile.php"class="menu-link">
                <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=white>
                    <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                </svg>
                <div data-i18n="Support">Profile</div>
              </a>
            </li>
            

            <li class="menu-item">
              <a
                href="logout.php" class="menu-link">
                <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=gray>
                  <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/>
                </svg>
                <div data-i18n="Documentation">Log Out</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->











        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill=grey width=15>
                  <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/>
                </svg>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">                  
                  
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    <?php
                      $sql = "SELECT profile_picture FROM admin_table WHERE admin_id = '$admin_id'";
                      $result = $data->query($sql);
                      if ($result->num_rows > 0)
                      {
                        $row = $result->fetch_assoc();
                        $profilePicturePath = $row["profile_picture"];
                        if (!empty($profilePicturePath))
                        {
                          echo '<img class="nav-dp1" src="' . $profilePicturePath . '" alt="Profile Picture">';
                        }
                        else
                        {                    
                          echo '<img class="" src="Images/nodp.png" alt="Default Profile Picture">';
                        }
                      }
                      else
                      {
                        echo '<img class="" src="Images/nodp.png" alt="Default Profile Picture">';
                      }
                      ?>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">

                              <?php
                                $sql = "SELECT profile_picture FROM admin_table WHERE admin_id = '$admin_id'";
                                $result = $data->query($sql);
                                if ($result->num_rows > 0)
                                {
                                  $row = $result->fetch_assoc();
                                  $profilePicturePath = $row["profile_picture"];
                                  if (!empty($profilePicturePath))
                                  {
                                    echo '<img class="nav-dp1" src="' . $profilePicturePath . '" alt="Profile Picture">';
                                  }
                                  else
                                  {
                                    echo '<img class="" src="Images/nodp.png" alt="Default Profile Picture">';
                                  }
                                }
                                else
                                {
                                  echo '<img class="" src="Images/nodp.png" alt="Default Profile Picture">';
                                }
                              ?>

                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo "{$info['fname']}" ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="admin-profile.php">
                      <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=#566A7F>
                  <path d="M406.5 399.6C387.4 352.9 341.5 320 288 320H224c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3h64c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z"/>
                </svg>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                      <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=#566A7F>
                  <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/>
                </svg>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
        

                    <?php

                        $st_id = $_GET['id'];
                        $st_sql = "SELECT * FROM student_table WHERE id = '$st_id'"; 
                        $st_result = mysqli_query($data, $st_sql);
                        $st_info = mysqli_fetch_assoc($st_result);
                        $stname = $st_info['fname'];
                        $st_gender = $st_info['gender'];
                        $st_dob = $st_info['dob'];
                        $clid = $st_info['class_id'];
                        $phn = $st_info['phone'];

                        $clid_sql = "SELECT * FROM class_admin WHERE class_id = '$clid'"; 
                        $clid_result = mysqli_query($data, $clid_sql);
                        $clid_info = mysqli_fetch_assoc($clid_result);
                        $clname = $clid_info['class_name']
                    ?>


          <section class="class-teachers">
          <form action="" method="POST" id="course_form">
            <div class="contain" style="">
                <h1 class="contain-head"><img src="Images/favicon.ico">student profile</h1>
                <div class="sub-profile-grid">

                    <div class="sub-profile-card">
                      <?php
                        $sql = "SELECT profile_picture FROM student_table WHERE id = '$st_id'";
                        $result = $data->query($sql);
                        if ($result->num_rows > 0)
                        {
                          $row = $result->fetch_assoc();
                          $profilePicturePath = $row["profile_picture"];
                          if (!empty($profilePicturePath))
                          {
                            echo '<div class="profile-pic" style="width: 230px; height: 230px;">
                                      <img class="dp" src="' . $profilePicturePath . '" style="width: 210px; height: 210px">
                                    </div>';
                          }
                          else
                          {                    
                            echo '<div class="profile-pic" style="width: 230px; height: 230px;"><img class="nodp" src="Images/nodp.png" alt="Default Profile Picture" style="width: 210px; height: 210px"></div>';
                          }
                        }
                        else
                        {
                          echo '<div class="profile-pic" style="width: 230px; height: 230px;"><img class="nodp" src="Images/nodp.png" alt="Default Profile Picture" style="width: 210px; height: 210px"></div>';
                        }
                      ?>
                      <script>
                            function deleteProfilePicture()
                            {
                              if (confirm("Are you sure you want to remove the profile picture?"))
                              {
                                // Make an AJAX request to delete_profile_picture.php
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "teacher-dp-delete.php", true);
                                xhr.onreadystatechange = function()
                                {
                                    if (xhr.readyState === XMLHttpRequest.DONE)
                                    {
                                        if (xhr.status === 200)
                                        {
                                            // Refresh the page after successful deletion
                                            location.reload();
                                        }
                                        else
                                        {
                                            // Handle error case
                                            console.log("Error deleting profile picture: " + xhr.responseText);
                                        }
                                    }
                                };
                                xhr.send();
                              }
                            }
                      </script>       
                      
                      

                      <span><?php echo "$stname";?></span>
                      <p>Student</p>
                    </div>
        
                     
                    
                    <div class="sub-profile-card sub-details">
                      <div class="sub-details-1">
                        <span class="sub-profile-label1">Student ID</span>
                        <span class="sub-profile-label2"><?php echo "$st_id";?> </span>
                        
                        <span class="sub-profile-label1">Class</span>
                        <span class="sub-profile-label2"><?php echo "$clname";?></span>

                        <span class="sub-profile-label1">College</span>
                        <span class="sub-profile-label2"><?php echo "$college_name";?></span>
                        
                      </div>

                      <div class="sub-details-2">
                        
                      <span class="sub-profile-label1">Gender</span>
                        <span class="sub-profile-label2"><?php echo "$st_gender";?>   </span>

                        <span class="sub-profile-label1">Date of Birth</span>
                        <span class="sub-profile-label2"><?php echo "$st_dob";?>  </span>
                        
                        <span class="sub-profile-label1">Phone</span>
                        <span class="sub-profile-label2"><?php echo "$phn";?></span>
                      </div>
                    </div>

                </div>    
            </div>

            

          </form>          
          </section>



          
            

          <script>
                if ( window.history.replaceState )
                {
                      window.history.replaceState( null, null, window.location.href );
                  }
                </script>
















            <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="files-dashboard/jquery.js"></script>
    <script src="files-dashboard/popper.js"></script>
    <script src="files-dashboard/bootstrap.js"></script>
    <script src="files-dashboard/perfect-scrollbar.js"></script>

    <script src="files-dashboard/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="files-dashboard/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="files-dashboard/main.js"></script>

    <!-- Page JS -->
    <script src="files-dashboard/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
