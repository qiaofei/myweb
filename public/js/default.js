
$("*[_rel=popup]").on("click",function(){


    if ($(this).attr("href")== undefined){
        new top.YSL.Tip('找不到href',2);
        return false;
    }else{
        var url = $(this).attr("href");
    }

    if ($(this).attr("_title")== undefined){
        var title = "操作信息";
    }else{
        var title = $(this).attr("_title");
    }
    if ($(this).attr("_width")== undefined){
        var width = "600px";
    }else{
        var width = $(this).attr("_width")+"px";
    }
    if ($(this).attr("_height")== undefined){
        var height = "420px";
    }else{
        var height = $(this).attr("_height")+"px";
    }

    layer.open({
        type: 2,
        title: title,
        maxmin: true,
        shadeClose: false,
        area : [width, height],
        content: url+"?popurl="+encodeURI(url),
    });
    return false;
});

$("*[_rel=confirm]").on("click",function(){

    if ($(this).attr("href")== undefined){
        new top.YSL.Tip('找不到href',2);
        return false;
    }else{
        var url = $(this).attr("href");
    }
    if ($(this).attr("_title")== undefined){
        var showmsg = "确定执行该操作?";
        return false;
    }else{
        var showmsg = $(this).attr("_title");
    }


    //批量勾选操作
    var batch = $(this).attr("_batch"); //_batch='true'

    layer.confirm(showmsg,{icon: 3, title:'操作确认'}, function(index){

        if(typeof batch!='undefined' && batch!=''){
            do_ajax_request_selected(url);
        }else{

            $.ajax({
                type: "GET",
                async: false,
                dataType: "json",
                url: url,
                success: function(data){

                    if (data.code == 10000){
                        window.location.reload();
                    }else{
                        alert("删除失败");
                    }
                    //new top.YSL.Tip(data.msg,(data.result == 'success')?1:2);//2为出错提示
                    //if (data.result != 'success'){
                    //    return false;
                    //}
                    // if (data.extra_js){
                    //
                    //     eval(data.extra_js);
                    // }	else	{
                    //     if (window.listTable && window.listTable.is_searched()){
                    //         listTable.search();
                    //     }	else	{
                    //         window.location.reload();
                    //     }
                    // }

                }
            });
        }
        layer.close(index);
    });
    return false;
});


$("*[_rel=popupMap]").on("click",function(){


    if ($(this).attr("href")== undefined){
        new top.YSL.Tip('找不到href',2);
        return false;
    }else{
        var url = $(this).attr("href");
    }

    if ($(this).attr("_title")== undefined){
        var title = "操作信息";
    }else{
        var title = $(this).attr("_title");
    }
    if ($(this).attr("_width")== undefined){
        var width = "600px";
    }else{
        var width = $(this).attr("_width")+"px";
    }
    if ($(this).attr("_height")== undefined){
        var height = "420px";
    }else{
        var height = $(this).attr("_height")+"px";
    }

    layer.open({

        type: 2,
        title: false,
        closeBtn: 0,
        shadeClose: true,
        area : [width, height],
        content: url+"?popurl="+encodeURI(url)

    });
    return false;
});


function datetime(){

    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD hh:mm',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };

    laydate(start);
}


function beforedate(){

    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: '1979-01-01 00:00:00', //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: false,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };

    laydate(start);

}

function beforedate2(){

    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: '1979-01-01 00:00:00',
        max: '2099-06-16 23:59:59',
        istime: false,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(end);
}
