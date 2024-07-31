<?php

error_reporting(0);

session_start();

$con = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con, 's_tracker');

$fname = $_POST['fname'];

$phone = $_POST['phone'];

$id = $_POST['id'];

$password = $_POST['password'];

$class_id = $_POST['class_id'];

$college_id = $_POST['college_id'];

$s = "SELECT * FROM class_admin WHERE id = '$id' ";

$result = mysqli_query($con, $s);

$num =  mysqli_num_rows($result);

if($num==1)
{
  $_SESSION['message'] = 'Username already exists!';
  header("location:ca-reg.php");
}
else
{
  $reg = "INSERT INTO class_admin(fname, phone, id, password, class_id, college_id) VALUES('$fname','$phone','$id','$password', '$class_id', '$college_id');";
  mysqli_query($con, $reg);
  header('location:ca-registered.php');
}

?> 