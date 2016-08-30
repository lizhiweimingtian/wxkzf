$(document).ready(function(){
	$("#li_a").click(function(){
		$(this).css("border-color","#DD2726");
		$("#li_b").css("border-color","#cdcdcd");
		$("#li_c").css("border-color","#cdcdcd");
		$("#price").innerHTML($("#li_a").innerHTML());
	});
	$("#li_b").click(function(){
		$(this).css("border-color","#DD2726");
		
		$("#li_a").css("border-color","#cdcdcd");
		$("#li_c").css("border-color","#cdcdcd");
	});
	$("#li_c").click(function(){
		$(this).css("border-color","#DD2726");
		
		$("#li_b").css("border-color","#cdcdcd");
		$("#li_a").css("border-color","#cdcdcd");
	});
	$("#li_e").click(function(){
		$(this).css("border-color","#DD2726");
		
		$("#li_g").css("border-color","#cdcdcd");
		$("#li_f").css("border-color","#cdcdcd");
	});
	$("#li_f").click(function(){
		$(this).css("border-color","#DD2726");
		
		$("#li_d").css("border-color","#cdcdcd");
		$("#li_g").css("border-color","#cdcdcd");
	});
	$("#li_g").click(function(){
		$(this).css("border-color","#DD2726");
		
		$("#li_e").css("border-color","#cdcdcd");
		$("#li_f").css("border-color","#cdcdcd");
	});
});