@extends('admin')

@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$title}}</b></h3>
            <div class="box-tools">
                {{--<a _rel="popup" href="{{ url('admin/cdkey/create') }}" class="btn btn-primary fa fa-plus" _title="{{ '新增分平台账号' }}" _height="456" _width="520">&nbsp;{{ '新增' }}</a>--}}
            </div>
        </div>

        <div id="search_b"></div>
        <div class="box-body ">
            <div class="t_mail" id="t_mail0">
                <div class="t_body">
                    <table class="table_screen" id="table_screen" style="display: none;">
                        <thead id="table_screen1">
                        <tr class="tr1">
                            <td class="first_col"></td>
                            <th width="30%">{{ '名称' }}</th>
                            <th width="30%">{{ '操作内容' }}</th>
                            <th width="30%">{{ '记录时间' }}</th>
                        </tr>
                        </thead>
                    </table>
                    <table class="scroll_table table table-hover">
                        <thead id="table_screen0">
                        <tr class="tr1">
                            <td class="first_col"></td>
                            <th width="20%">{{ '名称' }}</th>
                            <th width="50%">{{ '操作内容' }}</th>
                            <th width="20%">{{ '记录时间' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($log_list)>0)
                            @foreach ($log_list as $key=>$row)
                                <tr >
                                    <td class="first_col">{{ $key+1 }}</td>
                                    <td align="center">{{ $row->admin_name }}</td>
                                    <td >{{ $row->operation }}</td>
                                    <td align="center">{{ date("Y-m-d H:i:s",$row->time) }}</td>
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
            {!! $log_list->render() !!}
        </div>
    </div>
@stop