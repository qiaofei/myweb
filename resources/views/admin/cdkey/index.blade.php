@extends('admin')

@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$title}}</b></h3>
            <div class="box-tools">
                <a _rel="popup" href="{{ url('admin/cdkey/create') }}" class="btn btn-primary fa fa-plus" _title="{{ '新增分平台账号' }}" _height="456" _width="520">&nbsp;{{ '新增' }}</a>
            </div>
        </div>
        <div class="search_b" id="search_b">
            {!! Form::open( ['url'=>'/admin/']) !!}
            {!! Form::text('serial',empty($serial)?'':$serial,['placeholder'=>'序列号']) !!}
            &nbsp;&nbsp;
            {{'批量ID查询'}}
            &nbsp;&nbsp;
            {!! Form::text('ids',empty($ids)?'':$ids,['placeholder'=>'序列号对应ID，用","隔开']) !!}
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
                            <th width="20%">{{ '序列号' }}</th>
                            <th width="20%">{{ '礼包' }}</th>
                            <th width="20%">{{ '有效开始时间' }}</th>
                            <th width="20%">{{ '有效结束时间' }}</th>
                            <th width="20%">{{ '使用状态' }}</th>
                        </tr>
                        </thead>
                    </table>
                    <table class="scroll_table table table-hover">
                        <thead id="table_screen0">
                        <tr class="tr1">
                            <td class="first_col"></td>
                            <th width="20%">{{ '序列号' }}</th>
                            <th width="20%">{{ '礼包' }}</th>
                            <th width="20%">{{ '有效开始时间' }}</th>
                            <th width="20%">{{ '有效结束时间' }}</th>
                            <th width="20%">{{ '使用状态' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($key_list)>0)
                        @foreach ($key_list as $key=>$row)
                            <tr >
                                <td class="first_col">{{ $key+1 }}</td>
                                <td align="center">{{ $row->serial }}</td>
                                <td align="center">{{ $shop_list[$row->shop_id] }}</td>
                                <td align="center">{{ date("Y-m-d H:i:s",$row->start_time) }}</td>
                                <td align="center">{{ date("Y-m-d H:i:s",$row->expire_time) }}</td>
                                <td align="center">{{ $use_state[$row->use_state] }}</td>
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
            {!! $key_list->render() !!}
        </div>
    </div>
@stop