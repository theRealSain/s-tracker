<?php

error_reporting(0);

session_start();

include('database.php');

if($_GET['id'])
{
    $student_id = $_GET['id'];

    $sql = "DELETE FROM student_course WHERE student_id='$student_id' ";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['crs-std-del'] = 'Student removed from course!';
        header("location:ca-courses.php");
    }
}

?>