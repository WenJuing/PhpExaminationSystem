<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title></title>
</head>
<body class="outcome">
    <div class="top">
    <?php
        session_start();
        //判断是否已经登录
        if(isset($_SESSION['examid'])) {
        $examid = $_SESSION['examid'];
        require_once("conn.php");
        //获取考生资料和成绩
        $result = mysqli_query($conn,"select * from candidates ,grades where exam_id=stu_examid and exam_id = $examid");
        $row = mysqli_fetch_assoc($result);
        }else {
            echo "<script>alert('请先登录！');location.href='login.html';</script>";
        }
    ?>
        <div class="title">2020年下半年全国PHP等级考试成绩单</div>
        <div class="stu">
            <ul>
                <li>姓名：<?= $row['name']?></li>
                <li>院系：<?= $row['institute']?></li>
            </ul>
        </div>
        <div class="title_2">机试成绩</div>
    </div>
    <div class="mid">
        <ul>
            <li>准考证号：<?= $row['exam_id']?></li>
            <li>总&nbsp;&nbsp;&nbsp;&nbsp;分：<span><?= $row['grade']?></span></li>
            <li>评&nbsp;&nbsp;&nbsp;&nbsp;级：<?= $row['rate']?></li>
        </ul>
    </div>
    <div class="grade">
        <ul>
            <li>单项选择：<span><?= $row['sin']?></span></li>
            <li>多项选择：<span><?= $row['mul']?></span></li>
            <li>填&nbsp;&nbsp;&nbsp;&nbsp;空：<span><?= $row['fill']?></span></li>
            <li>判&nbsp;&nbsp;&nbsp;&nbsp;断：<span><?= $row['jud']?></span></li>
        </ul>
    </div>
    <div class="bottom">成绩报告单号：1202343523425</div>
    <?php session_unset();session_unset();?>
    <a href="index.php"><div class="my center">返回首页</div></a>
</body>
</html>