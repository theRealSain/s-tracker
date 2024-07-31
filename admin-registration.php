<?php

error_reporting(0);

session_start();

$con = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con, 's_tracker');

$fname = $_POST['fname'];

$phone = $_POST['phone'];

$admin_id = $_POST['admin_id'];

$password = $_POST['password'];

$college_id = $_POST['college_id'];

$college_name = $_POST['college_name'];

$s = "SELECT * FROM admin_table WHERE admin_id = '$admin_id' ";

$result = mysqli_query($con, $s);

$num =  mysqli_num_rows($result);

if($num==1)
{
  $_SESSION['message'] = 'Username already exists!';
  header("location:admin-reg.php");
}
else
{
  $reg = "INSERT INTO admin_table(fname, phone, admin_id, password, college_id, college_name) VALUES('$fname','$phone','$admin_id','$password', '$college_id', '$college_name');";
  mysqli_query($con, $reg);
  $_SESSION['a-success'] = 'Admin Registration was successful! <br> Please login again.';
  header('location:admin-login.php');
}

?> 