<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title>修改试卷</title>
</head>
<body>
    <?php require("top_nav.php");?>
    <?php require("../insert_test_information.php");?>
    <div class="main left">
        <form action="modify.php" method="POST">
        <div class="box1">
            <div class="name">
                试卷名称：<input type="text" name="name" id="name"><span id="na"><?= $test['title']?></span></div>
            <div class="time">
                考试时间：<input type="text" name="time" id="time"><span id="ti"><?= $test['test_time']?></span><font style="font-weight: 600; font-size:20px">分钟</font></div>
            <p>卷面详情：</p>
        </div>
        <div class="box2">
            <table class="b_in">
                <tr>
                    <th>试卷结构</th><th>题目数量</th><th>单题分数</th><th>合计</th>
                </tr>
                <tr>
                    <th>单项选择</th><td><input type="text" name="sin_sum" id="sin_sum"><span id="s_sum"><?= $test['sin_sum']?></span></td><td><input type="text" name="sin_score" id="sin_score"><span id="s_score"><?= $test['sin_score']?></td><td><span id="sin_all"></span></td>
                </tr>
                <tr>
                    <th>多项选择</th><td><input type="text" name="mul_sum" id="mul_sum"><span id="m_sum"><?= $test['mul_sum']?></span></td><td><input type="text" name="mul_score" id="mul_score"><span id="m_score"><?= $test['mul_score']?></td><td><span id="mul_all"></span></td>
                </tr>
                <tr>
                    <th>填空题</th><td><input type="text" name="fill_sum" id="fill_sum"><span id="f_sum"><?= $test['fill_sum']?></span></td><td><input type="text" name="fill_score" id="fill_score"><span id="f_score"><?= $test['fill_score']?></td><td><span id="fill_all"></span></td>
                </tr>
                <tr>
                    <th>判断题</th><td><input type="text" name="jud_sum" id="jud_sum"><span id="j_sum"><?= $test['jud_sum']?></span></td><td><input type="text" name="jud_score" id="jud_score"><span id="j_score"><?= $test['jud_score']?></td><td><span id="jud_all"></span></td>
                </tr>
                <tr>
                    <th>合计</th><td><span id="sum_all"><span id="s_all"><?= $test['sum_all']?></span></td><td></td><td><span id="score_all" id="score_all"><span id="sc_all"><?= $test['score_all']?></td>
                </tr>
            </table>
            <input type="submit" value="确认修改" class="okey"></td>
        </form>
        </div>
        <a href="test_information.php" class="return" style="top:0px">返回试卷</a>
    </div>
<script src="../js/test.js"></script>
</body>
</html>