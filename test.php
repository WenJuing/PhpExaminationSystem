<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title></title>
</head>
<body class="test">
    <div class="top">
        <?php
            header('Content-type:text/html,charset=uft8');
            session_start();
            //获取题目数量信息
            require_once("insert_test_information.php");
            //判断是否已经登录
            if(isset($_SESSION['examid'])) {
            $examid = $_POST['examid'];
            $password = $_POST['password'];
            require_once('conn.php');
            //从题库中随机单选题********************************************************************************
            $ques_num = $test['sin_sum'];     //设置题目数量
            $result = mysqli_query($conn,"select * from single_choices order by rand() limit $ques_num");
            //从题库中随机抽多选题*********************************************************************************
            $ques_num_mul = $test['mul_sum'];     //设置题目数量
            $result_mul = mysqli_query($conn,"select * from multiple_choices order by rand() limit $ques_num_mul");
            //从题库中随机抽填空题*********************************************************************************
            $ques_num_fill = $test['fill_sum'];     //设置题目数量
            $result_fill = mysqli_query($conn,"select * from fillings order by rand() limit $ques_num_fill");
            //从题库中随机抽判断题*********************************************************************************
            $ques_num_jud = $test['jud_sum'];     //设置题目数量
            $result_jud = mysqli_query($conn,"select * from judges order by rand() limit $ques_num_jud");
        ?>
        <ul>
            <li class="title"><?= $test['title']?></li>
            <span class="sum_all">[ 总题量:<span id="sum_all"><?= $test['sum_all']?></span></span>
            <span class="score_all">总分:<?= $test['score_all']?> ]</span>
            <li class="examid"><?= $examid?></li>
            <li class="hand">
                <svg class="icon test-hand" aria-hidden="true">
                    <use xlink:href="#icon-jushou"></use>
                </svg>&nbsp;&nbsp;举手</li>
            <li class="time"><img src="img/clock.jpg">&nbsp;&nbsp;&nbsp;<span id="timer" class="time"><span id='ti'><?= $test['test_time']?></span></span></li>
        </ul>     
    </div>
    <div class="nav left">
        <div class="sin">
            <div class="title">单项选择题<span id="fff" style="display:none"></span></div>
            <div class="section">
                <div class="abox">
                    <?php
                        for($count=0;$count<$ques_num;$count++) {
                            // 输出个数达到7个则换行
                            if($count%7 == 0) {
                                echo "<br />";
                            }
                    ?>
                            <a href="test.php#<?= $count+1?>" class="left" id="a<?= $count+1?>"><?= $count+1?></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="mul">
            <div class="title">多项选择题</div>
            <div class="section">
            <div class="abox">
                    <?php
                        for($i=0;$i<$ques_num_mul;$i++) {
                            $count++;
                            // 输出个数达到7个则换行
                            if($i%7 == 0) {
                                echo "<br />";
                            }
                    ?>
                            <a href="test.php#<?= $count?>" class="left" id="a<?= $count?>"><?= $count?></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="fill">
            <div class="title">填空题</div>
            <div class="section">
            <div class="abox">
                    <?php
                        for($i=0;$i<$ques_num_fill;$i++) {
                            $count++;
                            // 输出个数达到7个则换行
                            if($i%7 == 0) {
                                echo "<br />";
                            }
                    ?>
                            <a href="test.php#<?= $count?>" class="left" id="a<?= $count?>"><?= $count?></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="jud">
            <div class="title">判断题</div>
            <div class="section">
            <div class="abox">
                    <?php
                        for($i=0;$i<$ques_num_jud;$i++) {
                            $count++;
                            // 输出个数达到7个则换行
                            if($i%7 == 0) {
                                echo "<br />";
                            }
                    ?>
                            <a href="test.php#<?= $count?>" class="left" id="a<?= $count?>"><?= $count?></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bar">
        <div class="pace" id="pace">
        <span id="now_num">0</span>/<?= $test['sum_all']?>
        </div>
    </div>
    <div class="main" onclick="barPace()">
        <form action="check_test.php" method="post" onsubmit="return validateForm()">
            <h3>一、单项选择题（共<span id="sin_sum"><?= $test['sin_sum']?></span>题，每题<?= $test['sin_score']?>分）</h3>
        <?php
            $count_q = 0;
            while($row = mysqli_fetch_assoc($result)):
                $count_q++;
        ?>
        <a class="target-fix" name="<?= $count_q?>"></a>
            <div class="ques">
                <div class="question"><br><?= $count_q?>、<?= $row['question']?>？</div>
                <div class="a" style="display:none"><input type="radio" name="<?= $count_q+100?>" value="<?= $row['solution']?>" checked="checked"></div>
                <label for="A<?= $count_q?>"><div class="a"><input type="radio" onclick="varyCss()" name="<?= $count_q?>" value="<?= $row['A']?>" id="A<?= $count_q?>" />A、 <?= $row['A']?></label></div>
                <label for="B<?= $count_q?>"><div class="b"><input type="radio" onclick="varyCss()" name="<?= $count_q?>" value="<?= $row['B']?>" id="B<?= $count_q?>" />B、 <?= $row['B']?></label></div>
                <label for="C<?= $count_q?>"><div class="c"><input type="radio" onclick="varyCss()" name="<?= $count_q?>" value="<?= $row['C']?>" id="C<?= $count_q?>" />C、 <?= $row['C']?></label></div>
                <label for="D<?= $count_q?>"><div class="d"><input type="radio" onclick="varyCss()" name="<?= $count_q?>" value="<?= $row['D']?>" id="D<?= $count_q?>" />D、 <?= $row['D']?></label></div>
            </div>
        <?php endwhile?>
            <h3>二、多项选择题（共<span id="mul_sum"><?= $test['mul_sum']?></span>题，每题<?= $test['mul_score']?>分）</h3>
        <?php
            while($row = mysqli_fetch_assoc($result_mul)):
                $count_q++;
        ?>
        <a class="target-fix" name="<?= $count_q?>"></a>
            <div class="ques">
                <div class="question"><br><?= $count_q?>、<?= $row['question']?>？</div>
                <div class="a" style="display:none"><input type="radio" name="<?= $count_q+100?>" value="<?= $row['solution']?>" checked="checked"></div>
                <label for="A<?= $count_q?>"><div class="a"><input type="checkbox" onclick="varyCssMul()" name="<?= $count_q?>[]" value="<?= $row['A']?>" id="A<?= $count_q?>" />A、 <?= $row['A']?></label></div>
                <label for="B<?= $count_q?>"><div class="b"><input type="checkbox" onclick="varyCssMul()" name="<?= $count_q?>[]" value="<?= $row['B']?>" id="B<?= $count_q?>" />B、 <?= $row['B']?></label></div>
                <label for="C<?= $count_q?>"><div class="c"><input type="checkbox" onclick="varyCssMul()" name="<?= $count_q?>[]" value="<?= $row['C']?>" id="C<?= $count_q?>" />C、 <?= $row['C']?></label></div>
                <label for="D<?= $count_q?>"><div class="d"><input type="checkbox" onclick="varyCssMul()" name="<?= $count_q?>[]" value="<?= $row['D']?>" id="D<?= $count_q?>" />D、 <?= $row['D']?></label></div>
            </div>
        <?php endwhile?>
        <h3>三、填空题（共<?= $test['fill_sum']?>题，每题<?= $test['fill_score']?>分）</h3><span style="color: gray;">（注：若一题有多个题空，请使用逗号、空格、小数点等分割符进行区分）</span>
        <?php
            while($row = mysqli_fetch_assoc($result_fill)):
                $count_q++;
        ?>
        <a class="target-fix" name="<?= $count_q?>"></a>
            <div class="ques" onclick="varyCssFill()">
            <label for="A<?= $count_q?>"><div class="question_fill"><br><?= $count_q?>、<?= $row['question']?>。</div></label>
            <br />
            <div class="a_input">你的回答：<input type="text" name="<?= $count_q?>" class="fill_box" id="<?= $count_q?>" /></div>
                <div class="a" style="display:none"><input type="radio" name="<?= $count_q+100?>" value="<?= $row['solution']?>" checked="checked"></div>
            </div>
        <?php endwhile?>
                <h3>四、判断题（共<?= $test['jud_sum']?>题，每题<?= $test['jud_score']?>分）</h3>
        <?php
            while($row = mysqli_fetch_assoc($result_jud)):
                $count_q++;
        ?>
        <a class="target-fix" name="<?= $count_q?>"></a>
            <div class="ques">
            <div class="question"><br><?= $count_q?>、<?= $row['question']?>。</div>
                <div class="a" style="display:none"><input type="radio" name="<?= $count_q+100?>" value="<?= $row['solution']?>" checked="checked"></div>
                <label for="A<?= $count_q?>"><div class="a"><input type="radio"  onclick="varyCss()" name="<?= $count_q?>" value="对" id="A<?= $count_q?>" />对</label></div>
                <label for="B<?= $count_q?>"><div class="b"><input type="radio"  onclick="varyCss()" name="<?= $count_q?>" value="错" id="B<?= $count_q?>" />错</label></div>
        <?php
                endwhile;
            }else{
                echo "<script>alert('这是考试界面，请先登录！');location.href='login.html';</script>";
            }
        ?>
            <div class="submit"><input type="submit" value="交卷" id="sub"></div>
        </form>
    </div>
    <script src="js/function.js"></script>
    <script src="//at.alicdn.com/t/font_1905047_8uj9y308zwx.js"></script>
</body>
</html>
