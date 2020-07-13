window.onload = function () {
    var timer = document.getElementById("ti").innerHTML;
    //答题限时30分钟
    let maxtime = parseInt(timer, 10) * 60;
    var int = setInterval(function () {
        if (maxtime > 0) {
            var min = parseInt(maxtime / 60);
            var sec = parseInt(maxtime % 60);
            ti.innerHTML = "还剩下" + min + "分" + sec + "秒";
            --maxtime;
            if (maxtime == 5 * 60) {
                alert("仅剩5分钟！");
            }
        } else {
            clearInterval(int);
            alert("考试时间到！");
            document.getElementById("sub").click();
        }
    }, 1000);
}
// 选中状态设置
function varyCss() {
    let sum_all = document.getElementById("sum_all").innerHTML,
        count_q = 0,
        i,
        q;
    for (i = 0; i < sum_all; i++) {
        count_q++;
        let select = document.getElementsByName(count_q); //四个值的数组
        let selectLen = select.length;
        //判断四个选项哪个被选中
        for (q = 0; q < selectLen; q++) {
            // if(select[q].checked) {alert(`您选中了第${count_q}题的第${q}个选项`);}
            if (select[q].checked) {
                document.getElementById(`a${count_q}`).style.cssText =
                    "background-color:dodgerblue;color:white";
            }
        }
    }
}

function varyCssMul() {
    let sum_all = document.getElementById("sum_all").innerHTML,
        count_q = 0,
        i,
        q;
    for (i = 0; i < sum_all; i++) {
        count_q++;
        let select = document.getElementsByName(count_q + "[]"); //四个值的数组
        let selectLen = select.length;
        //判断四个选项哪个被选中
        for (q = 0; q < selectLen; q++) {
            // if(select[q].checked) {alert(`您选中了第${count_q}题的第${q}个选项`);}
            if (select[0].checked || select[1].checked || select[2].checked || select[3].checked) {
                document.getElementById(`a${count_q}`).style.cssText =
                    "background-color:dodgerblue;color:white";
            } else {
                document.getElementById(`a${count_q}`).style.cssText =
                    "background-color:#ffffff;color:#3498db";
            }
        }
    }
}
function varyCssFill() {
    let sin_sum = document.getElementById("sin_sum").innerHTML,
        mul_sum = document.getElementById("mul_sum").innerHTML;
    let sum_all = document.getElementById("sum_all").innerHTML,
        count_q = parseInt(sin_sum)+parseInt(mul_sum),
        i;
    for (i = 0; i < sum_all; i++) {
        count_q++;
        let txt = document.getElementById(count_q).value;
        if (txt != "") {
            document.getElementById(`a${count_q}`).style.cssText =
                "background-color:dodgerblue;color:white;";
        } else {
            document.getElementById(`a${count_q}`).style.cssText =
                "background-color:#ffffff;color:#3498db";
        }
    }
}
//交卷检查是否有题目未填写
var timer = document.getElementById("ti").innerHTML;
//答题限时30分钟
let maxtime = parseInt(timer, 10) * 60;
var int = setInterval(function () {
        --maxtime;
}, 1000);
// setInterval(
//     function () {
//     setInterval(function() {},1000)
//     },1000);
setInterval(function () {document.getElementById("fff").innerHTML = maxtime+1},1000);
// let now_time = setInterval(function (){document.getElementById("fff").innerHTML},1000);
function validateForm() {
    let a = document.getElementById("fff").innerHTML;
    if(a > 2) {
    let un_fill = 0,
        count_q = 0,
        i;
    let sum_all = document.getElementById("sum_all").innerHTML;
    for (i = 0; i < sum_all; i++) {
        count_q++;
        if (document.getElementById(`a${count_q}`).style.color == "white") un_fill++;
    }
    if(sum_all-un_fill != 0) {
    var sumb = confirm(`您还有${sum_all-un_fill}道题未填写，确认要交卷吗？`);
    if (sumb == true) {
        return true;
    } else {
        return false;
    }
}
}
}
//考试进度条
function barPace() {
    let un_fill = 0,
        count_q = 0,
        i;
    let sum_all = document.getElementById("sum_all").innerHTML;
    for (i = 0; i < sum_all; i++) {
        count_q++;
    if (document.getElementById(`a${count_q}`).style.color == "white") un_fill++;
    } 
    document.getElementById("now_num").innerHTML = un_fill;
    //进度百分比
    let long = (un_fill/sum_all)*100;
    document.getElementById("pace").style.cssText = `width: ${long}%`;
}
//删除考题确认

function validateDel() {
    let res = confirm("您确定要删除该题吗？");
    if(res == true) {
        return true;
    } else {
        return false;
    }
}
//禁止右击
  function block(oEvent){
   if(window.event)
    oEvent=window.event;
   if(oEvent.button==2)
    alert("鼠标右键不可用");
  }
  document.onmousedown=block;