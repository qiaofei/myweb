@extends('site')
@section('content')
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
<div id="galaxy">
	<img id="star1" src="{{ asset('site-assets/img/galaxy/1.png') }}" class="top left" />
	<img id="star2" src="{{ asset('site-assets/img/galaxy/2.png') }}" class="top" />
	<img id="star3" src="{{ asset('site-assets/img/galaxy/3.png') }}" class="top" />
	<img id="star4" src="{{ asset('site-assets/img/galaxy/4.png') }}" class="left" />
	<img id="star5" src="{{ asset('site-assets/img/galaxy/5.png') }}" class="top left" />
	<img id="star6" src="{{ asset('site-assets/img/galaxy/6.png') }}" class="top left" />
	<img id="star7" src="{{ asset('site-assets/img/galaxy/7.png') }}" class="top" />
</div>
<div class="heard_bgb" onmousemove="deletea()" onmouseleave="add()">
	<ul>
		<li><a href="{{url('/')}}">官网首页</a></li>
		<li><a href="{{url('/gameCenter')}}">游戏中心</a></li>
		<li><a id="gamelist3" class="nav_h2" href="{{url('/news')}}">新闻中心</a></li>
		<li><a href="{{url('/service')}}">客服中心</a></li>
		<li><a href="{{url('/aboutUS')}}">关于我们</a></li>
	</ul>
</div>

<div class="news_con">
	<div class="news_left">
		<div class="n_left_c">
			<div class="G_title newb">
				<strong class="f28">新闻中心</strong>
				<div class="yellow y1"></div>
			</div>
			<div style="clear: both;"></div>
			<div class="bread_new">
				<ul>
					<li>你当前位置：</li>
					<li>新闻中心<span>></span></li>
					<li>{{$news_info->title}}</li>
					<li style="clear: both;"></li>
				</ul>
			</div>
			<div class="text_cont">
				<p class="text_tilte">{{$news_info->title}}</p>
				<span class="time_type">{{date("Y-m-d",$news_info->create_time)}}</span>
				<div class="new_pa">
					<div id="frameContent">
						<div class="V_H">{!! EndaEditor::MarkDecode($news_info->content) !!}</div>
					</div>
				    <div id="pages"></div>
				</div>
			</div>
		</div>

		<div class="left_bottom_n">
			<p>《比格棋牌》官方微信公众号：Bigmangame</p>
			<p>《比格棋牌》玩家交流QQ群：斗地主：549362598 &nbsp;&nbsp;德州：545363052</p>
		</div>
	</div>
	<div class="news_right">
		<div class="search-wrapper">
		    <div class="input-holder">
				{!! Form::open( ['url'=>'/news']) !!}
		        <input type="text" class="search-input" placeholder="Type to search" name="news_keyword"/>
		        <button type="submit" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
				{!! Form::close() !!}
		    </div>
		    <!--<span class="close" onclick="searchToggle(this, event);"></span>-->
		</div>
		<div class="New_table">
			<ul>
				<li><div class="N_GG"></div><span class="li_title">最新动态<!--<span>/更多</span>--></span></li>
				<li style="clear: both;"></li>
				@foreach ($title_list as $key=>$item)
				<li ><div class="@if ($item->type == 1) N_NN @else N_GG @endif">{{$type_list[$item->type]}}</div><span class="li_N"><a href="{{url('/news/'.$item->id)}}">{{$item->title}}</a></span></li>
				<li style="clear: both;"></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>


<script type="text/javascript">
	function searchToggle(obj, evt){
	  var container = $(obj).closest('.search-wrapper');
	  if(!container.hasClass('active')){
	      container.addClass('active');
	      evt.preventDefault();
	  }
	  else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
	      container.removeClass('active');
	      // clear input
	      container.find('.search-input').val('');
	  }
	}  
</script>
<script language="javascript">
    var obj = document.getElementById("frameContent");//获取内容层
    var pages = document.getElementById("pages");//获取翻页层
    window.onload = function()//重写窗体加载的事件
    {
	showPage(0);
    var allpages = "{{$page_num}}";//获取页面数量
//  pages.innerHTML = "<b>共"+allpages+"页</b> ";//输出页面数量
	@foreach ($page_content as $num=>$content)
	pages.innerHTML += "<a href=\"javascript:showPage('"+{{$num}}+"');\">"+{{$num+1}}+"</a> ";
	@endforeach
    //循环输出第几页
	    if(allpages == 1){
	    	$("#pages").css("visibility","hidden");
	    }
    }
    
    function showPage(pageINdex)
    {
		var news_id = "{{$news_info->id}}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type:"POST",
			url:"/getNewsData",
			data:{id:news_id,index:pageINdex},
			dataType:"json",
			async:true,
			success:function(data){
				$("#frameContent").html(data.content);
//				alert(data.content);
			}
		});
//  obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight);//根据高度，输出指定的页
    }
    
</script>
<script type="text/javascript" src="{{ asset('site-assets/js/jquery.parallaxmouse.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site-assets/js/galaxy.js') }}" ></script>
<script type="text/javascript">
	function add(){
		document.getElementById("gamelist3").classList.add("nav_h2");
	}
	function deletea(){
		document.getElementById("gamelist3").classList.remove("nav_h2");
	}
</script>



@stop