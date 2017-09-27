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
		<li><a href="{{url('/news')}}" id="not_new">新闻中心</a></li>
		<li><a id="gamelist4" class="nav_h2" href="{{url('/service')}}">客服中心</a></li>
		<li><a href="{{url('/aboutUS')}}">关于我们</a></li>
	</ul>
</div>
<div class="ser_img">
	<img src="{{ asset('site-assets/img/service/BANNER.png') }}" />
</div>	
<div class="ser_content" id="view1">
	<div class="ss_nav">
		<img class="ss_nav_l" src="site-assets/img/service/sec_1.png" />
		<img class="ss_nav_lT" src="site-assets/img/service/sec_2.png" />
		<img src="site-assets/img/service/sec_3.png" />
	</div>
	<div class="ss_main">
		<div class="ser_left SJ">
			<!--<span class="ser_title1">新手指南<p>Newbie Guide</p></span>-->
			<div class= "nav_wrap">  
			    <ul class= "nav_ul">        
			        <li class="Gli1">比格德州扑克新手指南</li>   
			        <li class="Gli2">比格斗地主新手指南</li>              
			    </ul>  
			</div>  
		</div>
		<div class="ser_left SJ">
			<!--<span class="ser_title2">游戏常见问题<p>Common problems</p></span>-->
			<div class= "nav_wrap">  <!--onmousewheel="return scroll(event,this)"-->
			    <ul class= "nav_ul que">
					@foreach ($faq_title_id as $key=>$faq)
						<li _val="{{ "fq_".$faq->title_id}}">{{$title_pairs[$faq->title_id]}}</li>
					@endforeach
			    </ul>  
			</div> 
		</div>
		<div class="ser_left">
			<!--<span class="ser_title3">账户与安全<p>Account and security</p></span>-->
			<div class= "nav_wrap">  
			    <ul class= "nav_ul que">
					@foreach ($as_title_id as $key=>$as)
					<li _val="{{ "as_".$as->title_id}}">{{$title_pairs[$as->title_id]}}</li>
					@endforeach
			    </ul>  
			</div> 
		</div>
		<div style="clear: both;"></div>
	</div>
</div>	
<div class="ser_content" id="view2">
	<div class="newguide">
		<div class="c_title">
			<strong class="f26">比格德州扑克新手指南</strong>
			<div class="yellow"></div>
		</div>
		<div class= "guide_wrap" onmousewheel="return scroll(event,this)">  
		    <ul class= "guide_ul">        
		        <li>
		 			<div class="guide_p1">
			        	<p class="gudp">1.了解比格德州扑克</p>
			        	<p>德州扑克是一种玩家对玩家的公共牌类游戏，一共有52张牌，没有王牌，一般是由2-10人参加。每个玩家
						分两张牌作为“底牌”，五张由荷官陆续朝上发出的公共牌。开始的时候，每个玩家会有两张面朝下的底牌
						，经过所有押注圈后，若仍不能分出胜负，游戏会进入“摊牌”阶段，也就是让所剩的玩家亮出各自的底牌
						以较高下，持大牌者获胜。
						</p>
		        	</div>
		        </li>   
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">2.了解牌型及比较</p>
		        		<p class="gudtext">
		        			皇家同花顺：同一花色的最大顺子<br />
							同花顺：同一花色的顺子  <br />
							四条：四张一样的牌加一张其他牌 <br />
							葫芦：三张一样的牌加一个对子 <br />
							同花：五张一样花色的牌 <br />
							顺子：不同花色的顺子  <br />
							三条：三张一样的牌加两个单张 <br />
							两对：两个对子加一个单张 
		        		</p>
		        		<img class="gudimg" style="margin-top: -52px;" src="{{ asset('site-assets/img/service/zhidao2.png') }}" />
		        		<div style="clear: both;"></div>
		        	</div>
		        </li>      
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">3.比格德州扑克的玩法与规则</p>
		        		<p class="gudtext">
		        			在牌局开始的时候，每个玩家分得两张
							手牌作为“手牌”（仅自己可见），荷
							官会分三次陆续发出五张公共牌。从每
							个玩家的底牌和公共牌中选出组合最大
							牌型的5张与其它玩家进行比较决出胜负
		        		</p>
		        		<img class="gudimg" src="{{ asset('site-assets/img/service/zhidao4.png') }}" />
		        		<div style="clear: both;"></div>
		        	</div>
		        </li>      
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">4.比格德州扑克的功能介绍</p>
		        		<p class="gudtext">
		        			在比格德州扑克中，核心的四个操作
							就是看牌、弃牌、跟住、夹住、全下.
							在每一轮的牌局中，分析对手玩家的
							心理和牌型在相应的倒计时内做出最
							正确的操作，会大大提高胜率。
		        		</p>
		        		<img class="gudimg" style="margin-top: -63px;margin-right: 3px;" src="{{ asset('site-assets/img/service/zhidao2.png') }}" />
		        		<div style="clear: both;"></div>
		        	</div>
		        	
		        </li>      
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">5.比格德州扑克的其他功能</p>
		        		<p class="gudtext1">
		        			最后，来了解下牌局中的其他功能吧，筹码不够了可随时增
							加，聊天互动让你的牌局不再寂寞。!
							更多玩法介绍，更多功能，尽在游戏内哦，赶紧下载起来吧!
			        	</p>
			        	<img class="gudimg1" src="{{ asset('site-assets/img/service/zhidao3.png') }}" />
			        	<div style="clear: both;"></div>
			        </div>
		        </li>           
		    </ul>  
		</div>
		<div class="botton_border">
			<img class="botton_img" src="{{ asset('site-assets/img/service/back.png') }}" />
		</div>
	</div>	
</div>

<div class="ser_content" id="view3">
	<div class="ser_question">
		<div class="c_title">
			<strong class="f26"><span id="title_str"></span></strong>
			<div class="yellow"></div>
		</div>
		<div class= "que_wrap" onmousewheel="return scroll(event,this)">
			<div id="html_result">
				<div class="v_h">
				@foreach($question1 as $value)
					{{$value->title}}<br/>
					{{$value->question}}<br />
					{{$value->answer}}
				@endforeach
				@foreach($question2 as $value)
					{{$value->title}}<br/>
					{{$value->question}}<br />
					{{$value->answer}}
				@endforeach
				</div>
			</div>
		</div> 
		<div class="botton_border">
			<img class="botton_img" src="{{ asset('site-assets/img/service/back.png') }}" />
		</div>
	</div>
</div>

<div class="ser_content" id="view4">
	<div class="newguide">
		<div class="c_title">
			<strong class="f26">比格斗地主新手指南</strong>
			<div class="yellow"></div>
		</div>
		<div class= "guide_wrap" onmousewheel="return scroll(event,this)">  
		    <ul class= "guide_ul">        
		        <li>
		 			<div class="guide_p1">
			        	<p class="gudp">1.了解比格斗地主</p>
			        	<p>斗地主是一种扑克游戏，游戏最少由3个玩家进行，用一副54张牌（连鬼牌）；游戏开始，发牌后留底三张
							谁成为地主就能多三张牌，那其中一方为地主，其余两家为另一方，双方对战，先出完牌的一方获胜，可以
							通过炸弹提高倍数，获得更多的奖励。
						</p>
		        	</div>
		        </li>   
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">2.开始游戏</p>
		        		<p class="gudtext2">
		        			【发牌】一副牌 54 张，一人 17 张，留 3 张做底牌<br /><span class="gud_bottom">在确定地主之前玩家不能看底牌。</span>
							【叫牌】1. 第一轮叫牌的玩家由系统随机选定。  <br /><span>2. 叫牌按出牌的顺序轮流进行叫牌时可以选择<br /><span>"叫地主 " 、" 不叫 " 。</span></span><br />
							<span>3. 如果有玩家选择 "叫地主 " 则立即结束叫牌，该玩家为地主。</span> <br />
							<span class="gud_bottom">4. 如果都"不叫"，则第一个选择不叫的玩家为地主。</span>
							【抢地主】1 、当某位玩家叫完地主后，按照次序每位玩家均有且只有一次"抢地主"的机会。玩家选择"抢地主"后，
							<span>如果没有其他玩家继续"抢地主"则地主权利属于该名"抢地主"的玩家</span><br />
							<span>2 、如果没有任何玩家选择"抢地主"，则地主权利属于"叫地主"的玩家。</span><br />
							<span>3 、每"抢地主"一次，游戏倍数 *2 。</span><br />
							<span class="gud_bottom">4 、凡是有过"不叫地主"操作的玩家无法进行"抢地主"的操作。</span>
							【出牌】将三张底牌交给地主，并亮出底牌让所有人都能看到。地主首先出牌，然后按逆时针顺序依次出牌，轮到
							<span>玩家跟牌时，玩家可以选择 " 不出 " 或出比上一个玩家大的牌。某一玩家出完牌时结束本盘。</span><br />
		        		</p>
		        		<img class="gudimg2" src="{{ asset('site-assets/img/service/dou1.png') }}" />
		        		<div style="clear: both;"></div>
		        	</div>
		        </li>      
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">3.牌型与比较</p>
		        		<p class="gudtext2">
		        			【牌型】<br />
		        			火箭：即双王（大王和小王），最大的牌。<br />
		        			炸弹：四张同数值牌（如四个 7 ）。<br />
							单牌：单个牌（如红桃 5 ）。<br />
							对牌：数值相同的两张牌（如梅花 4+ 方块 4 ）。<br />
							三张牌：数值相同的三张牌（如三个 J ）。<br />
							三带一：数值相同的三张牌 + 一张单牌或一对牌。<br />
							例如： 333+6 或 444+99<br />
							单顺：五张或更多的连续单牌（如： 45678 或 78910JQK ）。不包括 2 点和双王。<br />
							双顺：三对或更多的连续对牌（如： 334455 、 7788991010JJ ）。不包括 2 点和双王。<br />
							三顺：二个或更多的连续三张牌（如： 333444 、 555666777888 ）。不包括 2 点和双王。<br />
							飞机带翅膀：三顺＋同数量的单牌（或同数量的对牌）。<br />
							如： 444555+79 或 333444555+7799JJ<br />
							四带二：四张牌＋两手牌。（注意：四带二不是炸弹）。<br />
							如： 5555 ＋ 3 ＋ 8 或 4444 ＋ 55 ＋ 77 。<br />
							【牌型的比较】<br />
							火箭(即王炸)最大，可以打任意其他的牌<br />
							炸弹比火箭小，比其他牌大。都是炸弹时按牌的分值比大小。<br />
							除火箭和炸弹外，其他牌必须要牌型相同且总张数相同才能比大小。<br />
							单牌按分值比大小，依次是<br />
							大王>小王>2>A>K>Q>J>10>9>8>7>6>5>4>3<br />
							顺牌按最大的一张牌的分值来比大小。<br />
							飞机带翅膀和四带二按其中的三顺和四张部分来比，带的牌不影响大小。
		        		</p>
		        		<img class="gudimg3" src="{{ asset('site-assets/img/service/dou2.png') }}" />
		        		<img class="gudimg4" src="{{ asset('site-assets/img/service/dou3.png') }}" />
		        		<div style="clear: both;"></div>
		        	</div>
		        </li>      
		        <li>
		        	<div class="guide_p1">
		        		<p class="gudp">4.胜负的判定</p>
		        		<p class="gudtext2">
		        			任意一家出完牌后结束游戏，若是地主先出完牌则地主胜，否则另外两家胜。还在等什么？<br />赶快进入游戏大展身手吧！
		        		</p>
		        		<div style="clear: both;"></div>
		        	</div>
		        </li>                
		    </ul>  
		</div>
		<div class="botton_border">
			<img class="botton_img" src="{{ asset('site-assets/img/service/back.png') }}" />
		</div>
	</div>	
</div>
<script type="text/javascript" src="{{ asset('site-assets/js/jquery.parallaxmouse.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site-assets/js/galaxy.js') }}" ></script>
<script type="text/javascript">
	function add(){
		document.getElementById("gamelist4").classList.add("nav_h2");
	}
	function deletea(){
		document.getElementById("gamelist4").classList.remove("nav_h2");
	}
</script>
<script type="text/javascript" src="{{asset('site-assets/js/service.js') }}"></script>
@stop