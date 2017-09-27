@extends('site')
@section('content')
<div class="indexZ">
	<div class="priv_content">
		<div class="priv_view">
			<div class="p_nav">
				<div class="menu_p">
					<div class="container_p">
					    <div class="toggle"></div>
					</div>
					<span class="hidden item"><a href="{{url('/')}}">官网首页 </a></span>
					<span class="hidden item"><a href="{{url('/gameCenter')}}">游戏中心 </a></span>
					<span class="hidden item"><a href="{{url('/news')}}">新闻中心 </a></span>
					<span class="hidden item"><a href="{{url('/service')}}">客服中心 </a></span>
					<span class="hidden item"><a href="{{url('/aboutUS')}}">关于我们 </a></span>
				</div>
			</div>
			<div class="priv_text">
				<div class="c_title">
					<strong class="f28">{{ $info->title }}</strong>
					<div class="yellow"></div>
				</div>
				<div class= "priv_wrap" onmousewheel="return scroll(event,this)">
					<ul class= "priv_ul">
						<li class="li_p">
							{!! EndaEditor::MarkDecode($info->content) !!}
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(function(){
			$('.toggle').on('click', function() {
			  $('.menu_p').toggleClass('expanded');  
			  $('span.item').toggleClass('hidden');  
			  $('.container_p , .toggle').toggleClass('close_p');  
			});
		})
</script>
@stop