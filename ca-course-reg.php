<?php

error_reporting(0);

session_start();

include('database.php');


if(isset($_POST['add-course']))
{
  $cname = $_POST['cname'];
  $id = $_POST['id'];
  $teacher_id = $_POST['teacher_id'];
  $class_id = $_POST['class_id'];
 

  $check = "SELECT * FROM courses";
  $check_user = mysqli_query($data,$check);

   $sql = "INSERT INTO courses(cname, id, teacher_id, class_id) VALUES('$cname', '$id', '$teacher_id', '$class_id')";
   $result = mysqli_query($data, $sql);
  
   if($result)
   {
      $_SESSION['message'] = 'Course Added Succesfully!';
      header("location:ca-courses.php");
   }
   else
   {
       $_SESSION['message'] = 'Failed to add Course. Try again!';
       header("location:ca-courses.php");
   }
}


?> 