<?php
header("Content-type:text/HTML;charset=utf8");
require_once 'conn.php';
//删除单选
$ques = $_GET['sin_id'];
$sin_sql = "delete from single_choices where question='$ques'";
$sin_result = mysqli_query($conn,$sin_sql);
//删除多选
$ques = $_GET['mul_id'];
$mul_sql = "delete from multiple_choices where question='$ques'";
$mul_result = mysqli_query($conn,$mul_sql);
//删除填空
$ques = $_GET['fill_id'];
$fill_sql = "delete from fillings where question='$ques'";
$fill_result = mysqli_query($conn,$fill_sql);
//删除判断
$ques = $_GET['jud_id'];
$jud_sql = "delete from judges where question='$ques'";
$jud_result = mysqli_query($conn,$jud_sql);
if($sin_result || $mul_result || $fill_result || $jud_result) {
    echo "<script>alert('删除成功');</script>";
    echo "<script>location.href='delques.php';</script>";
}else{
    echo "<script>alert('添加失败');</script>";
    echo "<script>location.href='delques.php';</script>";
}
?>