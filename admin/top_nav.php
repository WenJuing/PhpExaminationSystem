<?php
session_start();
require_once("conn.php");
echo '<div class="top">
        <a href="index.php"><span class="title left">
        <svg class="icon top_php" aria-hidden="true">
            <use xlink:href="#icon-php"></use>
        </svg>&nbsp;PHP在线考试系统</span></a>';
if(isset($_SESSION['examid'])) {
    $examid= $_SESSION['examid']; //获取管理员证号
    $rel = mysqli_query($conn,"select * from teachers where exam_id='$examid'");
    $row = mysqli_fetch_assoc($rel);
    echo "<span class='hello left'>
    <svg class='icon top_member' aria-hidden='true'>
            <use xlink:href='#icon-member'></use>
        </svg> 你好:&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</span>";
    echo "<a href='logout.php'><span class='logout left'>注销</span></a>";
} else {
    echo "<script>alert('请先登录！');location.href='login.html'</script>";
}
        
echo  '</div>
      <div class="nav left">
      <ul>
          <li class="header">管理导航</li>
          <a href="tea_information.php"><li class="o">教师信息</li></a>
          <a href="stu_information.php"><li class="o">考生名单</li></a>
          <a href="stu_grades.php"><li class="o">考生成绩</li></a>
          <a href="test_information.php"><li class="o">考卷详情</li></a>
          <a href="test_modify.php"><li class="o">修改试卷</li></a>
          <a href="addques.php"><li class="o">录入考题</li></a>
          <a href="delques.php"><li class="o">删改考题</li></a>
      </ul>
      </div>';
?>