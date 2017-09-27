var loc = location.href;
var n1 = loc.length; //地址的总长度
var n2 = loc.indexOf("="); //取得=号的位置
var n3 = loc.indexOf("#"); //取得=号的位置
var id = loc.substring(n2 + 1, n3); //从=号后面的内容
if(id == "down"){
	$(".list1G").css("color","#909191");
	$(".list2G").css("color","#FFFFFF");
	$(".y2").css("visibility","visible");
	$(".y1").css("visibility","hidden");
	$(".down2").css("visibility","visible");
	$(".down1").css("visibility","hidden");
	$(".ML").css("visibility","hidden");
}

