<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_cj8w4baxov.js"></script>
    <title>PHP在线考试网</title>
</head>
<body class="index" οncοntextmenu="return false">
    <div class="top">
        <svg class="icon index-php left" aria-hidden="true">
            <use xlink:href="#icon-php"></use>
        </svg>
        <div class="title left">PHP全国在线考试</div>
    </div>
    <div class="main">
        <h2>>考生须知<</h2>
        <div class="notice">
            <p>1、考试前请考生核查身份信息确认无误</p>
            <p>2、考生应携本人准考证和有效身份证件参加考试</p>
            <p>3、考试提前5分钟在考试系统中输入自己的准考证号</p>
            <p>4、在系统故障、死机、死循环、供电故障等特殊情况时，考生举手由监考人员判断原因。如属于考生误操作造成，后果由考生自负。</p>
            <p>php考核内容如下：</p>
        </div>
        <div class="detail">
            <?php require("insert_test_information.php");?>
            <table>
                <tr><th>试卷结构</th><th>题目数量</th><th>分值比例</th><th>单题分数</th><th>考试时间</th><th>评分判定</th><th>评级</th></tr>
                <tr><th>单项选择</th><td><?= $test['sin_sum']?>分</td><td><?= $sin_percent?>%</td><td><?= $test['sin_score']?>分</td><td rowspan="4"><?= $test['test_time']?>分钟</td><td>90-100</td><td>优秀</td></tr>
                <tr><th>多项选择</th><td><?= $test['mul_sum']?>分</td><td><?= $mul_percent?>%</td><td><?= $test['mul_score']?>分</td><td>80-89</td><td>良好</td></tr>
                <tr><th>填空题</th><td><?= $test['fill_sum']?>分</td><td><?= $fill_percent?>%</td><td><?= $test['fill_score']?>分</td><td>60-79</td><td>及格</td></tr>
                <tr><th>判断题</th><td><?= $test['jud_sum']?>分</td><td><?= $jud_percent?>%</td><td><?= $test['jud_score']?>分</td><td>1-59</td><td>不及格</td></tr>
                <tr><th></th><td></td><td></td><td></td><td></td><td>0</td><td>消极应试</td></tr>
            </table>
            <div class="remark">温馨提示：考生最终成绩以成绩单为准，本次考试评分为消极应试将影响学校绩点，请积极对待本次考试。</div>
        </div>
    </div>
    <div class="four" style="display: flex;margin-left:11%">
    <a href="#"><div class="box">
        <div class="box-header1">
            <svg class="icon index-icon" aria-hidden="true">
                <use xlink:href="#icon-gerenxinxi"></use>
            </svg>
        </div>
        <span>考生信息</span>
    </div></a>
    <a href="login.html"><div class="box">
        <div class="box-header2">
            <svg class="icon index-icon" aria-hidden="true">
                <use xlink:href="#icon-kaoshi"></use>
            </svg>
        </div>
        <span>进入考试</span>
    </div></a>
    <a href="#"><div class="box">
        <div class="box-header3">
            <svg class="icon index-icon" aria-hidden="true">
                <use xlink:href="#icon-zhengshu_zizhi"></use>
            </svg>
        </div>
        <span>证书评级</span>
    </div></a>
    <a href="#"><div class="box">
        <div class="box-header4">
            <svg class="icon index-icon" aria-hidden="true">
                <use xlink:href="#icon-bangzhu"></use>
            </svg>
        </div>
        <span>常见问题</span>
    </div></a>
    </div> 
    <div class="bottom">
        <div class="bottom-content">
            <br />
            <div class="other">主办单位：教育部考试中心</div>
            <div class="other left">版权所有：教育部考试中心</div>
            <div class="other left" style="margin-left: 30px;">京公网安备 11040202430017号</div>
            <div class="other left" style="margin-left: 50px;">
            <svg class="icon index-gongan" aria-hidden="true">
                <use xlink:href="#icon-zhihuigongan"></use>
            </svg> 京ICP备05064772号</div>
        </div>
        <div class="declaration center"><a href="admin/login.html" class="declar">Copyright &copy; 文君wenjuing</a></div>
    </div>
</body>
</html>
