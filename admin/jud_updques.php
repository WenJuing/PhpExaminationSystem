<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title>修改判断题</title>
    <style>
        .ok {
            margin-top: 50px;
        }
        .ori {
            margin-top: 150px !important;
        }
    </style>
</head>
<body class="upd">
    <?php require_once("top_nav.php")?>
    <div class="main left">
        <div class="sin left">
            <h2>修改填空题</h2>
            <div class="sin_in">
                <form action="upd_check.php" method="post">
                    <table>
                    <?php
                    require_once "conn.php";
                    $ques = $_GET['jud_id'];
                    $jud_sql = "select * from judges where question='$ques'";
                    $jud_res = mysqli_query($conn,$jud_sql);
                    $row = mysqli_fetch_assoc($jud_res);
                    ?>
                        <tr style="display: none;">
                            <td>隐藏原题目：</td><td><textarea name="ques" rows="4"><?= $ques?></textarea></td>
                        </tr>
                        <tr>
                            <td>新题目：</td><td><textarea name="question" rows="4" id="1"></textarea></td>
                        </tr>
                        <tr>
                            <td>新正确答案：</td><td><input type="text" name="solution" id="2"></td>
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
                    <td>原题目：</td><td><?= $row['question']?></td>
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