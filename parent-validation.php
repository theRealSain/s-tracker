<?php
error_reporting(0);
session_start();

$con = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con, 's_tracker');

$id = $_POST['id'];

$password = $_POST['password'];

$s = "SELECT * FROM parent_table WHERE id = '$id' && password = '$password' ";

$result = mysqli_query($con, $s);

$num=  mysqli_num_rows($result);

if($num == 1)
{
  $_SESSION['id'] = $id;
  header('location:parent-home.php');
}
else
{
  $_SESSION['message'] = 'Incorrect Username or Password!';
  header("location:parent-login.php");
}

?>