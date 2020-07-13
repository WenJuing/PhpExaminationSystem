<?php
header("Content-type:text/HTML;charset=utf8");
$ques = $_POST['ques'];
$solution = $_POST['solution'];
require_once("conn.php");
//这里是查询得到的结果集
$result = mysqli_query($conn,"select * from judges where question='$ques'");
//判断单选表中是否有该题
if(mysqli_num_rows($result)>0) {
    echo "<script>alert('题库中已有该题！');location.href='addques.php';</script>";
}
elseif($ques=="" || $solution=="") {
    echo "<script>alert('填入不能有空！');location.href='addques.php';</script>";
}
else {
    $sql="INSERT INTO judges(question,solution) VALUES('$ques','$solution')";
    //执行插入返回的结果
    $insert_result = mysqli_query($conn,$sql);
        // 判断是否添加成功		 
        if($insert_result){
            echo "<script>alert('添加成功');</script>";
            echo "<script>location.href='addques.php';</script>";
        }else{
            echo "<script>alert('添加失败');</script>";
            echo "<script>location.href='addques.php';</script>";
       }
}