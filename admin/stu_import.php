<?php
header('Content-type:text/html;charset=utf-8');
require __DIR__."/../../plugins/phpexcel/PHPExcel/PHPExcel.php";//引入文件
require("conn.php");
$fileInfo = $_FILES['upFile'];
$filename = $fileInfo['name'];  //获取上传的文件名
$filename =  __DIR__."/OfficeFile/".$filename;
$objPHPExcel = PHPExcel_IOFactory::load($filename);//加载文件
$sheetCount = $objPHPExcel->getSheetCount();//得到表格里sheet的个数
for($i=0;$i<$sheetCount;$i++) {
    $data = $objPHPExcel->getSheet($i)->toArray();//读取每个sheet里的数据，全部放到数组中
    // print_r($data);
}
$rows_num = count($data);       //算出考生记录多少行
for($i=1; $i<$rows_num; $i++) {
    $institute = $data[$i][0];
    $school_id = $data[$i][1];
    $name = $data[$i][2];
    $exam_id = $data[$i][3];
    $password = $data[$i][4];
    mysqli_query($conn,"insert into candidates (institute,school_id,name,exam_id,password) 
    values('$institute','$school_id','$name','$exam_id','$password')");

    // echo $data[$i][0]."||".$data[$i][1]."||".$data[$i][2]."||".$data[$i][3]."||".$data[$i][4]."||"."<br />";
}
echo "<script>alert('导入成功！');</script>";
echo "<script>location.href='stu_information.php';</script>";
// print_r($data);
// $fileType = PHPExcel_IOFactory::identify($filename);//获取文件类型
// $objReader = PHPExcel_IOFactory::createReader($fileType);//获取文件读取操作对象
// $objPHPExcel = PHPExcel_IOFactory::load($filename);
// $objPHPExcel = $objReader->load($filename);//加载文件
// foreach($objPHPExcel->getWorksheetIterator() as $sheet){
//     foreach($sheet->getRowIterator() as $row) {
//         // $stu_row = "";
//         foreach($row->getCellIterator() as $cell) {
//             $data = $cell->getValue();
//             $stu_row = $data;
//         }
//         // mysqli_query($conn,"insert into candidates values('$stu_row[0]','$stu_row[1]','$stu_row[2]','$stu_row[3]','$stu_row[4]')");

//     }
// }
