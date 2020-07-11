<?php
SESSION_start();
header('Content-type:text/html;charset=utf-8');
$examid = $_POST['examid'];
$password = $_POST['password'];
//连接数据库
require_once('conn.php');
$result = mysqli_query($conn,"select * from candidates where exam_id = '$examid' and password = '$password'");
if(mysqli_num_rows($result)==0){
    echo "<script>alert('准考证号或者密码输入错误，请重新输入！');</script>";
    echo "<script>location.href='login.html';</script>";
}else{
    //判断是否已经考试过了
    $result = mysqli_query($conn,"select * from grades where stu_examid= '$examid'");
    if(mysqli_num_rows($result)>0){
        echo "<script>alert('您已经考过试了！')</script>";
        echo "<script>location.href='index.php';</script>";
    }
    else{
        $_SESSION['examid'] = $examid;
        header('Location:test.php');
    }
}