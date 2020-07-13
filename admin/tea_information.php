<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title>教师信息</title>
</head>
<body>
    <?php 
        require("top_nav.php");
        require("conn.php");
        //从成绩单grades判断考生是否已考试,从candidates表抽取考生信息
        $res = mysqli_query($conn,"select * from teachers");
        //判断数据库中是否有教师信息
        if(mysqli_num_rows($res)==0) {
            echo "暂无教师名单！";
        }else {
        $tit = array("教师证号", "姓名","职工号", "电话");
        }
    ?>
    <div class="main_del left">
        <table class="gra">
            <tr>
                <?php foreach($tit as $val):?>
                    <th><?= $val?></th>
                <?php endforeach?>
            </tr>
            <?php while($row=mysqli_fetch_assoc($res)):
                        $det = array($row['exam_id'], $row['name'], $row['school_id'], $row['tel']);?>  <!--循环得行-->
            <tr>
                <?php foreach($det as $val):?>
                    <td><?= $val?></td>
                <?php endforeach?>
            </tr>
            <?php endwhile?>
        </table>
        <form action="tea_import.php" method="POST" enctype="multipart/form-data">
                <input type="file" class="file left" name="upFile">
                <input type="submit" class="file" style="height:34px;">
        </form>
                <a href="tea_export.php" class="return">导出名单</a>
    </div>
</body>
</html>