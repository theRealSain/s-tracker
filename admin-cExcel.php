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
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $fname = $row['0'];
                $phone = $row['1'];
                $id = $row['2'];
                $password = $row['3'];
                $class_name = $row['4'];
                $class_id = $row['5'];
                $college_id = $row['6'];
                $classQuery = "INSERT INTO class_admin (fname, phone, id, password, class_name, class_id, college_id) VALUES ('$fname', '$phone', '$id', '$password', '$class_name', '$class_id', '$college_id')";
                $result = mysqli_query($data, $classQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
                $_SESSION['class-excel-err'] = "Error!";
                header('Location: admin-ca-excel.php');
            }
        }

        if(isset($msg))
        {
            $_SESSION['class-excel'] = "Successfully Imported";
            header('Location: admin-ca-excel.php');
            exit(0);
        }
        else
        {
            $_SESSION['class-excel'] = "Not Imported";
            header('Location: admin-ca-excel.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['class-excel'] = "Invalid File";
        header('Location: admin-ca-excel.php');
        exit(0);
    }
}
?>