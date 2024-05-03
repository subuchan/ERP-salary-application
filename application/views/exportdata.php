<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 's no');
$activeWorksheet->setCellValue('B1', 'Employee Id');
$activeWorksheet->setCellValue('C1', 'Employee Name');
$activeWorksheet->setCellValue('D1', 'Pay Days');
$activeWorksheet->setCellValue('E1', 'Gross');
$activeWorksheet->setCellValue('F1', 'Basic');
$activeWorksheet->setCellValue('G1', 'HRA');
$activeWorksheet->setCellValue('H1', 'Variable Allowance');
$activeWorksheet->setCellValue('I1', 'Pay Amount');
$sr=1;
$i=2;
   foreach ($data as $val) {
    $activeWorksheet->setCellValue('A1'.$i, $sr++);
    $activeWorksheet->setCellValue('B1'.$i, $val->emp_id);
    $activeWorksheet->setCellValue('C1'.$i, $val->emp_name);
    $activeWorksheet->setCellValue('D1'.$i, $val->daypresent);
    $activeWorksheet->setCellValue('E1'.$i, $val->gross);
    $activeWorksheet->setCellValue('F1'.$i, $val->basic);
    $activeWorksheet->setCellValue('G1'.$i, $val->hra);
    $activeWorksheet->setCellValue('H1'.$i, $val->allowance);
    $activeWorksheet->setCellValue('I1'.$i, $val->total / 30* $val->daypresent);
    $i++;
   }

$writer = new Xlsx($spreadsheet);
header('Content-Disposition:attachment;filename=employee.xlsx');
$writer->save('php://output');

?>