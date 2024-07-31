<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="files-login/home.css" />
    <title>s-tracker - Home</title>

    <link rel="icon" type="ico" href="Images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="files-dashboard/boxicons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="files-dashboard/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="files-dashboard/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="files-dashboard/demo.css" />

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
   
    <nav class="nav-bar">
      <h1 class="algata"><img class="stra" src="Images/favicon.ico" width=30>s-tracker</h1>
      <div class="button">
      </div>
    </nav>

<!----------------------------------------------------------------------------------------------------->

    <section class="first" style="height: 85.5vh;">
    <h1 class="main">
      <span style="font-weight: bolder; margin-bottom: 30px;"><img class="stra" src="Images/favicon.ico" width=40>s-tracker</span> <br>
    Delivering The
    <br>
    Best 
      Academic 
    Experiences
    </h1>

    <h3 class="qn">Want To Know How ?</h3>

    </section> 

<!----------------------------------------------------------------------------------------------------->

    <section class="desc" style="height:auto">

      <div class="img-desc">
        <div class="img">
          <img src="Images/z_home.png" class="svg">
        </div>

        <div class="text">
          <h1 class="text-heading">
            Want to know what we did for you?
            <br>
            We can help you with that!
          </h1>
          <p class="para">
            s-tracker is a Student course management system which is purely for the 
            performance analysis of the students. This web application works effectively 
            when all the users contribute by inputting their data. This software is very 
            much useful for students for their performance analysis and improving their 
            performance.
          </p> <br>
          <a href="#main" class="arlink">
          <button class="arrow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M862 465.3h-81c-4.6 0-9 2-12.1 5.5L550 723.1V160c0-4.4-3.6-8-8-8h-60c-4.4 0-8 3.6-8 8v563.1L255.1 470.8c-3-3.5-7.4-5.5-12.1-5.5h-81c-6.8 0-10.5 8.1-6 13.2L487.9 861a31.96 31.96 0 0 0 48.3 0L868 478.5c4.5-5.2.8-13.2-6-13.2z"></path>
            </svg>
          </button>
          </a>

        </div>
      </div>
    </section>

<!------------------------------------------------------------------------------------------------------------------------->

    <a name="main"></a>
    <section class="cards" style="height: auto;">

      <div class="division">main users</div>

      <div class="admin-card" style="border-radius: 40px; padding:30px 20px 50px 20px;">
          <img class="logo" src="Images/z_mainadmin.png" >
          <h1 class="card-head">Admin</h1>
          <p class="card-para" id="adm">Login for admin</p>
          <a href="admin-login.php"><button class="lbtn" id="abtn">admin login<button></a>
          <p class="card-link">New to s-tracker? <a href="admin-reg.php">Sign Up</a> here</p>
      </div>

      <div class="elements">
        <div class="card" style="border-radius: 40px">
          <img class="logo" src="Images/z_admin.png" >
          <h1 class="card-head">Class Teacher</h1>
          <p class="card-para">Login for class teachers</p>
          <a href="ca-login.php"><button class="lbtn">class teacher login<button></a>
        </div>
        <div class="card" style="border-radius: 40px">
          <img class="logo" src="Images/z_teacher.png" >
          <h1 class="card-head">Teacher</h1>
          <p class="card-para">Login for teachers</p>
          <a href="teacher-login.php"><button class="lbtn">teacher login<button></a>
        </div>
        <div class="card" style="border-radius: 40px">
          <img class="logo" src="Images/z_parent.png" >
          <h1 class="card-head">Parent</h1>
          <p class="card-para">Login for parents</p>
          <a href="parent-login.php"><button class="lbtn">parent login<button></a>
        </div>
        <div class="card" style="border-radius: 40px">
          <img class="logo" src="Images/z_Student.png" >
          <h1 class="card-head">Student</h1>
          <p class="card-para">Login for students</p>
          <a href="student-login.php"><button class="lbtn">student login<button></a>
        </div>
      </div>
    </section>

    <!-------------------------------------------------------------------------------------------------->


    <section class="foot">
      <span class="last">Team <img class="stra" src="Images/favicon.ico" width=30>s-tracker</span>
    </section>

    
    
  </body>

</html>