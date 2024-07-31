<?php
error_reporting(0);
session_start();

$con = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con, 's_tracker');

$fname = $_POST['fname'];

$phone = $_POST['phone'];

$id = $_POST['id'];

$password = $_POST['password'];

$student_id = $_POST['student_id'];

$s = "SELECT * FROM parent_table WHERE id = '$id' ";

$result = mysqli_query($con, $s);

$num =  mysqli_num_rows($result);

if($num==1)
{
  $_SESSION['message'] = 'Username already taken';
  header("location:parent-reg.php");
}
else
{
  $reg = "INSERT INTO parent_table(fname, phone, id, password, student_id) VALUES ('$fname', '$phone', '$id', '$password', '$student_id')";
  mysqli_query($con, $reg);
  header('location:parent-register-success.php');
}

?> 