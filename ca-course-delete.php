<?php

error_reporting(0);

session_start();

include('database.php');

if($_GET['id'])
{
    $course_id = $_GET['id'];

    $sql = "DELETE FROM courses WHERE id='$course_id' ";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['course_del'] = 'Course deleted successfully!';
        header("location:ca-courses.php");
    }
}

?>