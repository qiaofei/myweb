@extends('admin')
@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$title}}</b></h3>
            <div class="box-tools">
                <a _rel="popup" href="{{ url('admin/server/as/createAS') }}" class="btn btn-primary fa fa-plus" _title="{{ '新增分平台账号' }}" _height="760" _width="1100">&nbsp;{{ '新增' }}</a>
            </div>
        </div>
        <div class="search_b" id="search_b">
            {!! Form::open( ['url'=>'/admin/server/as']) !!}
            {{'问题归属标题'}}
            {!!  Form::select('title_id', ['0'=>'请选择']+$title_list, empty($title_id)?'':$title_id,['class'=>'selet1']) !!}
            &nbsp;&nbsp;
            {{'问题'}}
            &nbsp;&nbsp;
            {!! Form::text('question',empty($question)?'':$question,['placeholder'=>'请输入问题标题']) !!}
            &nbsp;
        <!--
            {{ '发布时间' }}
                &nbsp;&nbsp;
            <input onclick="beforedate()" class="laydate-icon" name="startTime" id="start" value=<?php echo empty($startTime)?'':$startTime;?>> -
            <input onclick="beforedate2()" class="laydate-icon" name="endTime" id="end" value=<?php echo empty($endTime)?'':$endTime;?>>
            -->
            <button class="box_btn" type="submit">{{ '查询' }}</button>
            {{--<button type="button" class="box_btn" id="export">{{ '导出' }}</button>--}}
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
                            <th width="15%">{{ '问题归属标题' }}</th>
                            <th width="15%">{{ '问题' }}</th>
                            <th width="50%">{{ '答案' }}</th>
                            <th width="10%">{{ '创建时间' }}</th>
                            <th width="10%">{{ '操作' }}</th>
                        </tr>
                        </thead>
                    </table>
                    <table class="scroll_table table table-hover">
                        <thead id="table_screen0">
                        <tr class="tr1">
                            <td class="first_col"></td>
                            <th width="15%">{{ '问题归属标题' }}</th>
                            <th width="15%">{{ '问题' }}</th>
                            <th width="50%">{{ '答案' }}</th>
                            <th width="10%">{{ '创建时间' }}</th>
                            <th width="10%">{{ '操作' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($as_list)>0)
                            @foreach ($as_list as $key=>$as)
                                <tr >
                                    <td class="first_col">{{ $key+1 }}</td>
                                    <td align="center">{{ $title_list[$as->title_id] }}</td>
                                    <td align="center">{{ $as->question }}</td>
                                    <td align="center">{!! $as->answer !!}</td>
                                    <td align="center">{{ date("Y-m-d H:i:s",$as->create_time) }}</td>
                                    <td align="center">
                                        <div class="btn-group">
                                            <a _rel="popup" class="btn btn-primary" href="{{ url('/admin/server/'.$as->id.'/editAS')  }}" _title="{{ '编辑内容' }}" _height="760" _width="1100"><i class="fa fa-pencil fa-fw"></i>&nbsp;{{ '编辑' }}</a>
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                <span class="fa fa-caret-down"></span></a>
                                            <ul class="dropdown-menu">
                                                <li ><a _rel="confirm" href="{{ url('/admin/server/'.$as->id.'/delAS')  }}" _title="{{ '删除数据' }}" ><i class="fa fa-trash-o fa-fw"></i>&nbsp;{{ '删除' }}</a></li>
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
            {!! $as_list->render() !!}
        </div>
    </div>
@stop