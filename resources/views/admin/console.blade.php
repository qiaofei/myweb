@extends('admin')

@section('content')
  <div class='box'>
    <div class="box-header with-border" id="box-header">
      <h3 class="box-title"><b>{{$title}}</b></h3>
      <div class="box-tools">
        <a _rel="popup" href="{{ url('platform/create') }}" class="btn btn-primary fa fa-plus" _title="{{ '新增分平台账号' }}" _height="456" _width="520">&nbsp;{{ '新增' }}</a>
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
              <th >{{ '标识符' }}</th>
              <th width="20%">{{ '名称' }}</th>
              <th width="20%">{{ '域名地址' }}</th>
              <th >{{ '创建时间' }}</th>
              <th width="30%">{{ 'Token' }}</th>
              <th >{{ '状态' }}</th>
              <th class="last_col">{{ '操作' }}</th>
            </tr>
            </thead>
          </table>
          <table class="scroll_table table table-hover">
            <thead id="table_screen0">
            <tr class="tr1">
              <td class="first_col"></td>
              <th >{{ '标识符' }}</th>
              <th width="20%">{{ '名称' }}</th>
              <th width="20%">{{ '域名地址' }}</th>
              <th >{{ '创建时间' }}</th>
              <th width="35%">{{ 'Token' }}</th>
              <th >{{ '状态' }}</th>
              <th class="last_col">{{ '操作' }}</th>
            </tr>
            </thead>

            <!--
            <tbody>

            </tbody>
            -->


          </table>
        </div>
      </div>
    </div>


  </div>
  <div class="box-footer ding clearfix">
    <div class="pull-right">
      {{--{!! $platform_list->render() !!}--}}
    </div>
  </div>
@stop