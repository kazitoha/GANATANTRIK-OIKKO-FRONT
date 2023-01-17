<?php
require '../vendor/autoload.php';
require_once '../database/db_connect.php';
include '../inc/validation/validation.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();








$sheet->setCellValue('A1', 'Register Type');
$sheet->setCellValue('B1', 'Ref');
$sheet->setCellValue('C1', 'Name');
$sheet->setCellValue('D1', "Mother's Name");
$sheet->setCellValue('E1', "Father's Name");
$sheet->setCellValue('F1', 'Present Address');
$sheet->setCellValue('G1', 'Present Thana');
$sheet->setCellValue('H1', 'Present District');
$sheet->setCellValue('I1', 'Nid No.');
$sheet->setCellValue('J1', 'Mobile No.');




$start =validation($_POST['start_id']);
$end   =validation($_POST['end_id']);;

$excel_row=1;
for($i=$start; $i <=$end; $i++)
{
  $excel_row++;

  //  database all data call
  $query="SELECT * FROM short_form_of_reg_gra WHERE id=$i";
  $run_query=mysqli_query($db_connection,$query);
  $data_fetch=mysqli_fetch_assoc($run_query);
 
  $sheet->setCellValue('A'.$excel_row, $data_fetch['register_type']);
  $sheet->setCellValue('B'.$excel_row, $data_fetch['ref']);
  $sheet->setCellValue('C'.$excel_row, $data_fetch['name']);
  $sheet->setCellValue('D'.$excel_row, $data_fetch['mother_name']);
  $sheet->setCellValue('E'.$excel_row, $data_fetch['father_name']);
  $sheet->setCellValue('F'.$excel_row, $data_fetch['present_address']);
  $sheet->setCellValue('G'.$excel_row, $data_fetch['present_thana']);
  $sheet->setCellValue('H'.$excel_row, $data_fetch['present_district']);
  $sheet->setCellValue('I'.$excel_row, $data_fetch['nid_no']);
  $sheet->setCellValue('J'.$excel_row, $data_fetch['mobile_no']);

}








$writer = new Xlsx($spreadsheet);
$writer->save('../uploads/excel/excel.csv');
$file_url = '../uploads/excel/excel.csv';  
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: utf-8");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);  