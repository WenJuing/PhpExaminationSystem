<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title>考生成绩</title>
</head>
<body>
    <?php 
        require("top_nav.php");
        require("conn.php");
        //从成绩单grades抽取考生成绩,从candidates表抽取考生信息
        $res = mysqli_query($conn,"select * from grades, candidates where stu_examid = exam_id");
        //判断数据库中是否有考生作答
        if(mysqli_num_rows($res)==0) {
            echo "暂未考生答卷！";
        }else {
        $tit = array("学号", "单项选择", "多项选择", "填空题", "判断题", "总分", "评级");
        }
    ?>
    <div class="main left">
        <table class="gra">
            <tr>
                <?php foreach($tit as $val):?>
                    <th><?= $val?></th>
                <?php endforeach?>
            </tr>
            <?php while($row=mysqli_fetch_assoc($res)):
                        $det = array($row['school_id'], 
                        $row['sin'], $row['mul'], $row['fill'], $row['jud'], $row['grade'], $row['rate']);?>  <!--循环得行-->
            <tr>
                <?php foreach($det as $val):?>
                    <td><?= $val?></td>
                <?php endforeach?>
            </tr>
            <?php endwhile?>
        </table>
    </div>
</body>
</html>