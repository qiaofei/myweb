@extends('admin')
@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$title}}</b></h3>
            <div class="box-tools">
                <a  href="{{ route('admin.news.create') }}" class="btn btn-primary fa fa-plus"  _height="760" _width="1100">&nbsp;{{ '新增' }}</a>
            </div>
        </div>
        <div class="search_b" id="search_b">
            {!! Form::open( ['url'=>'/admin/news/index']) !!}
            {{'新闻标题'}}
            &nbsp;&nbsp;
            {!! Form::text('news_title',empty($news_title)?'':$news_title,['placeholder'=>'请输入新闻标题']) !!}
            &nbsp;
            <button class="box_btn" type="submit">{{ '查询' }}</button>
            {!! Form::close() !!}
        </div>
        <div id="search_b"></div>
        <div class="box-body ">
            <div class="t_mail" id="t_mail0">
                <div class="t_body">
                    <table class="table_screen" id="table_screen" style="display: none;">
                        <thead id="table_screen1">
                        <tr class="tr1">
                            <td class="first_col"></td>
                            <th width="60%">{{ '标题' }}</th>
                            <th width="20%">{{ '创建时间' }}</th>
                            <th width="20%">{{ '操作' }}</th>
                        </tr>
                        </thead>
                    </table>
                    <table class="scroll_table table table-hover">
                        <thead id="table_screen0">
                        <tr class="tr1">
                            <td class="first_col"></td>
                            <th width="60%">{{ '标题' }}</th>
                            <th width="20%">{{ '创建时间' }}</th>
                            <th width="20%">{{ '操作' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($news_list)>0)
                            @foreach ($news_list as $key=>$news)
                                <tr >
                                    <td class="first_col">{{ $key+1 }}</td>
                                    <td align="center">{{ $news->title }}</td>
                                    <td align="center">{{ date("Y-m-d H:i:s",$news->create_time) }}</td>
                                    <td align="center">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{ route('admin.news.edit',$news->id) }}" ><i class="fa fa-pencil fa-fw"></i>&nbsp;{{ '编辑' }}</a>
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                <span class="fa fa-caret-down"></span></a>
                                            <ul class="dropdown-menu">
                                                <li ><a _rel="confirm" href="{{ url('/admin/news/'.$news->id.'/del')  }}" _title="{{ '删除数据' }}" ><i class="fa fa-trash-o fa-fw"></i>&nbsp;{{ '删除' }}</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr >
                                <td colspan="7" class="empty" align="center">{{ '没有符合条件的记录' }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer ding clearfix">
        <div class="pull-right">
            {!! $news_list->render() !!}
        </div>
    </div>
@stop