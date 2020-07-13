<?php
// header("Content-type:text/HTML;charset=uft8");
$title = $_POST['name'];
$test_time = $_POST['time'];
$sin_sum = $_POST['sin_sum'];
$mul_sum = $_POST['mul_sum'];
$fill_sum = $_POST['fill_sum'];
$jud_sum = $_POST['jud_sum'];
$sin_score = $_POST['sin_score'];
$mul_score = $_POST['mul_score'];
$fill_score = $_POST['fill_score'];
$jud_score = $_POST['jud_score'];
$sum_all = $sin_sum + $mul_sum + $fill_sum + $jud_sum;
$score_all = $sin_sum*$sin_score + $mul_sum*$mul_score + $fill_sum*$fill_score + $jud_sum*$jud_score;
require_once('conn.php');

//删除paper表中原有的题目数据
mysqli_query($conn,"delete from paper");
//填入值不能为空
if($title=="" || $test_time=="" || $sin_score=="" || $mul_sum=="" || $fill_sum=="" || $jud_sum=="" ||
 $sin_score=="" || $mul_score=="" || $fill_score=="" || $jud_sum=="") {
    echo "<script>alert('填入有空值！');location.href='test_modify.php';</script>";
}else {
//插入新的题目数据
$sql = "INSERT INTO paper (title,test_time,sin_sum,sin_score,mul_sum,mul_score,fill_sum,fill_score,jud_sum,jud_score,sum_all,score_all)
                values ('$title','$test_time','$sin_sum','$sin_score','$mul_sum','$mul_score','$fill_sum','$fill_score','$jud_sum','$jud_score','$sum_all','$score_all')";
$insert_result = mysqli_query($conn,$sql);
// 判断是否添加成功		 
if($insert_result){
    echo "<script>alert('题目更新成功！');</script>";
    echo "<script>location.href='test_modify.php';</script>";
}else{
    echo "<script>alert('题目更新失败！');</script>";
    echo "<script>location.href='test_modify.php';</script>";
    }
}