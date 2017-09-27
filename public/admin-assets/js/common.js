/**
 * Created by Administrator on 2016/8/18 0018.
 */
$(document).ready(function(){
    var footerheight= $(".box-footer").height();
    var windowheight =$(window).height();
    var seheight =  $(".search_b").height();
    var height = windowheight-footerheight - 135 -seheight;
    $(".box_wrap_b").height(height);
    return false;

    alert($(".t_mail .t_head").height);
});