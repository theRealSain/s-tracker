<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['id']))
{
  header('location:teacher-login.php');
}

#error_reporting(0);

include('database.php');

$id = $_SESSION['id'];

$sql = "SELECT * FROM teacher_table WHERE id = '$id' ";

$result = mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);

#########################################

$teacher_id = $info['id'];

$c_sql = "SELECT * FROM courses WHERE teacher_id = '$teacher_id' ";

$c_result = mysqli_query($data, $c_sql);

$c_info = mysqli_fetch_all($c_result);

#########################################

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

    <title>S-Tracker - Teacher</title>
    <meta name="description" content="" />

    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="favicon.ico">

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
            <a href="teacher-home.php" class="app-brand-link">
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

            <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width=20 height=20 fill=white>
                <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
              </svg>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="teacher-home.php" class="menu-link">
                <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=18 fill=#755dff style="margin-left: 0px">
                  <path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/>
                </svg>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>



            
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Tasks</span></li>
            <li class="menu-item">
              <a href="teacher-attendance-intro.php" class="menu-link">
              <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width=16 fill=white>
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
                <div data-i18n="Basic">Attendance</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="teacher-courses.php" class="menu-link">
              <svg class="performance"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=16 fill=white>
                <path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"/>
              </svg>
                <div data-i18n="Boxicons">Your Courses</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="teacher-mark-intro.php" class="menu-link" id="active-side-menu">
              <svg class="active-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=16 fill=white>
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
              </svg>  
                <div data-i18n="Boxicons">Student Marks</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="teacher-eval-intro.php" class="menu-link">
              <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=18 fill=white>
                  <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                </svg>
                <div data-i18n="Boxicons">Student Evaluation</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="teacher-feedback.php" class="menu-link">
              <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=15 fill=white>
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z"/>
                </svg>
                <div data-i18n="Boxicons">Parent Feedback</div>
              </a>
            </li>


            <li class="menu-header small text-uppercase"><span class="menu-header-text">Account</span></li>
            <li class="menu-item">
              <a href="teacher-profile.php"class="menu-link">
                <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=16 fill=white>
                    <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                </svg>
                <div data-i18n="Support">Profile</div>
              </a>
            </li>
            

            <li class="menu-item">
              <a
                href="logout.php" class="menu-link">
                <svg class="performance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=16 fill=gray>
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
                      <svg class="user-round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill=white width=20>
                          <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                      </svg>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <svg class="user-round" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill=white width=20>
                                <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                              </svg>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo "{$info['fname']}" ?></span>
                            <small class="text-muted">Teacher</small>
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



                <section class="class-teachers">
                  <form action="" method="POST" id="course_form">
                    <div class="contain">
                        <h1 class="contain-head"><img src="Images/favicon.ico">Student Marks</h1>

                        <p class="students-intro">This section displays all the students of <?php echo $college_name; ?> grouped by all courses that are assigned to you.<br>
                        Choose a course from the list below to add marks of students under each course.</p>

                        <div class="course-details">

                        <?php                          
                          $cid = "SELECT * FROM courses WHERE teacher_id = '$id' ";
                          $cid_result = mysqli_query($data, $cid);
                          $cid_info = mysqli_fetch_all($cid_result);

                          foreach($cid_info as $cPerformance)
                          {
                            $crs_id = $cPerformance[1];

                            $sp_good_sql = "SELECT COUNT(*) FROM student_course WHERE course_id = '$crs_id' AND internal >= 80";
                            $sp_good_result = mysqli_query($data, $sp_good_sql);
                            $sp_good_info = mysqli_fetch_array($sp_good_result);
                            $sp_good = $sp_good_info[0];
                            #echo "<span style='color: green;'>$sp_good </span>";

                            $sp_avg_sql = "SELECT COUNT(*) FROM student_course WHERE course_id = '$crs_id' AND internal BETWEEN 40 AND 80";
                            $sp_avg_result = mysqli_query($data, $sp_avg_sql);
                            $sp_avg_info = mysqli_fetch_array($sp_avg_result);
                            $sp_avg = $sp_avg_info[0];
                            #echo "<span style='color: blue;'>$sp_avg </span>";

                            $sp_bavg_sql = "SELECT COUNT(*) FROM student_course WHERE course_id = '$crs_id' AND internal <= 40";
                            $sp_bavg_result = mysqli_query($data, $sp_bavg_sql);
                            $sp_bavg_info = mysqli_fetch_array($sp_bavg_result);
                            $sp_bavg = $sp_bavg_info[0];
                            #echo "<span style='color: red;'>$sp_bavg </span>";
                        ?>

                          
                            <table class='c-details-table'>
                              <tr class='c-rFirst'>
                                <td class='c-lt fst1'>Outstanding Students</td>
                                <td class='c-rt fst2'><?php echo "$sp_good" ?></td>
                              </tr>
                              <tr>
                                <td class='c-lt'>Average Students</td>
                                <td class='c-rt'><?php echo "$sp_avg" ?></td>
                              </tr>
                              <tr class='c-rLast'>
                                <td class='c-lt lst1'>Below Average Students</td>
                                <td class='c-rt lst2'><?php echo "$sp_bavg" ?></td>
                              </tr>                                              
                            </table>
                          

                          <?php
                          }
                          ?>

                        </div>

                        

                        <?php
                          foreach($cid_info as $courses)
                          {                    
                              $teacher_id = $courses[2];
                              $class_id = $courses[3];
                              $course_id = $courses[1];

                              $tn_sql = "SELECT * FROM teacher_table WHERE id = '$teacher_id' ";
                              $tn_result = mysqli_query($data, $tn_sql);
                              $tn_info = mysqli_fetch_all($tn_result);
                              foreach($tn_info as $teacher)
                              {
                                  $teacher_name = $teacher[0];

                                  $cls_sql = "SELECT * FROM class_admin WHERE class_id = '$class_id' ";
                                  $cls_result = mysqli_query($data, $cls_sql);
                                  $cls_info = mysqli_fetch_all($cls_result);
                                  foreach($cls_info as $class)
                                  {
                                      $class_name = $class[4];


                                      $student_count_sql = "SELECT COUNT(*) FROM student_course WHERE course_id = '$course_id';";
                                      $student_count_result = mysqli_query($data, $student_count_sql);
                                      $student_count_info = mysqli_fetch_array($student_count_result);
                                      $student_count = $student_count_info[0];

                                      echo "
                                      <a href='teacher-mark.php?id={$course_id}' style='color: inherit;'>
                                      ";
                        ?>
                        
                                      <div class="course">
                                          <span class="course-left">
                                            <svg class="grad" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width=25><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/>
                                            </svg>
                                          </span>
                                          <h1 class="course-head"><?php echo $courses[0]; ?></h1>
                                          <p class="teacher">Lecture by: <?php echo $teacher_name; ?></p>
                                          <p class="teacher">Number of students: <?php echo $student_count ; ?></p>
                                          <span class="clas"><?php echo $class_name; ?></span>

                                             

                                      </div>
                                      </a>


                        <?php
                                }
                            }
                        }
                        ?>                

                    </div>
                  </form>
                </section>















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
