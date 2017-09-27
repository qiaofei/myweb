<!DOCTYPE html>
<html>
	<head>
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		@if (isset($meta_keyword))<meta name="keyward" content="{{$meta_keyword}}" />@endif
		@if (isset($meta_description))<meta name="description" content="{{$meta_description}}" />@endif
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>{{$title}}</title>
		<link href="{{ asset('favicon.ico')}}" rel="shortcut icon" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/common.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/footer.css' )}}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/galaxy.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/index.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/gamecenter.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/animate.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/service.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/aboutUS.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/privacyPolicy.css') }}" />
		<link rel="stylesheet" href="{{ asset('site-assets/css/news.css') }}" />
	</head>
	<script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('site-assets/js/index.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('site-assets/js/qrcode/qrcode.js')}}"></script>
	<script type="text/javascript" src="{{ asset('site-assets/js/qrcode/utf.js')}}"></script>
	<body>
		<div class="body_img" >
			<div class="head_announce">
				<img class="main_logo" src="{{ asset('site-assets/img/main/main_logo.png') }}" />
				<div class="announcement">
					比格棋牌爆笑来袭，给你前所未有的酷爽体验！
				</div>
				<p>扫一扫下载游戏</p>
				<div class="app_qroce">
					<div class="qrodce_bg">
						<div id="app_Q" class="app_Q"></div>
					</div>
					<div class="ann_btn">
						<div class="ios_Q">
							<img src="{{ asset('site-assets/img/main/down_ios.png') }}" />
						</div>
						<div class="android_Q">
							<img src="{{ asset('site-assets/img/main/down_a1.png') }}" />
						</div>
					</div>
					
				</div>
			</div>

			@yield('content')
				
			<div class="footer">
			    <ul class="menu_box">
			        <li class="menu_list"><a href="{{url('/aboutUS')}}" class="menu">关于本站</a><span class="line">|</span></li>
			        <li class="menu_list"><a href="{{url('/disclaimer')}}" class="menu">免责声明</a><span class="line">|</span></li>
					<li class="menu_list"><a href="{{url('/privacyPolicy')}}" class="menu">隐私政策</a><span class="line">|</span></li>
			        <li class="menu_list"><a href="{{url('/service')}}" class="menu">联系我们</a><span class="line">|</span></li>
			        <li class="menu_list"><a href="{{url('/gameCenter#wrapper')}}" class="menu">网页游戏</a><span class="line">|</span></li>
			        <li class="menu_list"><a href="http://dk.bgameb.com/login.php" target="_blank"  rel="nofollow" class="menu">点卡代理</a><!--em class="line"></em--></li>
			    </ul>
			    <div class="menu_a">
			    	<a href="http://net.china.com.cn/index.htm" target="_blank"  rel="nofollow"><img src="{{ asset('site-assets/img/footer/f1.png') }}"/></a>
			        <a href="http://www.cyberpolice.cn/wfjb/" target="_blank"  rel="nofollow"><img src="{{ asset('site-assets/img/footer/f2.png') }}"/></a>
			        <a href="http://www.miitbeian.gov.cn/" target="_blank"  rel="nofollow"><img src="{{ asset('site-assets/img/footer/f3.png') }}"/></a>
			        <a href="http://www.cyberpolice.cn/wfjb/" target="_blank"  rel="nofollow"><img src="{{ asset('site-assets/img/footer/f4.png') }}"/></a>
			        <a href="http://www.cogcpa.org/" target="_blank"  rel="nofollow"><img src="{{ asset('site-assets/img/footer/f5.png') }}"/></a>
			    </div>
			    <div class="copyright">
			        <a href="http://www.miitbeian.gov.cn/" rel="nofollow" target="_blank" >ICP证：粤ICP备16078597号-1</a><br/>
				        健康游戏忠告：抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当 适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活<br/>
						本公司游戏只适合18岁以上玩家！
				        文明办网文明上网 举报邮箱：<span>service@asia00.com</span> 网页游戏行业规范自律联盟  
			        <p class="footer_bottom">深圳市亚势力游戏工作室  Copyright © 2015-2016 www.bgameb.com</p>
			    </div>
			</div>
		</div>
		<script type="text/javascript" src="{{ asset('site-assets/js/sHover.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('site-assets/js/sHover.js') }}" ></script>
		<script type="text/javascript">
				/***div里面的滚动不影响body的滚动***/
				var scroll = function(event,scroller){
				    var k = event.wheelDelta? event.wheelDelta:-event.detail*10;
				    scroller.scrollTop = scroller.scrollTop - k;
				    return false;
				};
				/********************************/
		</script>
	</body>
</html>