<?php
require("conn.php");
//从试卷paper表中拿取试卷信息
$res = mysqli_query($conn,"SELECT * FROM `paper`");
$test = mysqli_fetch_assoc($res);
$sin_percent = ($test['sin_sum'] * $test['sin_score'] / $test['score_all']) * 100;
$mul_percent = ($test['mul_sum'] * $test['mul_score'] / $test['score_all']) * 100;
$fill_percent = ($test['fill_sum'] * $test['fill_score'] / $test['score_all']) * 100;
$jud_percent = ($test['jud_sum'] * $test['jud_score'] / $test['score_all']) * 100;
$sin_all = $test['sin_sum'] * $test['sin_score'];
$mul_all = $test['mul_sum'] * $test['mul_score'];
$fill_all = $test['fill_sum'] * $test['fill_score'];
$jud_all = $test['jud_sum'] * $test['jud_score'];