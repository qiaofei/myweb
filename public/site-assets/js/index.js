$(document).ready(function(){
	var height=$(document).height();
	var width = $(document).width();
	var windowWidth = $(window).width()/2;
	var windowheight = $(window).height()/5;
	$(".v_view").width(windowWidth);
	$(".v_view").css("margin-top",windowheight);
	$(".v_button").click(function(){
		$("#video_view").css("visibility","visible");
	});
	$("#video_view").height(height);
	$(".n_1").mouseenter(function(){
		$("#new1").show();
		$("#new2").hide();
		$(".n_1 a").css("color"," #525252");
		$(".n_2 a").css("color"," #c5c5c5");
	});
	$(".n_2").mouseenter(function(){
		$("#new1").hide();
		$("#new2").show();
		$(".n_1 a").css("color"," #c5c5c5");
		$(".n_2 a").css("color"," #525252");
	});
	$(".v_clock").click(function(){
		stopVideo();
		$("#video_view").css("visibility","hidden");
	});
	$(".list1").mouseenter(function(){
		$(".sT h2").addClass("animated indexfadeInRightBig");
		$(".sT .f18").addClass("animated indexfadeInRightBig");
		$(".sT a").addClass("animated indexbounceInRight");
		
	});
	$(".list1").mouseleave(function(){
		$(".sT h2").removeClass("animated indexfadeInRightBig");
		$(".sT .f18").removeClass("animated indexfadeInRightBig");
		$(".sT a").removeClass("animated indexbounceInRight");
	});
	qrcode($("#app_Q"),"https://itunes.apple.com/cn/app/id1221878338?mt=8","site-assets/img/main/q_icon.png","130","130");
	$(".ios_Q").click(function(){
		$(".ios_Q img").attr("src","site-assets/img/main/down_ios.png");
		$(".android_Q img").attr("src","site-assets/img/main/down_a1.png");
		$(".app_Q").html("");
		qrcode($("#app_Q"),"https://itunes.apple.com/cn/app/id1221878338?mt=8","site-assets/img/main/q_icon.png","130","130");
	});
	$(".android_Q").click(function(){
		$(".ios_Q img").attr("src","site-assets/img/main/down_ios1.png");
		$(".android_Q img").attr("src","site-assets/img/main/down_a.png");
		$(".app_Q").html("");
		qrcode($("#app_Q"),"apk-release.bgameb.com/platform03171343.apk","site-assets/img/main/q_icon.png","130","130");
		
	});
});

function playPause(){//点击播放视频 
	var myVideo = document.getElementById("video1");
	if (myVideo.paused) 
	  myVideo.play(); 
	else 
	  myVideo.pause(); 
}
function stopVideo(){
	var myVideo = document.getElementById("video1");
	myVideo.pause(); 
}
function qrcode(id,text,src,width,height){//设置二维码
	id.qrcode({
		render: "canvas", //设置渲染方式，有table和canvas，使用canvas方式渲染性能相对来说比较好
		text: text, //扫描二维码后显示的内容,可以直接填一个网址，扫描二维码后自动跳向该链接
		width: width, //二维码的宽度
		height: height, //二维码的高度
		background: "#ffffff", //二维码的后景色
		foreground: "#000000", //二维码的前景色
	    src: src //二维码中间的图片
	});
}

