@extends('popup')
@section('content')
    <div class="box">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box-body">
            {!! Form::open( ['url' => url("/admin/server/faq/".$faq_info->id."/updateFaq"), 'method' => 'post'] )  !!}

            <div class="form-group">
                <label class="p2">{{ '归属问题标题' }}</label>
                <div class="col-md-6">
                    {!!  Form::select('title_id', $title_list, $faq_info->title_id,['class'=>'selet1']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="p2">{{ 'Question' }}</label>
                <div class="col-md-6">
                    {!! Form::text('question',$faq_info->question,['class'=>"form-control",'Required'=>true]) !!}&nbsp;
                </div>
            </div>

            <div class="form-group">
                <label>{{ 'Answer' }}</label>
                <div class="editor">
                    @include('editor::head')
                    {!! Form::textarea('answer', $faq_info->answer, ['class' => 'form-control','id'=>'myEditor']) !!}
                </div>
            </div>

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
@endsection