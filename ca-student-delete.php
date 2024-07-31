<?php

error_reporting(0);

session_start();

include('database.php');

if($_GET['id'])
{
    $user_id = $_GET['id'];

    $sql = "DELETE FROM student_table WHERE id='$user_id' ";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['std-del'] = 'Student Deleted successfully!';
        header("location:ca-students.php");
    }
}

?>