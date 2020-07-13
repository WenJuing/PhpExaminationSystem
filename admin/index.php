<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title></title>
</head>
<body class="index">
    <?php require_once("top_nav.php");?>
    <?php require_once "conn.php";$res=mysqli_query($conn,"select VERSION()");$row=mysqli_fetch_row($res);?>
    <div class="main left">
        <h2>后台首页</h2>
        <div class="hello">
            <span class="title">欢迎访问</span>
            <div class="text">欢迎进入PHP在线考试管理系统后台！请从左侧选择一个操作</div>
        </div>
        <h2>服务器信息</h2>
        <div class="infor">
            <p>系统环境：Apache/2.4.39 （<?= PHP_OS?>） PHP/<?= PHP_VERSION?></p>
            <p>服务器时间：<?php echo date("Y-m-d H:i:s");?></p>
            <p>MYSQL版本：<?= $row[0]?></p>
            <p>文件上传限制：<?= ini_get('upload_max_filesize');?></p>
        </div>
    </div>
</body>
</html>