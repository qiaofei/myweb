@extends('admin')
@section('content')
    <div class='box'>
        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$disclaimer_info->title}}</b></h3>
            <div class="box-tools">
            </div>
        </div>
        <div >
            {!! Form::open( ['url' => url("/admin/declare/1/storeDisclaimer"), 'method' => 'post'] )  !!}
            <div class="form-group">
                <div class="editor">
                    @include('editor::head')
                    {!! Form::textarea('content', empty($disclaimer_info->content)?'':$disclaimer_info->content, ['class' => 'form-control','id'=>'myEditor']) !!}

                </div>
            </div>
            <div class="form-group row rows">
                <div class="col-md-4">
                <span class="btn-space">
                    {!! Form::submit('提交',['class'=>'btn btn-primary','id'=>'yes']) !!}
                    {!! Form::button(' 关闭 ',['class'=>"btn btn-default",'id'=>'closewin']) !!}
                 </span>
                </div>
            </div>
            {!! Form::close() !!}
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