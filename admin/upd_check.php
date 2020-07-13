<?php
header("Content-type:text/HTML;charset=utf8");
require_once 'conn.php';
//更新单选
$ques = $_POST['ques'];//老题目
$question = $_POST['question'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$solution = $_POST['solution'];
if($question=="" || $a=="" || $b=="" || $c=="" || $d=="" || $solution=="") {
    echo "<script>alert('填入不能有空！');</script>";
    echo "<script>location.href='delques.php';</script>";
}
else{
    $sin_sql = "update single_choices set question='$question', A='$a', B='$b', C='$c', D='$d', solution='$solution' where question='$ques'";
    $sin_result = mysqli_query($conn,$sin_sql);
}

//更新多选
$ques = $_POST['ques'];
$question = $_POST['question'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$solution = $_POST['solution'];
if($question=="" || $a=="" || $b=="" || $c=="" || $d=="" || $solution=="") {
    echo "<script>alert('填入不能有空！');</script>";
    echo "<script>history.go(-1);</script>";
}
else{
    $mul_sql = "update multiple_choices set question='$question', A='$a', B='$b', C='$c', D='$d', solution='$solution' where question='$ques'";
    $mul_result = mysqli_query($conn,$mul_sql);
}
//更新填空
$ques = $_POST['ques'];
$question = $_POST['question'];
$solution = $_POST['solution'];
if($question=="" || $solution=="") {
    echo "<script>alert('填入不能有空！');</script>";
    echo "<script>history.go(-1);</script>";
}
else{
    $fill_sql = "update fillings set question='$question', solution='$solution' where question='$ques'";
    $fill_result = mysqli_query($conn,$fill_sql);
}
//更新判断
$ques = $_POST['ques'];
$question = $_POST['question'];
$solution = $_POST['solution'];
if($question=="" || $solution=="") {
    echo "<script>alert('填入不能有空！');</script>";
    echo "<script>history.go(-1);</script>";
}
else{
    $jud_sql = "update judges set question='$question', solution='$solution' where question='$ques'";
    $jud_result = mysqli_query($conn,$jud_sql);
}
if($sin_result || $mul_result || $fill_result || $jud_result) {
    echo "<script>alert('更新成功');</script>";
    echo "<script>location.href='delques.php';</script>";
}else{
    echo "<script>alert('更新失败');</script>";
    echo "<script>location.href='delques.php';</script>";
}
?>