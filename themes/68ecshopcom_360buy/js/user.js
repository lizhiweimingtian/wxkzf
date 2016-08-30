$(document).ready(function(){
	$('#reg-pic').delay(300).animate({left:0},"slow");
	$('#login-box').delay(300).animate({right:0},"slow");
});

//判断积分转账中的转出积分是否是数字
function scoreouts(){
    var p=/^[\d]{1,4}$/;
    var scoreout = document.getElementById("scoreout");
    var scoreout_tip = document.getElementById("scoreout_tip");
    if(p.test(scoreout.value)){
        scoreout_tip.innerHTML = "您一次最多只能转9999积分";
        scoreout_tip.style.color = "green";
    }else{
        scoreout_tip.innerHTML = "请输入正确的积分数字";
        scoreout_tip.style.color = "red";
    }
}
