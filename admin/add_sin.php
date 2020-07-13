<?php
header("Content-type:text/HTML;charset=utf8");
$ques = $_POST['ques'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$solution = $_POST['solution'];
require_once("conn.php");
//这里是查询得到的结果集
$result = mysqli_query($conn,"select * from single_choices where question='$ques'");
//判断单选表中是否有该题
if(mysqli_num_rows($result)>0) {
    echo "<script>alert('题库中已有该题！');location.href='addques.php';</script>";
}
elseif($ques=="" || $solution=="" || $a=="" || $b=="" || $c=="" || $d=="") {
    echo "<script>alert('填入不能有空！');location.href='addques.php';</script>";
}
else {
    $sql="INSERT INTO single_choices(question,A,B,C,D,solution) VALUES('$ques','$a','$b','$c','$d','$solution')";
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
