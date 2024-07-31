<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['id']))
{
  header('location:student-login.php');
}

error_reporting(0);

include('database.php');

$id = $_SESSION['id'];

$sql = "SELECT * FROM student_table WHERE id = '$id' ";

$result = mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);

    $sql = "DELETE FROM student_evaluation WHERE student_id='$id' ";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['del_message'] = 'Your data deleted successfully!';
        header("location:student-evaluation.php");
    }

?>