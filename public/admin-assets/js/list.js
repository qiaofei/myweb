/**
 * Created by Administrator on 2016/9/20 0020.
 */
$(document).ready(function(){
	function td_width(){
		//把表格上面的标题动态的赋给另外一个相同的标题
		for(var i=0;i<document.getElementById("table_screen0").rows[0].cells.length;i++){
		 	 document.getElementById("table_screen1").rows[0].cells[i].width=
			 document.getElementById("table_screen0").rows[0].cells[i].offsetWidth;
		}
		document.getElementById("table_screen").top=document.getElementById("search_b").offsetHeight+
		document.getElementById("box-header").offsetHeight;
	}
	td_width();
	$('#t_mail0').scroll(function(){
 	 	var jg=$('#t_mail0').scrollTop();//滚动条到页面顶部的距离
 	 	if(jg==0){
 	 		$("#table_screen").css("display","none");
 	 	 }else{
 	 	 	$("#table_screen").css({"display":"table"});
 	 	 }
	});
	$(window).resize(function(){
		td_width();
	});
});