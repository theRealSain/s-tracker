<?php
// Perform necessary validations and authentication before allowing the deletion

session_start();
include('database.php');
$admin_id = $_SESSION["admin_id"];  // Assuming you have stored the admin ID in the session

// Retrieve the profile picture path from the database
$sql = "SELECT profile_picture FROM admin_table WHERE admin_id = '$admin_id'";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profilePicturePath = $row["profile_picture"];

    // Delete the profile picture from the server
    if (!empty($profilePicturePath)) {
        if (unlink($profilePicturePath)) {
            // File deletion successful, update the database
            $sql = "UPDATE admin_table SET profile_picture = NULL WHERE admin_id = '$admin_id'";
            if ($data->query($sql) === true)
            {
                $_SESSION['dp_delete'] = 'Profile picture deleted successfully!';
                header("location:admin-profile.php");
            }
            else
            {
                $_SESSION['dp_error_db'] = 'Error updating profile picture in the database!';
                header("location:admin-profile.php");
            }
        }
        else
        {
            $_SESSION['dp_del_error'] = 'Error deleting the profile picture!';
            header("location:admin-profile.php");
        }
    }
    else
    {
        $_SESSION['no_dp_found'] = 'No profile picture found!';
        header("location:admin-profile.php");
    }
}

$data->close();
?>
