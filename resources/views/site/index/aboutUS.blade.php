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
		<li><a href="{{url('/')}}">官网首页</a></li>
		<li><a href="{{url('/gameCenter')}}">游戏中心</a></li>
		<li><a href="{{url('/news')}}">新闻中心</a></li>
		<li><a href="{{url('/service')}}">客服中心</a></li>
		<li><a id="gamelist5" class="nav_h2" href="{{url('/aboutUS')}}">关于我们</a></li>
	</ul>
</div>
<div class="about_content">
	<div class="about">
		<div class="c_title">
			<strong class="f26">亚势力游戏简介</strong>
			<div class="yellow"></div>
		</div>
		<p class="about_t1">亚势力游戏事业部，成立于2015年，汇聚了五湖四海的互联网精英，是顶尖的棋牌研发团队，自主研发了
			“比格游戏”系列，其中包括斗地主、德州扑克、麻将、牛牛等经典棋牌游戏。
		</p>
		<p class="about_t2">2017年，亚势力游戏正式开启了“比格互娱”品牌战略，全面启动“比格游戏创造者”战略计划，以全球
			化视野为棋牌游戏热爱者创造和发现好玩的棋牌游戏。
		</p>
		<div class="erweima_ab">
			<img src="site-assets/img/about/about.gif" />
		</div>
		<div class="about_text">
			<img class="about_img" src="site-assets/img/about/BIGMANGAME.png" />
			<div class="white_xian"></div>
			<p>扫左侧动态二维码<br />关注亚势力游戏公众号了解最新游戏动态</p>
			<p>亚势力游戏期待您的加盟<br />跟我们一起做不一样的棋牌游戏！</p>
		</div>
	</div>
</div>
	
	
	
	
	
	
	
	
<script type="text/javascript" src="site-assets/js/jquery.parallaxmouse.min.js"></script>
<script type="text/javascript" src="site-assets/js/galaxy.js" ></script>
<script type="text/javascript">
	function add(){
		document.getElementById("gamelist5").classList.add("nav_h2");
	}
	function deletea(){
		document.getElementById("gamelist5").classList.remove("nav_h2");
	}
</script>
@stop