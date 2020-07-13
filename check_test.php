<?php
header('Content-type:text/html;charset=utf8;');
session_start();
$examid = $_SESSION['examid'];
require_once('insert_test_information.php');
require_once('conn.php');

    //设置*****单选题*****初始总数为0******************************
    $score_sin = 0;
    $count_q = 0;
//根据每道题的名字获取值
for($i=0; $i<$test['sin_sum']; $i++) {
     $count_q++;
    //获取答案
    $solution = $_POST[$count_q+100];
    //获取被选中值
    $checked = $_POST["$count_q"];
    //判断被选中值与答案是否相等，相等加2分，否则加0分
    if($solution == $checked) {
        $score_sin += $test['sin_score'];
    }
}
    // 获得总的单选题分数$score_sin;

    //设置*****多选题*****初始总数为0**********************************
    $score_mul = 0;
//根据每道题的名字获取值
for($i=0; $i<$test['mul_sum']; $i++) {
    $count_q++;
    //获取答案
    $solution = $_POST[$count_q+100];
    //获取被选中值
    if($_POST["$count_q"]!="") {
        $checked = $_POST["$count_q"];
    //将选中的多个值整合成字符串
    $checked_str = implode("|",$checked);
    //判断被选中值与答案是否相等，相等加2分，否则加0分
    if($solution == $checked_str) {
        $score_mul += $test['mul_score'];
        }
    }
}
    // 获得总的多选题分数$score_mul;

    //设置*****填空题*****初始总数为0**********************************
    $score_fill = 0;
//根据每道题的名字获取值
for($i=0; $i<$test['fill_sum']; $i++) {
    $count_q++;
    //获取答案
    $solution = $_POST[$count_q+100];
    //获取被选中值
    if($_POST["$count_q"]!="") {
        $checked = $_POST["$count_q"];
        //把分割符统一转换成英文逗号
        $checked = preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)|(\.)/",',',$checked);
        //把答案按逗号分割成数组
        $arr = explode("," ,$checked);
    //把数组整合成字符串
    $checked_str = implode("|",$arr);
    //判断被选中值与答案是否相等，相等加2分，否则加0分
    if($solution == $checked_str) {
        $score_fill += $test['fill_score'];
        }
    }
}
    // 获得总的填空题分数$score_fill;

    //设置*****判断题*****初始总数为0**********************************
    $score_jud = 0;
//根据每道题的名字获取值
for($i=0; $i<$test['jud_sum']; $i++) {
    $count_q++;
    //获取答案
    $solution = $_POST[$count_q+100];
    //获取被选中值
    if($_POST["$count_q"]!="") {
        $checked = $_POST["$count_q"];
    //判断被选中值与答案是否相等，相等加2分，否则加0分
    if($solution == $checked) {
        $score_jud += $test['jud_score'];
        }
    }
}
    // 获得总的判断题分数$score_jud;
    //获得总分
    $score = $score_sin + $score_mul + $score_fill + $score_jud;
    //判断评分等级
    if($score==0) {
        $rate = "消极应试";
    }elseif($score<60) {
        $rate = "不及格";
    }elseif($score<80) {
        $rate = "及格";
    }elseif($score<90) {
        $rate = "良好";
    }else {
        $rate = "优秀";
    }
//向数据库载入成绩
$sql = "insert into grades (stu_examid,sin,mul,fill,jud,grade,rate) values ('$examid',$score_sin,'$score_mul','$score_fill','$score_jud','$score','$rate')";
mysqli_query($conn,$sql);
header('Location:outcome.php');
?>