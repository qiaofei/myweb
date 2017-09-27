@extends('admin')
@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$title}}</b></h3>
            <div class="box-tools">
                <a _rel="popup" href="{{ route('admin.server.title.create') }}" class="btn btn-primary fa fa-plus" _title="{{ '新增标题' }}" _height="230" _width="620">&nbsp;{{ '新增' }}</a>
            </div>
        </div>

        <div id="search_b"></div>
        <div class="box-body ">
            <div class="t_mail" id="t_mail0">
                <div class="t_body">
                    <table class="table_screen" id="table_screen" style="display: none;">
                        <thead id="table_screen1">
                        <tr class="tr1">
                            <th class="first_col">{{ 'ID' }}</th>
                            <th width="80%">{{ '归属问题标题' }}</th>
                            <th width="20%">{{ '操作' }}</th>
                        </tr>
                        </thead>
                    </table>
                    <table class="scroll_table table table-hover">
                        <thead id="table_screen0">
                        <tr class="tr1">
                            <th class="first_col">{{ 'ID' }}</th>
                            <th width="80%">{{ '归属问题标题' }}</th>
                            <th width="20%">{{ '操作' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($title_list)>0)
                            @foreach ($title_list as $key=>$title)
                            <tr >
                                <td class="first_col">{{ $title->id }}</td>
                                <td align="center">{{ $title->title }}</td>
                                <td align="center">
                                    <a _rel="popup" href="{{ url('/admin/server/title/'.$title->id.'/edit') }}" class="btn btn-primary fa fa-edit" _title="{{ '编辑标题' }}" _height="230" _width="620">&nbsp;{{ '编辑' }}</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr >
                                <td colspan="3" class="empty" align="center">{{ '没有符合条件的记录' }}</td>
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
            {!! $title_list->render() !!}
        </div>
    </div>
@stop