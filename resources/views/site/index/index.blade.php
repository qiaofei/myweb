@extends('site')
@section('content')
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
		<li><a id="gamelist1" class="nav_h2" href="{{url('/')}}">官网首页</a></li>
		<li><a href="{{url('/gameCenter')}}">游戏中心</a></li>
		<li><a href="{{url('/news')}}">新闻中心</a></li>
		<li><a href="{{url('/service')}}">客服中心</a></li>
		<li><a href="{{url('/aboutUS')}}">关于我们</a></li>
	</ul>
</div>	
<div class="c_conect">
	<div class="c_title">
		<strong class="f28">News</strong>
		<strong class="f16">活动新闻</strong>	
		<div class="yellow"></div>
	</div>
	<a href="{{url('/news')}}"><div class="c_more"></div></a>
	<div class="c_video">
		<img src="{{ asset('site-assets/img/main/video_bg.png') }}" />
		<img class="v_button" src="{{ asset('site-assets/img/main/video_play.png') }}" onclick="playPause()" />
		<div class="v_introduce">
			<p>啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦</p>
		</div>
	</div>
	<div class="c_menu">
		<div class="n_title1">
			<ul>
				<li class="n_1"><a>游戏公告<span>({{count($notice_list)}})</span></a></li>
				<li class="n_2"><a>活动新闻<span>({{count($news_list)}})</span></a></li>
			</ul>
		</div>
		<div id="new1" class="new">
			@foreach ($notice_list as $key=>$value)
				<a href="{{url('/news/'.$value->id)}}"><div>{{$value->title}}</div><span>{{date('Y-m-d',$value->create_time)}}</span></a>
			@endforeach
		</div>
		<div id="new2" class="new" style="display: none;">
			@foreach ($news_list as $key=>$value)
				<a href="{{url('/news/'.$value->id)}}"><div>{{$value->title}}</div><span>{{date("Y-m-d",$value->create_time)}}</span></a>
			@endforeach
			<a></a>
			<a></a>
			<a></a>
			<a></a>
		</div>
	</div>
</div>
<div class="c_down">
	<div class="c_title">
		<strong class="f28">Game Center</strong>
		<strong class="f16">游戏下载中心</strong>
		<div class="yellow"></div>
	</div>
	<div class="c_content">
		<div class="list1 IR">
			<img src="{{ asset('site-assets/img/main/landlord.png') }}">
			<span class="sIntro">
				<div class="sT">
					<h2>比格斗地主</h2>
					<div class="yellow_1"></div>
					<p class="f18">丑萌猪队友<br />让你斗不停！ </p>
					<a class="down_img" onclick="test()"></a>
				</div>
			</span>
		</div>
		<div class="list1 IR">
			<img src="{{ asset('site-assets/img/main/BM.png') }}">
			<span class="sIntro">
				<div class="sT">
					<h2>比格棋牌</h2>
					<div class="yellow_1"></div>
					<p class="f18">比格棋牌<br />更懂你的棋牌！<br />快来享受棋牌的快乐！</p>
					<a class="down_img" onclick="test()"></a>
				</div>
			</span>
		</div>
		<div class="list1">
			<img src="{{ asset('site-assets/img/main/holdem.png') }}">
			<span class="sIntro">
				<div class="sT">
					<h2>比格德州扑克</h2>
					<div class="yellow_1"></div>
					<p class="f18">惊险刺激的对决<br />原汁原味的德州！ </p>
					<a class="down_img" onclick="test()"></a>
				</div>
			</span>
		</div>
		<div style="clear: both;"></div>
		<div class="c_bottontxt f18">
			<p>比格游戏，专注于棋牌游戏领域，您身边的棋牌专家，欢迎您的加入！</p>
			Bigman game,focus on the poker game industry,the poker expert around you, you are welcome to join.
		</div>
		
	</div>

	
</div>
<div id="video_view">
	<div class="v_view">
		<img class="v_clock" src="{{ asset('site-assets/img/main/delete.png') }}" />
		<video controls id="video1">
		  <source src="{{ asset('site-assets/img/movie.mp4') }}" type="video/mp4">
			  您的浏览器不支持 HTML5 video 标签。
		</video>
	</div>
</div>
<script type="text/javascript" src="{{ asset('site-assets/js/jquery.parallaxmouse.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site-assets/js/galaxy.js') }}" ></script>
<script type="text/javascript">
	function add(){
		document.getElementById("gamelist1").classList.add("nav_h2");
	}
	function deletea(){
		document.getElementById("gamelist1").classList.remove("nav_h2");
	}
	function test() {
		location.href = "{{url('/gameCenter')}}?" + "t=" + encodeURI("down")+"#wrapper";
	}
</script>			
@stop