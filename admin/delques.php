<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <script src="../js/function.js"></script>
    <title>删除试题</title>
</head>
<body>
    <?php 
        require("top_nav.php");
        require("conn.php");
        //从single_choices,multiple_choices,fillings,judges表中抽取题目信息
        $sin_res = mysqli_query($conn,"select * from single_choices");
        $mul_res = mysqli_query($conn,"select * from multiple_choices");
        $fill_res = mysqli_query($conn,"select * from fillings");
        $jud_res = mysqli_query($conn,"select * from judges");
        //标题
        $sin_title = array("问题","选项A","选项B","选项C","选项D","正确答案","操作");
        $mul_title = array("问题","选项A","选项B","选项C","选项D","正确答案","操作");
        $fill_title = array("问题","正确答案","操作");
        $jud_title = array("问题","正确答案","操作");
    ?>
    <div class="main_del">
        <table class="gra">
            <tr>
                <td colspan="3" class="fix_nav">快速导航</td>
                <td class="fix_sin"><a href="#sin_section">单选</a></td>
                <td class="fix_mul"><a href="#mul_section">多选</a></td>
                <td class="fix_fill"><a href="#fill_section">填空</a></td>
                <td class="fix_jud"><a href="#jud_section">判断</a></td>
            </tr>
            <tr>
        <a class="target-fix" name="sin_section"></a>
                    <th width="70%" colspan="7">单项选择题</th>
            </tr>
            <tr>
                <?php foreach($sin_title as $val):?>
                    <th><?= $val?></th>
                <?php endforeach?>
            </tr>
            <?php while($row=mysqli_fetch_assoc($sin_res)):
                        $sin_det = array($row['question'], $row['A'], $row['B'], $row['C'], $row['D'], $row['solution']);?>  <!--循环得行-->
            <tr>
                <?php foreach($sin_det as $val):?>
                    <td><?= $val?></td>
                <?php endforeach?>
                <td><a href="sin_updques.php?sin_id=<?= $row['question']?>">修改</a>
                    <a href="del_check.php?sin_id=<?= $row['question']?>" onclick="return validateDel();">删除</a>
                </td>
            </tr>
            <?php endwhile?>
            <table class="gra">
            <tr>
        <a class="target-fix" name="mul_section"></a>
                    <th width="70%" colspan="7" style="background-color: #25CCF7;">多项选择题</th>
            </tr>
            <tr>
                <?php foreach($mul_title as $val):?>
                    <th><?= $val?></th>
                <?php endforeach?>
            </tr>
            <?php while($row=mysqli_fetch_assoc($mul_res)):
                        $mul_det = array($row['question'], $row['A'], $row['B'], $row['C'], $row['D'], $row['solution']);?>  <!--循环得行-->
            <tr>
                <?php foreach($mul_det as $val):?>
                    <td><?= $val?></td>
                <?php endforeach?>
                <td><a href="mul_updques.php?mul_id=<?= $row['question']?>">修改</a>
                    <a href="del_check.php?mul_id=<?= $row['question']?>" onclick="return validateDel();">删除</a>
                </td>
            </tr>
            <?php endwhile?>
            </table>
            <table class="gra">
            <tr>
        <a class="target-fix" name="fill_section"></a>
                    <th width="70%" colspan="3" style="background-color: #D6A2E8;">填空题</th>
            </tr>
            <tr>
                <?php foreach($fill_title as $val):?>
                    <th><?= $val?></th>
                <?php endforeach?>
            </tr>
            <?php while($row=mysqli_fetch_assoc($fill_res)):
                        $fill_det = array($row['question'], $row['solution']);?>  <!--循环得行-->
            <tr>
                <?php foreach($fill_det as $val):?>
                    <td><?= $val?></td>
                <?php endforeach?>
                <td><a href="fill_updques.php?fill_id=<?= $row['question']?>">修改</a>
                    <a href="del_check.php?fill_id=<?= $row['question']?>" onclick="return validateDel();">删除</a>
                </td>
            </tr>
            <?php endwhile?>
            </table>
            <table class="gra">
            <tr>
        <a class="target-fix" name="jud_section"></a>
                    <th width="70%" colspan="3" style="background-color: #FEA47F;">判断题</th>
            </tr>
            <tr>
                <?php foreach($jud_title as $val):?>
                    <th><?= $val?></th>
                <?php endforeach?>
            </tr>
            <?php while($row=mysqli_fetch_assoc($jud_res)):
                        $jud_det = array($row['question'], $row['solution']);?>  <!--循环得行-->
            <tr>
                <?php foreach($jud_det as $val):?>
                    <td><?= $val?></td>
                <?php endforeach?>
                <td><a href="jud_updques.php?jud_id=<?= $row['question']?>">修改</a>
                    <a href="del_check.php?jud_id=<?= $row['question']?>" onclick="return validateDel();">删除</a>
                </td>
            </tr>
            <?php endwhile?>
        </table>
    </div>
</body>
</html>