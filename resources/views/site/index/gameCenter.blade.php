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
		<li><a id="gamelist2" class="nav_h2" href="{{url('/gameCenter')}}">游戏中心</a></li>
		<li><a href="{{url('/news')}}">新闻中心</a></li>
		<li><a href="{{url('/service')}}">客服中心</a></li>
		<li><a href="{{url('/aboutUS')}}">关于我们</a></li>
	</ul>
</div>		
<div id="wrapper"><!-- 最外层部分 -->
	<div id="banner"><!-- 轮播部分 -->
		<ul class="imgList"><!-- 图片部分 -->
			<li>
				<img src="{{ asset('site-assets/img/gamecenter/BANNER2.png') }}" alt="puss in boots1">
			</li>
			<li>
				<img src="{{ asset('site-assets/img/gamecenter/BANNER.png') }}" alt="puss in boots2">
			</li>
			<li>
				<img src="{{ asset('site-assets/img/gamecenter/BANNER3.png') }}" alt="puss in boots3">
			</li>
		</ul>
		<img src="{{ asset('site-assets/img/gamecenter/prev.png') }}" id="prev">
		<img src="{{ asset('site-assets/img/gamecenter/next.png') }}" id="next">
		<ul class="infoList"><!-- 图片左下角文字信息部分 -->
			<li class="L1 infoOn"><p class="animated bounceInRight">比格斗地主</p>
				<p class="animated fadeInLeftBig" id="bige">觉得自己很强？那是因为你没遇到过猪队友！</p></li>
			<li class="L2"><p class="animated bounceInLeft">比格德州扑克</p>
				<p class="animated fadeInRightBig">牛仔独有的酒馆情结！快来围观惊心动魄的德州对决！</p></li>
			<li class="L3"><p class="animated bounceInDown" id="niuniu">比格牛牛</p>
				<p class="animated bounceInUp">胜者才能让全场欢呼！尽情感受来自斗牛士的疯狂！</p></li>
		</ul>
		<ul class="indexList"><!-- 图片中间序号部分 -->
			<li class="indexOn"></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div>

<div class="G_content look">
	<div class="G_down">
		<div class="G_title list1G">
			<strong class="f28">Online</strong>
			<strong class="f16">在线游戏</strong>	
			<div class="yellow y1"></div>
		</div>
		<div class="G_title list2G">
			<strong class="f28">Download</strong>
			<strong class="f16">下载游戏</strong>	
			<div class="yellow y2"></div>
		</div>
		<div class="down1">	
			<div class="d_title">
				<img src="{{ asset('site-assets/img/gamecenter/tishi.png') }}"/>
				<span>( 点击即可在线开始游戏，无需下载，点开就玩！ )</span>
			</div>
			<div style="clear: both;"></div>
			<div class="table_list MR" id="big1">
				<img src="{{ asset('site-assets/img/gamecenter/man3.png') }}" />
				<p>< 比格斗地主  ></p>
			</div>
			<div class="table_list MR" id="big2">
				<img src="{{ asset('site-assets/img/gamecenter/man2.png') }}" />
				<p>< 德州扑克  ></p>
			</div>
			<div class="table_list app">
				<img src="{{ asset('site-assets/img/gamecenter/man1.png')}}" />
				<p>< 比格棋牌  ></p>
			</div>
			<div class="table_list ML niuniu">
				<img src="{{ asset('site-assets/img/gamecenter/niuniu.png')}}" />
				<p>< 比格牛牛  ></p>
			</div>
			<div class="down_btn">
				<img src="{{ asset('site-assets/img/gamecenter/viewmore.png')}}" />
			</div>
		</div>
		<div class="down2">
			<div class="d_title">
				<img src="{{ asset('site-assets/img/gamecenter/tishi.png') }}"/>
				<span>( 扫描二维码下载游戏----android用户请用浏览器扫码下载 )</span>
			</div>
			<div style="clear: both;"></div>
			<div class="down_view">
				<div class="down_left">
					<img class="iphone" src="{{ asset('site-assets/img/gamecenter/iphone.png')}}" />
					<img class="android" src="{{ asset('site-assets/img/gamecenter/android.png')}}" />
				</div>
				<div class="down_right">
					<div class= "right_wrap" onmousewheel="return scroll(event,this)">  
					    <ul class= "right_ul">   
					    	<li>
					        	<div class="right_li_img">
					        		<div class="right_li_b">
					        			<b>< 比格棋牌  ></b>
					        			<p>更懂你的棋牌</p>
					        		</div>
					        		<div class="appstop"></div>
									<p class="saoma">扫码下载</p>
					        		<img class="upJian" src="{{ asset('site-assets/img/gamecenter/up.png')}}" />
					        		<div class="erweima" id="appD"></div>
					        	</div>
					        </li>       
					        <li>
					        	<div class="right_li_img1">
					        		<div class="right_li_b">
					        			<b>< 比格斗地主  ></b>
					        			<p>让猪队友上树</p>
					        		</div>
					        		<div class="appstop"></div>
									<p class="saoma">扫码下载</p>
					        		<img class="upJian" src="{{ asset('site-assets/img/gamecenter/up.png')}}" />
					        		<div class="erweima" id="landlordD"></div>
					        	</div>
					        </li>      
					        <li>
					        	<div class="right_li_img2">
					        		<div class="right_li_b">
					        			<b>< 比格德州扑克  ></b>
					        			<p>等你CARRY全场</p><!--等你CARRY全场-->					        			
					        		</div>
					        		<div class="appstop"></div>
					        		<p class="saoma">扫码下载</p>
						        	<img class="upJian" src="{{ asset('site-assets/img/gamecenter/up.png')}}" />
						        	<div class="erweima" id="holdemD"></div>
					        	</div>
					        </li>      
					        <li>
					        	<div class="right_li_img3">
					        		<div class="right_li_b">
					        			<b>< 比格牛牛  ></b>
					        			<p>即将上线，敬请期待！</p>
					        		</div>
					        	</div>
					        </li>         
					    </ul>  
					</div> 
				</div>
				<div style="clear: both;"></div>
			</div>
			
			
		</div>
	</div>
</div>

<div class="G_content look2">
	<div class="vew_c">
		<div class="introduce1">
			<img src="{{ asset('site-assets/img/gamecenter/landlord_now.png')}}" />
			<div class="introduce_txt">
				比格斗地主是一款十分丑萌的经典斗地主游戏，新奇的画风，搞笑的动作，震撼的特效，让您惊喜不断，配上各地方言对话，
				为您带来丑萌逗趣的全新体验！
			</div> 
			<div class="return_btn" id="back1"></div>
		</div>
	</div>
	<div class="dd_main">
		<p>更多游戏推荐</p>
		<div class="zl_left" id="Left_Photo">
			<a href="javascript:void(0)"><img src="{{ asset('site-assets/img/gamecenter/jianL.png')}}" /></a>
		</div>
		<div class="zl_content">
			<ul id="ISL_Photo">
				<li class="man1"><img src="{{ asset('site-assets/img/gamecenter/man3.png')}}" /></li>
				<li class="man2"><img src="{{ asset('site-assets/img/gamecenter/man2.png')}}" /></li>
				<li class="app"><img src="{{ asset('site-assets/img/gamecenter/man1.png')}}" /></li>
				<li class="niuniu"><img src="{{ asset('site-assets/img/gamecenter/niuniu.png')}}" /></li>
			</ul>
		</div>
		<div class="zl_right" id="Right_Photo">
			<a href="javascript:void(0)"><img src="{{ asset('site-assets/img/gamecenter/jianR.png')}}" ></a>
		</div>
	</div>
</div>
<div class="G_content look3">
	<div class="vew_c1">
		<div class="introduce1">
			<img src="{{ asset('site-assets/img/gamecenter/holdem_now.png')}}" />
			<div class="introduce_txt">
				比格德州扑克是一款原汁原味的德州扑克，阴险狡诈的对手就在你身边，快来体验这款惊险刺激的德州扑克。
			</div> 
			<div class="return_btn" id="back2"></div>
		</div>
	</div>
	<div class="dd_main">
		<p>更多游戏推荐</p>
		<div class="zl_left" id="Left_Photo1">
			<a href="javascript:void(0)"><img src="{{ asset('site-assets/img/gamecenter/jianL.png')}}" width="21" height="23" /></a>
		</div>
		<div class="zl_content">
			<ul id="ISL_Photo1">
				<li class="man1"><img src="{{ asset('site-assets/img/gamecenter/man3.png')}}" width="208" height="109" /></li>
				<li class="man2"><img src="{{ asset('site-assets/img/gamecenter/man2.png')}}" width="208" height="109" /></li>
				<li class="app"><img src="{{ asset('site-assets/img/gamecenter/man1.png')}}" width="208" height="109" /></li>
				<li class="niuniu"><img src="{{ asset('site-assets/img/gamecenter/niuniu.png')}}" width="208" height="109" /></li>
			</ul>
		</div>
		<div class="zl_right" id="Right_Photo1">
			<a href="javascript:void(0)"><img src="{{ asset('site-assets/img/gamecenter/jianR.png')}}" width="21" height="23" /></a>
		</div>
	</div>
</div>


</div>
<script type="text/javascript" src="{{ asset('site-assets/js/ScrollPicLeft.js')}}"></script>
<script type="text/javascript">
	var scrollPhoto = new ScrollPicleft();
		scrollPhoto.scrollContId = "ISL_Photo"; // 内容容器ID""
		scrollPhoto.arrLeftId = "Left_Photo"; //左箭头ID
		scrollPhoto.arrRightId = "Right_Photo"; //右箭头ID
		scrollPhoto.frameWidth = 915; //显示框宽度
		scrollPhoto.pageWidth = 225; //翻页宽度
		scrollPhoto.speed = 10; //移动速度(单位毫秒，越小越快)
		scrollPhoto.space = 10; //每次移动像素(单位px，越大越快)
		scrollPhoto.autoPlay = false; //自动播放
		scrollPhoto.autoPlayTime = 3; //自动播放间隔时间(秒)
		scrollPhoto.initialize(); //初始化
		
	var scrollPhoto1 = new ScrollPicleft();
		scrollPhoto1.scrollContId = "ISL_Photo1"; // 内容容器ID""
		scrollPhoto1.arrLeftId = "Left_Photo1"; //左箭头ID
		scrollPhoto1.arrRightId = "Right_Photo1"; //右箭头ID
		scrollPhoto1.frameWidth = 915; //显示框宽度
		scrollPhoto1.pageWidth = 225; //翻页宽度
		scrollPhoto1.speed = 10; //移动速度(单位毫秒，越小越快)
		scrollPhoto1.space = 10; //每次移动像素(单位px，越大越快)
		scrollPhoto1.autoPlay = false; //自动播放
		scrollPhoto1.autoPlayTime = 3; //自动播放间隔时间(秒)
		scrollPhoto1.initialize(); //初始化
	function add(){
		document.getElementById("gamelist2").classList.add("nav_h2");
	}
	function deletea(){
		document.getElementById("gamelist2").classList.remove("nav_h2");
	}

</script>
<script type="text/javascript" src="{{ asset('site-assets/js/gamecenter_down.js')}}"></script>
<script type="text/javascript" src="{{ asset('site-assets/js/jquery.parallaxmouse.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('site-assets/js/galaxy.js')}}" ></script>
<script type="text/javascript" src="{{ asset('site-assets/js/gamecenter_carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('site-assets/js/gamecenter.js')}}"></script>
@stop