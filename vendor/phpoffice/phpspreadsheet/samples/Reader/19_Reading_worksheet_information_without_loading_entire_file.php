<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="myfile.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
require __DIR__ . '/../Header.php';

$inputFileType = 'Xls';
$inputFileName = __DIR__ . '/sampleData/example1.xls';

$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' information using IOFactory with a defined reader type of ' . $inputFileType);

$reader = IOFactory::createReader($inputFileType);
$worksheetData = $reader->listWorksheetInfo($inputFileName);

$helper->log('<h3>Worksheet Information</h3>');
$helper->log('<ol>');
foreach ($worksheetData as $worksheet) {
    $helper->log('<li>' . $worksheet['worksheetName']);
    $helper->log('Rows: ' . $worksheet['totalRows'] . ' Columns: ' . $worksheet['totalColumns']);
    $helper->log('Cell Range: A1:' . $worksheet['lastColumnLetter'] . $worksheet['totalRows']);
    $helper->log('</li>');
}
$helper->log('</ol>');
