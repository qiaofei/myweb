@extends('admin')
@section('content')
    <div class='box'>

        <div class="box-header with-border" id="box-header">
            <h3 class="box-title"><b>{{$title}}</b></h3>
            <div class="box-tools">
            </div>
        </div>
        <div >
            {!! Form::open( ['url' => route("admin.news.update",$news_info->id), 'method' => 'put'] )  !!}

            <div class="form-group">
                <label class="p2">{{ '发布时间' }}</label>
                <div class="col-md-6">
                    {!! Form::text('create_time',date('Y-m-d',$news_info->create_time),['class'=>"laydate-icon",'id'=>"start",'onclick'=>"beforedate()"]) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="p2">{{ '标题' }}</label>
                <div class="col-md-6">
                    {!! Form::text('title',empty($news_info->title)?'':$news_info->title,['class'=>"form-control",'Required'=>true]) !!}&nbsp;
                </div>
            </div>

            <div class="form-group">
                <label>{{ '内容' }}</label>
                <div class="editor">
                    @include('editor::head')
                    {!! Form::textarea('content', empty($news_info->content)?'':$news_info->content, ['class' => 'form-control','id'=>'myEditor']) !!}
                </div>
            </div>
            <div class="form-group row rows">
                <div class="col-md-4">
                <span class="btn-space">
                    {!! Form::submit('提交',['class'=>'btn btn-primary','id'=>'yes']) !!}
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