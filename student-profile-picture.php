<?php

            session_start();
            error_reporting(0);

            // Database connection
            include('database.php');

            session_start();
            if(!isset($_SESSION['id']))
            {
              header('location:student-login.php');
            }

            $student_id = $_SESSION['id'];
            $d_sql = "SELECT * FROM student_table WHERE id = '$student_id' ";
            $d_result = mysqli_query($data, $d_sql);
            $d_info = mysqli_fetch_assoc($d_result);

            // File upload
            $targetDir = "Profile/";  // Directory to store uploaded images
            $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);  // Path of the uploaded file
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is a valid image
            $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
            if ($check === false)
            {
                $_SESSION['dp_invalid'] = 'Invalid image file!';
                header("location:studnet-profile.php");
                $uploadOk = 0;
            }

            // Check file size (optional)
            if ($_FILES["profile_picture"]["size"] > 5000000)
            {
                $_SESSION['dp_large'] = 'This file is too large. Try uploading a small one!';
                header("location:student-profile.php");
                $uploadOk = 0;
            }

            // Allow only certain file formats (optional)
            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif")
            {            
                $_SESSION['dp_format'] = 'Only JPG, JPEG, PNG, and GIF files are allowed!';
                header("location:student-profile.php");
                $uploadOk = 0;
            }

            // If file upload is OK, move the uploaded file to the target directory
            if ($uploadOk == 1)
            {
                if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile))
                {
                    $profilePicturePath = $targetFile;                                
                    $sql = "UPDATE student_table SET profile_picture = '$profilePicturePath' WHERE id = '$student_id'";
                    if ($data->query($sql) === true)
                    {
                        $_SESSION['dp_change'] = 'Your Profile picture was updated!';
                        header("location:student-profile.php");
                    }
                    else
                    {                        
                        $_SESSION['no_dp_database'] = 'Error updating profile picture in the database!';
                        header("location:student-profile.php");
                    }
                }
                else
                {
                    $_SESSION['no_dp_change'] = 'Error in updating Profile picture!';
                    header("location:student-profile.php");
                }
            }

            
          ?>