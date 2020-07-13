<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="//at.alicdn.com/t/font_1905047_a446u5va27v.js"></script>
    <title></title>
</head>
<body>
    <?php require_once("top_nav.php")?>
    <div class="main left">
        <div class="sin left">
            <h2>录入单项选择题</h2>
            <div class="sin_in">
                <form action="add_sin.php" method="post">
                    <table>
                        <tr>
                            <td>题目：</td><td><textarea name="ques" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>选项A：</td><td><input type="text" name="a"></td>
                        </tr>
                        <tr>
                            <td>选项B：</td><td><input type="text" name="b"></td>
                        </tr>
                        <tr>
                            <td>选项C：</td><td><input type="text" name="c"></td>
                        </tr>
                        <tr>
                            <td>选项D：</td><td><input type="text" name="d"></td>
                        </tr>
                        <tr>
                            <td>正确答案：</td><td><input type="text" name="solution"></td>
                        </tr>
                        <tr>
                            <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="录入" class="ok"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="mul left">
            <h2>录入多项选择题</h2>
            <div class="mul_in">
                <form action="add_mul.php" method="post">
                    <table>
                        <tr>
                            <td>题目：</td><td><textarea name="ques" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>选项A：</td><td><input type="text" name="a"></td>
                        </tr>
                        <tr>
                            <td>选项B：</td><td><input type="text" name="b"></td>
                        </tr>
                        <tr>
                            <td>选项C：</td><td><input type="text" name="c"></td>
                        </tr>
                        <tr>
                            <td>选项D：</td><td><input type="text" name="d"></td>
                        </tr>
                        <tr>
                            <td>正确答案：</td><td><input type="text" name="solution"></td>
                        </tr>
                        <tr>
                            <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="录入" class="ok"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="fill left">
            <h2>录入填空题</h2>
            <div class="fill_in">
                <form action="add_fill.php" method="post">
                    <table>
                        <tr>
                            <td>题目：</td><td><textarea name="ques" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>正确答案：</td><td><input type="text" name="solution"></td>
                        </tr>
                        <tr>
                            <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="录入" class="ok"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="jud left">
            <h2>录入判断题</h2>
            <div class="jud_in">
                <form action="add_jud.php" method="post">
                    <table>
                        <tr>
                            <td>题目：</td><td><textarea name="ques" rows="4"></textarea></>
                        </tr>
                        <tr>
                            <td>正确答案：</td><td><input type="text" name="solution"></td>
                        </tr>
                        <tr>
                            <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="录入" class="ok"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <a href="#" class="return">返回试卷</a>
    </div>
</body>
</html>