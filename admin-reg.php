<?php
  session_start();
  error_reporting(0);
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
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

    <title>ADMIN-LOGIN</title>

    <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="Images/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="files-login/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="files-login/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="files-login/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="files-login/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="files-login/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="files-login/page-auth.css" />
    <!-- Helpers -->
    <script src="files-login/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="login-options.php" class="app-brand-link gap-2">
                  
                  <img src="Images/favicon.ico" width=35>
                  <span class="app-brand-text demo text-body fw-bolder">S-TRACKER</span>

                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2"><b>Admin Registration</b></h4>
              <p class="mb-4">Enter the world of s-tracker by creating an account here!</p>

              <form id="formAuthentication" class="mb-3" action="admin-registration.php" method="POST">

              <div class="mb-3">
                  <label for="teacher_id" class="form-label">Name</label>
                  <input type="text" class="form-control" id="email" name="fname"
                    placeholder="Name" autofocus required>
                </div>

                <div class="mb-3">
                  <label for="teacher_id" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="email" name="phone"
                    placeholder="Phone" autofocus required>
                </div>

                <div class="mb-3">
                  <label for="teacher_id" class="form-label">Admin ID</label>
                  <input type="text" class="form-control" id="email" name="admin_id"
                    placeholder="Enter Admin ID" autofocus required>
                </div>

                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" required>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="college_id" class="form-label">College ID</label>
                  <input type="text" class="form-control" id="email" name="college_id"
                    placeholder="Enter College ID" autofocus required>
                </div>

                <div class="mb-3">
                  <label for="college_id" class="form-label">College Name</label>
                  <input type="text" class="form-control" id="email" name="college_name"
                    placeholder="Enter College Name" autofocus required>
                </div>        

                        <?php
                          if($_SESSION['message'])
                          {
                            echo "<div class='alert alert-danger alert-dismissible' role='alert' id='alert_toast'>"
                            .$_SESSION['message'].
                            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
                          }
                          unset($_SESSION['message']);
                        ?>

                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                </div>
                <span class="reg">Already have an account? <a href="admin-login.php">Sign In</a></span><br>
                <span class="reg">Back to <a href="index.php">Home</a></span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="files-login/jquery.js"></script>
    <script src="files-login/popper.js"></script>
    <script src="files-login/bootstrap.js"></script>
    <script src="files-login/perfect-scrollbar.js"></script>

    <script src="files-login/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="files-login/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
