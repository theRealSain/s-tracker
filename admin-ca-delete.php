<?php

error_reporting(0);

session_start();

include('database.php');

if($_GET['id'])
{
    $ca_id = $_GET['id'];

    $sql = "DELETE FROM class_admin WHERE id='$ca_id' ";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['class-delete'] = 'Class Deleted successfully!';
        header("location:admin-class-teachers.php");
    }
}

?>