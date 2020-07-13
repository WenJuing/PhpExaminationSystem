<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css" />
    <script src="js/user.js" type="text/javascript"></script>
    <title></title>
</head>
<body>
    <div class="header_2 center">
        <h1>考生信息确认</h1>
    </div>
    <div class="main_2 center">
        <?php
            $examid = $_POST['examid'];
            $password = $_POST['password'];
            include "conn.php";
            $res = mysqli_query($conn,"select * from candidates where exam_id='$examid'");
            $row = mysqli_fetch_assoc($res);
        ?>
        <form action="check.php" method="POST">
            <table class="login_2">
                <tr>
                    <th>考生姓名：</th>
                    <td><font color='dimgray' size='5'><?= $row['name']?></font></td>
                </tr>
                <tr>
                    <th>准考证号：</th>
                    <td><input type="text" name="examid" style="display: none" id="in_1"><font color='dimgray' size='5'><span id="examid"><?= $examid?></span></font></td>
                </tr>
                <tr>
                    <th>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
                    <td><input type="text" name="password" style="display: none" id="in_2"><font color='dimgray' size='5'><span id="password"><?= $password?></span></font></td>
                </tr>
                <tr class="three">
                    <td><a href="login.html"><div class="button_2">重新输入</div></a></td>
                    <td><input type="submit" class="button_2" value="进入考试"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>