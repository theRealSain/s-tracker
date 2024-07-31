<?php
error_reporting(0);
session_start();
include('dbconfig.php');

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
                $college_id = $row['4'];
                $teacherQuery = "INSERT INTO teacher_table (fname, phone, id, password, college_id) VALUES ('$fname', '$phone', '$id', '$password', '$college_id')";
                $result = mysqli_query($conn, $teacherQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['teacher-excel'] = "Successfully Imported";
            header('Location: admin-teacher-excel.php');
            exit(0);
        }
        else
        {
            $_SESSION['teacher-excel'] = "Not Imported";
            header('Location: admin-teacher-excel.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['teacher-excel'] = "Invalid File";
        header('Location: admin-teacher-excel.php');
        exit(0);
    }
}
?>