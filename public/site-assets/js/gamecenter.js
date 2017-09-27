$(document).ready(function() {
	$(".list1G").mouseenter(function(){
		$(".list1G").css("color","#FFFFFF");
		$(".list2G").css("color","#909191");
		$(".y1").css("visibility","visible");
		$(".y2").css("visibility","hidden");
		$(".down1").css("visibility","visible");
		$(".down2").css("visibility","hidden");
		down = 0 ;
		$(".ML").css("visibility","hidden");
		$(".down1").css("height","250px");
		$(".down_btn img").attr("src","site-assets/img/gamecenter/viewmore.png");
		$(".appstop").css("visibility","hidden");
	});
	$(".list2G").mouseenter(function(){
		$(".list1G").css("color","#909191");
		$(".list2G").css("color","#FFFFFF");
		$(".y2").css("visibility","visible");
		$(".y1").css("visibility","hidden");
		$(".down2").css("visibility","visible");
		$(".down1").css("visibility","hidden");
		$(".ML").css("visibility","hidden");
		if(iphone == 0){
			$(".appstop").css("visibility","visible");
		}else{
			$(".appstop").css("visibility","hidden");
		}
	});
	
	var down = 0;
	$(".down_btn").click(function(){
		if(down == 0){
			down = 1;
			$(".ML").css("visibility","visible");
			$(".down1").css("height","438px");
			$(".down_btn img").attr("src","site-assets/img/gamecenter/REtract.png");
		}else{
			down = 0 ;
			$(".ML").css("visibility","hidden");
			$(".down1").css("height","250px");
			$(".down_btn img").attr("src","site-assets/img/gamecenter/viewmore.png");
		}
	});
	$("#big1").click(function(){
		openlandlords();
	});
	$(".man1").click(function(){
		leavelandlords();
		leaveholdem();
		openlandlords();
	});
	$(".man2").click(function(){
		leavelandlords();
		leaveholdem();
		openholdem();
	});
	$("#back1").click(function(){
		leavelandlords();
	});
	$("#big2").click(function(){
		openholdem();
	});
	$("#back2").click(function(){
		leaveholdem();
	});
	$(".app").click(function(){
		alert("推荐下载APP！！");
	});
	$(".niuniu").click(function(){
		alert("即将上线，敬请期待！")
	});
	var iphone = 0;
	$(".iphone").click(function(){
		iphone = 0;
		$(".appstop").css("visibility","visible");
		$(".iphone").css("opacity","1");
		$(".iphone").css("filter","alpha(opacity=100)");
		$(".android").css("opacity","0.5");
		$(".android").css("filter","alpha(opacity=50)");
		$(".erweima").html("");
		qrcode($("#appD"),"https://itunes.apple.com/cn/app/id1221878338?mt=8","","100","100");
		qrcode($("#landlordD"),"https://itunes.apple.com/cn/app/id1194425608?mt=8","","100","100");
		qrcode($("#holdemD"),"https://itunes.apple.com/cn/app/id1218159187?mt=8","","100","100");
		$(".right_wrap").scrollTop(0);
		$(".hh").css("visibility","visible");
	});
	$(".android").click(function(){
		iphone = 1;
		$(".appstop").css("visibility","hidden");
		$(".erweima").html("");
		$(".iphone").css("opacity","0.5");
		$(".iphone").css("filter","alpha(opacity=50)");
		$(".android").css("opacity","1");
		$(".android").css("filter","alpha(opacity=100)");
		qrcode($("#appD"),"apk-release.bgameb.com/platform.apk","","100","100");
		qrcode($("#landlordD"),"apk-release.bgameb.com/landlord.apk","","100","100");
		qrcode($("#holdemD"),"apk-release.bgameb.com/holdem.apk","","100","100");
		$(".right_wrap").scrollTop(0);
		$(".hh").css("visibility","hidden");
	});
	qrcode($("#appD"),"https://itunes.apple.com/cn/app/id1221878338?mt=8","","100","100");
	qrcode($("#landlordD"),"https://itunes.apple.com/cn/app/id1194425608?mt=8","","100","100");
	qrcode($("#holdemD"),"https://itunes.apple.com/cn/app/id1218159187?mt=8","","100","100");
});
function openlandlords(){
		$(".look").css("visibility","hidden");
		$(".look3").css("visibility","hidden");
		$(".look2").css("visibility","visible");
		$(".down2").css("visibility","hidden");
		$(".down1").css("visibility","hidden");
		$(".ML").css("visibility","hidden");
		$(".down1").css("height","250px");
		$(".down_btn img").attr("src","site-assets/img/gamecenter/viewmore.png");
		down = 0;
		var inserthtml = '<iframe class="swtframe" id="landlords" src="https://trunk.bgameb.com/landlords/debug/web/index.html" ></iframe>';
		$(".vew_c").append(inserthtml);
	}
function leavelandlords(){
		$(".look2").css("visibility","hidden");
		$(".look").css("visibility","visible");
		$(".down2").css("visibility","hidden");
		$(".down1").css("visibility","visible");
		$(".vew_c #landlords").remove();
	}
function openholdem(){
		$(".look").css("visibility","hidden");
		$(".look2").css("visibility","hidden");
		$(".look3").css("visibility","visible");
		$(".down2").css("visibility","hidden");
		$(".down1").css("visibility","hidden");
		$(".ML").css("visibility","hidden");
		$(".down1").css("height","250px");
		$(".down_btn img").attr("src","site-assets/img/gamecenter/viewmore.png");
		down = 0;
		var inserthtmlq = '<iframe class="swtframe" id="holdem" src="https://trunk.bgameb.com/holdem/debug/web/index.html" ></iframe>';
		$(".vew_c1").append(inserthtmlq);
	}
function leaveholdem(){
		$(".look3").css("visibility","hidden");
		$(".look").css("visibility","visible");
		$(".down2").css("visibility","hidden");
		$(".down1").css("visibility","visible");
		$(".vew_c1 #holdem").remove();
	}



