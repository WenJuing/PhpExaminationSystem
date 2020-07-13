<?php
SESSION_start();
header('Content-type:text/html;charset=utf-8');
$examid = $_POST['2'];
$password = $_POST['3'];
//连接数据库
require_once('conn.php');
$result = mysqli_query($conn,"select * from teachers where exam_id = '$examid' and password = '$password'");
if(mysqli_num_rows($result)==0){
    echo "<script>alert('教师证号或者密码输入错误，请重新输入！');</script>";
    echo "<script>location.href='login.html';</script>";
}else{
    $_SESSION['examid'] = $examid;
    header('Location:index.php');
}
?>