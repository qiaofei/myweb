$(document).ready(function(){
	$(".Gli1").click(function(){
		$("#view1").css("visibility","hidden");
		$("#view2").css("visibility","visible");
	});
	$(".Gli2").click(function(){
		$("#view1").css("visibility","hidden");
		$("#view4").css("visibility","visible");
	});
	$(".que li").click(function(){
		$("#view1").css("visibility","hidden");
		$("#view3").css("visibility","visible");
		var liValue =$(this).attr("_val");
		//ajax设置
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type:"POST",
			url:"/service/getData",
			data:{str_id:liValue},
			dataType:"json",
			async:true,
			success:function(data){
				document.getElementById("title_str").innerText = data.title;
				var html = "";
				var list = data.list;
				for (var i = 0;i<list.length;i++){
					html += "<ul class= 'que_ul'>"
						+"<li><div class='que_Q'><img src='site-assets/img/service/Q.png' /><p>"+list[i]['question']+"</p>"
						+"<div style='clear: both;'></div></div><div class='que_A'><img src='site-assets/img/service/A.png' />"
						+"<p>"+list[i]['answer']+"</p>"+"<div style='clear: both;'></div>"
						+"</div></li></ul>";
				}

				$("#html_result").html(html);
			}
		});
		$("#view3").attr("value",liValue);
	});
	$(".botton_border").click(function(){
		$("#view1").css("visibility","visible");
		$("#view2").css("visibility","hidden");
		$("#view3").css("visibility","hidden");
		$("#view4").css("visibility","hidden");
	});
	
	
	
	
	
	
	
	
});
