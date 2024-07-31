<?php

error_reporting(0);

session_start();

include('database.php');

if($_GET['id'])
{
    $t_id = $_GET['id'];

    $sql = "DELETE FROM teacher_table WHERE id='$t_id' ";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['teacher-delete'] = 'Teacher Deleted successfully!';
        header("location:admin-teachers.php");
    }
}

?>