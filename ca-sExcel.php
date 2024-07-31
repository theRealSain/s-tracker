<?php
#error_reporting(0);
session_start();
include('database.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $items = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($items as $row)
        {
            if($count > 0)
            {
                $fname = $row['0'];
                $student_id = $row['1'];
                $password = $row['2'];
                $phone = $row['3'];
                $gender = $row['4'];
                $dob = $row['5'];                
                $class_id = $row['6'];
                $college_id = $row['7'];
                $studentQuery = "INSERT INTO student_table (fname, id, password, phone, gender, dob, class_id, college_id) VALUES ('$fname', '$student_id', '$password', '$phone', '$gender', '$dob', '$class_id', '$college_id')";
                $result = mysqli_query($data, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
                $_SESSION['std-excel-err'] = "Error!";
                header('Location: ca-students-excel.php');
            }
        }

        if(isset($msg))
        {
            $_SESSION['std-excel'] = "Successfully Imported";
            header('Location: ca-students-excel.php');
            exit(0);
        }
        else
        {
            $_SESSION['std-excel'] = "Not Imported";
            header('Location: ca-students-excel.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['std-excel'] = "Invalid File";
        header('Location: ca-students-excel.php');
        exit(0);
    }
}
?>