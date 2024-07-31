<?php
error_reporting(0);
session_start();

$con = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con, 's_tracker');

$parent_id = $_POST['parent_id'];

$teacher_id = $_POST['teacher_id'];

$message = $_POST['message'];

$sql = "INSERT INTO parent_feedback (parent_id, teacher_id, message) VALUES ('$parent_id', '$teacher_id', '$message')";

if (mysqli_query($con, $sql))
{
  $_SESSION['message'] = 'Message was sent successfully!';
  header("location:parent-feedback.php");
}
else
{
  $_SESSION['xmessage'] = 'Failed to send message!';
  header("location:parent-feedback.php");
}

?> 