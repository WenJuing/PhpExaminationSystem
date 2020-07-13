window.onload = function(){
    // var examid = document.getElementById("examid").innerHTML;
    // var password = document.getElementById("password").innerHTML;
    // document.getElementById("in_1").value = examid;
    // document.getElementById("in_2").value = password;

    //修改试卷信息

    var na = document.getElementById("na").innerHTML;
    var ti = document.getElementById("ti").innerHTML;
    var s_sum = document.getElementById("s_sum").innerHTML;
    var m_sum = document.getElementById("m_sum").innerHTML;
    var f_sum = document.getElementById("f_sum").innerHTML;
    var j_sum = document.getElementById("j_sum").innerHTML;
    var s_score = document.getElementById("s_score").innerHTML;
    var m_score = document.getElementById("m_score").innerHTML;
    var f_score = document.getElementById("f_score").innerHTML;
    var j_score = document.getElementById("j_score").innerHTML;

    document.getElementById("name").value = na;
    document.getElementById("time").value = ti;
    document.getElementById("sin_sum").value = parseInt(s_sum,10);
    document.getElementById("mul_sum").value = parseInt(m_sum,10);
    document.getElementById("fill_sum").value = parseInt(f_sum,10);
    document.getElementById("jud_sum").value = parseInt(j_sum,10);
    document.getElementById("sin_score").value = parseFloat(s_score);
    document.getElementById("mul_score").value = parseFloat(m_score);
    document.getElementById("fill_score").value = parseFloat(f_score);
    document.getElementById("jud_score").value = parseFloat(j_score);
    let sin_all = parseInt(s_sum,10) * parseFloat(s_score);
    document.getElementById("sin_all").innerHTML = sin_all;
    let mul_all = parseInt(m_sum,10) * parseFloat(m_score);
    document.getElementById("mul_all").innerHTML = mul_all;
    let fill_all = parseInt(f_sum,10) * parseFloat(f_score);
    document.getElementById("fill_all").innerHTML = fill_all;
    let jud_all = parseInt(j_sum,10) * parseFloat(j_score);
    document.getElementById("jud_all").innerHTML = jud_all;
    let sum_all = parseInt(s_sum,10) + parseInt(m_sum,10) + parseInt(f_sum,10) + parseInt(j_sum,10);
    document.getElementById("sum_all").innerHTML = sum_all;
    let score_all = sin_all + mul_all + fill_all + jud_all
    document.getElementById("score_all").innerHTML = score_all;

    //修改题目信息
    let ori_sin_q = document.getElementById("ori_sin_q").innerHTML;
    var ori_sin_a = document.getElementById("ori_sin_a").innerHTML;
    let ori_sin_b = document.getElementById("ori_sin_b").innerHTML;
    let ori_sin_c = document.getElementById("ori_sin_c").innerHTML;
    let ori_sin_d = document.getElementById("ori_sin_d").innerHTML;
    let ori_sin_s = document.getElementById("ori_sin_s").innerHTML;
    document.getElementsByName("new_sin_q").value = ori_sin_q;
    document.getElementById("new_sin_a").value = ori_sin_a;
    document.getElementById("new_sin_b").value = ori_sin_b;
    document.getElementById("new_sin_c").value = ori_sin_c;
    document.getElementById("new_sin_d").value = ori_sin_d;
    document.getElementById("new_sin_s").value = ori_sin_s;


}