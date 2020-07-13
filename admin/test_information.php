<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title>试卷详情</title>
</head>
<body>
    <?php require_once("top_nav.php");?>
    <?php require_once("../insert_test_information.php");?>
    <div class="main left">
        <div class="box1">
            <div class="name">试卷名称：<?= $test['title']?></div>
            <div class="time">考试时间：<?= $test['test_time']?>分钟</div>
            <p>卷面详情：</p>
        </div>
        <div class="box2">
            <table class="b_in">
                <tr>
                    <th>试卷结构</th><th>题目数量</th><th>单题分数</th><th>合计</th>
                </tr>
                <tr>
                    <th>单项选择</th><td><?= $test['sin_sum']?></td><td><?= $test['sin_score']?></td><td><?= $sin_all?></td>
                </tr>
                <tr>
                    <th>多项选择</th><td><?= $test['mul_sum']?></td><td><?= $test['mul_score']?></td><td><?= $mul_all?></td>
                </tr>
                <tr>
                    <th>填空题</th><td><?= $test['fill_sum']?></td><td><?= $test['fill_score']?></td><td><?= $fill_all?></td>
                </tr>
                <tr>
                    <th>判断题</th><td><?= $test['jud_sum']?></td><td><?= $test['jud_score']?></td><td><?= $jud_all?></td>
                </tr>
                <tr>
                    <th>合计</th><td><?= $test['sum_all']?></td><td></td><td><?= $test['score_all']?></td>
                </tr>
            </table>
        </div>
        <a href="test_modify.php" class="return" style="top:0px">修改试卷</a>
    </div>
</body>
</html>