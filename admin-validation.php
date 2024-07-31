<?php
error_reporting(0);
session_start();

$con = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con, 's_tracker');

$admin_id = $_POST['admin_id'];

$password = $_POST['password'];

$s = "SELECT * FROM admin_table where admin_id = '$admin_id' && password = '$password'";

$result = mysqli_query($con, $s);

$num=  mysqli_num_rows($result);

if($num == 1)
{
  $_SESSION['admin_id'] = $admin_id;
  header('location:admin-home.php');
}
else
{
  $_SESSION['message'] = 'Incorrect Username or Password!';
  header("location:admin-login.php");
}

?>