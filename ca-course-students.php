<?php

error_reporting(0);

    session_start();

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $db = 's_tracker';

    $data = mysqli_connect($host,$user,$password,$db);

    $s_sql = "SELECT * FROM student_table";

    $s_result = mysqli_query($data, $s_sql);

    $s_info = mysqli_fetch_assoc($s_result);

    $fname = $s_info['fname'];

    ######################################

    $c_sql = "SELECT * FROM courses";

    $c_result = mysqli_query($data, $c_sql);

    $c_info = mysqli_fetch_assoc($c_result);

    $course_id = $c_info['id'];

    $cname = $c_info['cname'];

    

    if (isset($_POST['selected'])) 
    {
        $selected = $_POST['selected'];
  
        // Step 3: Process each selected record and insert it into the database table
        foreach ($selected as $student_id) 
        {
            $query = "INSERT INTO student_course (student_id, fname, course_id, cname) VALUES ('$student_id', '$fname', '$course_id', '$cname')";
            mysqli_query($data, $query);
        }
  
        // Redirect to a confirmation page
        $_SESSION['confirm'] = 'Student Added to Course successfully!';
        header("location:ca-course-add.php");
    }

?>