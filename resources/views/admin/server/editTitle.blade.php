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
            {!! Form::open( ['url' => route("admin.server.title.update",$title_info->id), 'method' => 'put'] )  !!}

            <div class="form-group">
                <label class="p2">{{ '归属问题标题' }}</label>
                <div class="col-md-6">
                    {!! Form::text('title',$title_info->title,['class'=>"form-control int1",'Required'=>true]) !!}
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