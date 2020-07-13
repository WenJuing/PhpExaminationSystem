<?php
require("conn.php");
require __DIR__."/../../plugins/phpexcel/PHPExcel/PHPExcel.php";//引入文件
$objPHPExcel = new PHPExcel();//实例化PHPExcel类==新建一个excel表格
$objSheet = $objPHPExcel->getActiveSheet();//获得当前活动sheet的操作对象
$tit = array("A1"=>"教师证号", "B1"=>"姓名", "C1"=>"职工号", "D1"=>"电话");
$res = mysqli_query($conn,"select * from teachers");
foreach($tit as $key=>$val) {
    $objSheet->setCellValue($key,$val);     //输出表头
}
$j = 2;
foreach($res as $key=>$val) {
    $objSheet->setCellValue("A".$j,$val['exam_id'])->setCellValue("B".$j,$val['name'])->setCellValue("C".$j,$val['school_id'])->setCellValue("D".$j,$val['tel']);
    $j++;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");//按照指定格式生成excel文件
$result = $objWriter->save(__DIR__."/OfficeFile/teachers.xlsx");
if($result) {
    echo "<script>alert('导出失败');</script>";
    echo "<script>location.href='tea_information.php';</script>";
}else{
    echo "<script>alert('导出成功');</script>";
    echo "<script>location.href='tea_information.php';</script>";
}