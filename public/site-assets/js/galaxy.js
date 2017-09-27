////////////视觉差插件调用 /////////
//	invert：指定元素的运动方向是否相对于鼠标移动的方向。
//	range：指定一个元素在某个方向上可以运动的最大距离。
//	elms：一个数组对象，用于指定哪些元素要进行视觉差互动。
//		  el每一个元素对象都包含一个指向视觉差元素的引用，rate属性指定该元素的运动速率。
jQuery(window).parallaxmouse({
	invert: true,
	range: 300,
	elms: [
		{ el: $('#star1'), rate: 0.2 },
		{ el: $('#star2'), rate: 0.3 },
		{ el: $('#star3'), rate: 0.2 },
		{ el: $('#star4'), rate: 0.3 },
		{ el: $('#star5'), rate: 0.3 },
		{ el: $('#star6'), rate: 0.2 },
		{ el: $('#star7'), rate: 0.2 },
	]
});
/////////////////////////////////