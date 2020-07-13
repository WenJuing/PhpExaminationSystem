<?php
require("conn.php");
require __DIR__."/../../plugins/phpexcel/PHPExcel/PHPExcel.php";//引入文件
$objPHPExcel = new PHPExcel();//实例化PHPExcel类==新建一个excel表格
$objSheet = $objPHPExcel->getActiveSheet();//获得当前活动sheet的操作对象
$tit = array("A1"=>"准考证号", "B1"=>"学院", "C1"=>"姓名", "D1"=>"学号", "E1"=>"是否已经考试");
$res = mysqli_query($conn,"select * from candidates");
foreach($tit as $key=>$val) {
    $objSheet->setCellValue($key,$val);     //输出表头
}
$j = 2;
while($row=mysqli_fetch_assoc($res)) {
    //判断是否已经考试
    $e = $row['exam_id'];
    $re = mysqli_query($conn,"select g.id from grades g,candidates c where stu_examid = '$e' and exam_id = '$e'");
    if(mysqli_num_rows($re)>0) $test_already = "是";
    else {$test_already = "否";}
    $objSheet->setCellValue("E".$j,$test_already);
    $j++;
    }
$j = 2;
foreach($res as $key=>$val) {
    $objSheet->setCellValue("A".$j,$val['exam_id'])->setCellValue("B".$j,$val['institute'])->setCellValue("C".$j,$val['name'])->setCellValue("D".$j,$val['school_id']);
    $j++;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");//按照指定格式生成excel文件
$result = $objWriter->save(__DIR__."/OfficeFile/candidates.xlsx");
if($result) {
    echo "<script>alert('导出失败');</script>";
    echo "<script>location.href='stu_information.php';</script>";
}else{
    echo "<script>alert('导出成功');</script>";
    echo "<script>location.href='stu_information.php';</script>";
}
// $dir = dirname(__FILE__);
// require $dir."/PHPExcel/PHPExcel.php";
// $objPHPExcel = new PHPExcel();
// $objSheet = $objPHPExcel->getActiveSheet();
// $objSheet->setTitle("动漫");
// $objSheet->getdeFaultStyle()
// ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->
// setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//文字水平垂直居中
// $objSheet->getDefaultStyle()->getFont()->setName("微软雅黑")->setSize("14");//设置默认字体和大小
// $objSheet->getStyle("A1:C1")->getFont()->setSize("16")->setBold(true)->
// setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED ) );//设置文字颜色
// $objSheet->getStyle("A1:C1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
// ->getStartColor()->setRGB("1e90ff");//填充背景颜色
// $arr = array(
//     array("番名","女主角","年龄"),
//     array("RE0","雷姆","16"),
//     array("物语","雪之下雪乃","18"),
//     array("刀剑神域","亚斯娜","17"),
//     array("辉夜大小姐想要告白","四宫辉夜","16"),
//     array("中二病也要谈恋爱","小鸟游六花","15")
// );
// $objSheet->fromArray($arr);
// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
// $objWriter->save($dir."/arr.xlsx");