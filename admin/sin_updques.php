<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title>修改考题</title>
</head>
<body class="upd">
    <?php require_once("top_nav.php")?>
    <div class="main left">
        <div class="sin left">
            <h2>修改单项选择题</h2>
            <div class="sin_in">
                <form action="upd_check.php" method="post">
                <?php
                    require_once "conn.php";
                    $ques = $_GET['sin_id'];
                    $sin_sql = "select * from single_choices where question='$ques'";
                    $sin_res = mysqli_query($conn,$sin_sql);
                    $row = mysqli_fetch_assoc($sin_res);
                ?>
                    <table>
                        <tr style="display: none;">
                            <td>隐藏原题目：</td><td><textarea name="ques" rows="4"><?= $ques?></textarea></td>
                        </tr>
                        <tr>
                            <td>新题目：</td><td><textarea name="question" rows="4" id="1"></textarea></td>
                        </tr>
                        <tr>
                            <td>新选项A：</td><td><input type="text" name="a" id="2"></td>
                        </tr>
                        <tr>
                            <td>新选项B：</td><td><input type="text" name="b" id="3"></td>
                        </tr>
                        <tr>
                            <td>新选项C：</td><td><input type="text" name="c" id="4"></td>
                        </tr>
                        <tr>
                            <td>新选项D：</td><td><input type="text" name="d" id="5"></td>
                        </tr>
                        <tr>
                            <td>新正确答案：</td><td><input type="text" name="solution" id="6"></td>
                        </tr>
                        <tr>
                            <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="修改" class="ok"></td>
                        </tr>
                    </table>
                </form>
            <table class="ori" id="tb_table" style="display: none;">
                <tr></tr>
                <tr>
                    <td>原题目：</td><td><?= htmlspecialchars($row['question'])?></td>
                </tr>
                <tr>
                    <td>原选项A：</td><td><?= htmlspecialchars_decode($row['A'])?></td>
                </tr>
                <tr>
                    <td>原选项B：</td><td><?= $row['B']?></td>
                </tr>
                <tr>
                    <td>原选项C：</td><td><?= $row['C']?></td>
                </tr>
                <tr>
                    <td>原选项D：</td><td><?= $row['D']?></td>
                </tr>
                <tr>
                    <td>原正确答案：</td><td><?= $row['solution']?></td>
                </tr>
            </table>
            <script>
                var table = document.getElementById("tb_table");
                var rows = table.rows;//获取所有行
                for(var i=1; i < rows.length; i++){
                    var row = rows[i];//获取每一行
                    var id = row.cells[1].innerHTML;//获取具体单元格
                    document.getElementById(i).value = id;
                }
            </script>
            </div>
        </div>
        <a href="delques.php" class="return">返回</a>
    </div>

</body>
</html>