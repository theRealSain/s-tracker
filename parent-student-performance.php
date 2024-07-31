<?php

session_start();

error_reporting(0);

if(!isset($_SESSION['id']))
{
  header('location:parent-login.php');
}


include('database.php');

$id = $_SESSION['id'];

$sql = "SELECT * FROM parent_table WHERE id = '$id' ";

$result = mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);

$student_id = $info['student_id'];

##########################################

$st_sql = "SELECT * FROM student_table WHERE id = '$student_id' ";

$st_result = mysqli_query($data, $st_sql);

$st_info = mysqli_fetch_assoc($st_result);

##########################################

$stc_sql = "SELECT * FROM student_course WHERE student_id = '$student_id' ";

$stc_result = mysqli_query($data, $stc_sql);

$stc_info = mysqli_fetch_all($stc_result);

#############################################

$det_sql = "SELECT * FROM student_evaluation WHERE student_id = '$student_id' ";

$det_result = mysqli_query($data, $det_sql);

$det_info = mysqli_fetch_assoc($det_result);

?>


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

    <title>S-Tracker-Parent</title>
    <meta name="description" content="" />

    <!-- Favicon -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="files-dashboard/boxicons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="files-dashboard/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="files-dashboard/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="files-dashboard/demo.css" />
    <link rel="stylesheet" href="files-dashboard/dash.css" />
    <link rel="stylesheet" href="files-dashboard/sample.css" />
    <link rel="stylesheet" href="files-dashboard/course.css">
    <link rel="stylesheet" href="files-dashboard/details.css">

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
            <a href="parent-home.php" class="app-brand-link">
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
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="parent-home.php" class="menu-link">
                <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=18 fill=#755dff>
                  <path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/>
                </svg>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>



            
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            <li class="menu-item">
              <a href="parent-attendance.php" class="menu-link">
                <svg  class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width=18 fill=#566A7F>
                  <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                </svg>
                <div data-i18n="Basic">Attendance</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="parent-mark.php" class="menu-link">
              <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=20 fill=#566A7F>
                <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/>
              </svg>  
                <div data-i18n="Boxicons">Student Marks</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="parent-eval-intro.php" class="menu-link">
              <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=20 fill=#566A7F>
                  <path d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"/>
                </svg>
                <div data-i18n="Boxicons">Student Evaluation</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="parent-student-performance.php" class="menu-link" id="active-side-menu">
              <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width=13 fill=#755dff>
                <path d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/>
              </svg>  
              <div data-i18n="Boxicons">Student Performance</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="parent-courses.php" class="menu-link">
              <svg class="performance"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width=18 fill=white>
                <path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z"/>
              </svg>
                <div data-i18n="Boxicons">Score Prediction</div>
              </a>
            </li>


            <li class="menu-item">
              <a href="parent-feedback.php" class="menu-link">
                <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=#566A7F>
                  <path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/>
                </svg> 
                <div data-i18n="Tables">Ask Something</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="parent-teachers.php" class="menu-link">
                <svg id="i" class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" width=18 fill=#566A7F>
                  <path d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z"/>
                </svg>
                <div data-i18n="Tables">Teacher Information</div>
              </a>
            </li>




            <li class="menu-header small text-uppercase"><span class="menu-header-text">Account</span></li>
            <li class="menu-item">
              <a href="parent-profile.php"class="menu-link">
                <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=#566A7F>
                  <path d="M406.5 399.6C387.4 352.9 341.5 320 288 320H224c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3h64c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z"/>
                </svg>
                <div data-i18n="Support">Profile</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="logout.php" class="menu-link">
                <svg class="side-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width=18 fill=#566A7F>
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
                            <small class="text-muted">Parent</small>
                          </div>
                        </div>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="parent-profile.php">
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


          <form action="" method="POST">

          <section class="profile-area">
            <div class=>
              <h3 class="head"><img src="favicon.ico" width="35">student profile</h3>
              <div class="profile-area-details">
                <span class="detail"><b>Name:</b> <?php echo "{$st_info['fname']}" ?></span>
                <span class="detail"><b>Student ID:</b> <?php echo "{$st_info['id']}" ?></span>
                <span class="detail"><b>Phone:</b> <?php echo "{$st_info['phone']}" ?></span>
                <span class="detail"><b>Gender:</b> <?php echo "{$st_info['gender']}" ?></span>
                <span class="detail"><b>Date of Birth:</b> <?php echo "{$st_info['dob']}" ?></span>
              </div>
            </div>
          </section>

          <section class="std-details-area">
            <div class=>
              <h3 class="head"><img src="favicon.ico" width="35">student performance details</h3>
              <div class="detailing-table">

                <table class="std-detailing">
                  <tr>
                  <tr>
                    <th><span class="det-qn">Student ID:</span><br> <?php echo "{$st_info['id']}" ?></th>                    
                  </tr>
                    <th><span class="det-qn">Is the course you have selected based on your interests?</span><br> <?php echo "{$det_info['interest']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Did you study regularly?</span><br> <?php echo "{$det_info['regular_study']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Did you schedule your own study?</span><br> <?php echo "{$det_info['schedule']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">What is the average studying time per day?</span><br> <?php echo "{$det_info['study_time']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">What is the average studying time on days before exam?</span><br> <?php echo "{$det_info['exam_study']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">What is your mode of study?</span><br> <?php echo "{$det_info['study_mode']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Are you satisfied with your study pattern?</span><br> <?php echo "{$det_info['satisfy']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Do you use IT technologies for studying?</span><br> <?php echo "{$det_info['it_use']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Do you enrolled in any additional courses?</span><br> <?php echo "{$det_info['addln_courses']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">What is the average amount of time you spend using social media per day?</span><br> <?php echo "{$det_info['social_media']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">What is the average sleeping time per day?</span><br> <?php echo "{$det_info['sleep_time']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">How much time you take for travelling to college?</span><br> <?php echo "{$det_info['travel_time']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Do you contribute to class discussions?</span><br> <?php echo "{$det_info['discussion']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">Do you have effective communication with teachers?</span><br> <?php echo "{$det_info['communication']}" ?></th>                    
                  </tr>
                  <tr>
                    <th><span class="det-qn">What is the average percentage in semester exams:</span><br> <?php echo "{$det_info['semester_mark']}%" ?></th>                    
                  </tr>
                </table>

              </div>
            </div>
          </section>

          <section class="std-details-area">
            <h3 class="head"><img src="favicon.ico" width="35">student performance</h3>
            <span class="span1">Parent Name: <?php echo "{$info['fname']}" ?></span>
            <span class="span2">Student Name: <?php echo "{$st_info['fname']}"; ?></span>
            <div class="std-details-table">

            <table border=1>
                  <tr>
                    <th>Course</th>
                    <th>Internal</th>
                    <th>Teacher Evaluation</th>
                    <th>Parent Evaluation</th>
                    <th>Attendance</th>
                    <th>Average Performance</th>
                  </tr>
                  
                  
                     <?php
                       foreach($stc_info as $items)
                       {
                         $cname = $items[4];
                         $internal = $items[5];
                         $t_rating = $items[6];
                         $p_rating = $items[7];
                         $attendance = $items[8];

                         $avg_performance = ($attendance + $internal + $t_rating + $p_rating)/4;
                     ?>

                  <tr>
                    <td><?php echo "$cname"; ?></td>
                    <td><?php echo "$internal"; ?></td>
                    <td><?php echo "$t_rating"; ?></td>
                    <td><?php echo "$p_rating"; ?></td>                    
                    <td><?php echo "$attendance"; ?></td>
                    <td><?php echo "$avg_performance%"; ?></td>

                    <?php
                      }
                    ?> 

                  </tr> 

                      
                </table>

            </div>
          </section>


          

          <section class="graph-area">
            <h3 class="head"><img src="favicon.ico" width="35">student performance graph</h3>

            <select class="form-control" id="course-dropdown" name="graph_form" onchange="this.form.submit()">
                    <option selected hidden>Choose the course</option>
                    <?php

                      $c2_sql = "SELECT * FROM student_course WHERE student_id = '$student_id' ";                      
                      $c2_result = mysqli_query($data, $c2_sql);

                      while ($row = mysqli_fetch_array($c2_result)) 
                      {
                        echo $row['cname'];
                        $row_cname=$row['cname'];
                        $c3_query=mysqli_query($data,"SELECT * FROM courses WHERE cname = '$row_cname';");
                        $c3_result=mysqli_fetch_assoc($c3_query);
                        $course_id=$c3_result['id'];

                        echo "<option value='" . $course_id. "'>" . $row['cname'] . "</option>";
                      }
                    ?> 
                </select>

                <?php
                  if (isset($_POST['graph_form'])) 
                  {
                    $selected_course_id=$_POST['graph_form'];
                    $graph_sql = "SELECT * FROM student_course WHERE student_id = '$student_id' AND course_id = '$selected_course_id';";
                    $graph_result = mysqli_query($data, $graph_sql);
                    $graph_info = mysqli_fetch_assoc($graph_result);

                    $course_name = $graph_info['cname'];
                    $attendance = $graph_info['attendance'];
                    $internal = $graph_info['internal'];
                    $t_rating = $graph_info['t_rating'];
                    $p_rating = $graph_info['p_rating'];                    

                    echo "<span class='span1'><br>Course: $course_name</span>";


                    $test1 = array(
                      array("y" => $attendance, "label" => "Attendance" ),	
                    	array("y" => $internal, "label" => "Internal Mark" ),
                      array("y" => $t_rating, "label" => "Teacher Rating" ),
                    	array("y" => $p_rating, "label" => "Parent Rating" ),
                    );
                  }
                ?>


          <script>
            window.onload = function() {
            
            var chart = new CanvasJS.Chart("chartContainer", {
              axisX:{
                margin: 00
              },
            	animationEnabled: true,
            	theme: "light2",
              backgroundColor: "#f5f5f9",
              
              axisY:{
                fontFamily: "sans-serif",
                title: "Student Performance(%)",
                minimum: 0,
                maximum: 100,
                interval: 10
              },

            	data: [{
            		type: "column",
                toolTipContent: "{label}: {y}%",
                indexLabelPlacement: "inside",
			          indexLabel: "{y}%",
                color: "#c7afff",
            		yValueFormatString: "#,##0.## ",
            		dataPoints: <?php echo json_encode($test1, JSON_NUMERIC_CHECK); ?>
            	}]
            });

            chart.render();
            }
          </script>

            
            <div id="chartContainer" class="graph" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          </section>

          </form>




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
