@extends('admin')
@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$disclaimer_info->title}}</b></h3>
            <div class="box-tools">
                <a  href="{{ url('admin/declare/1/editDisclaimer') }}" class="btn btn-primary fa fa-edit"  _height="760" _width="1100">&nbsp;{{ '编辑' }}</a>
            </div>
        </div>
        <div >
            {!! EndaEditor::MarkDecode($disclaimer_info->content) !!}
        </div>
        <div id="search_b"></div>
        <div class="box-body ">
            <div class="t_mail" id="t_mail0">
                <div class="t_body">

                </div>
            </div>
        </div>
    </div>
@stop