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
            {!! Form::open( ['url' => route('admin.cdkey.store'), 'method' => 'post'] )  !!}

            <div class="form-group">
                <label class="p2">{{ 'CDKEY 产生行数' }}</label>
                <div class="col-md-6">
                    {!! Form::text('key_row','',['class'=>"form-control small_text int1",'Required'=>true]) !!}&nbsp;
                    {{"建议一次生成少于100行"}}
                </div>
            </div>

            <div class="form-group">
                <label class="p2">{{ '礼包' }}</label>
                <div class="col-md-6">
                    {!!  Form::select('shop', $shop_list,'',['class'=>'selet1']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="p2">{{ '开始有效时间' }}</label>
                <div class="col-md-6">
                    {!! Form::text('start_time','',['class'=>"laydate-icon",'id'=>"start",'onclick'=>"beforedate()"]) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="p2">{{ '结束有效时间' }}</label>
                <div class="col-md-6">
                    {!! Form::text('expire_time','',['class'=>"laydate-icon",'id'=>"end",'onclick'=>"beforedate2()"]) !!}
                </div>
            </div>

        </div>
    </div>
    <div class="form-group row rows">
        <div class="col-md-4">
                <span class="btn-space">
                    {{--{!! Form::submit('提交',['class'=>'btn btn-primary','name'=>'submit','id'=>'yes']) !!}--}}
                    {!! Form::submit('提交',['class'=>'btn btn-primary','id'=>'yes']) !!}
                    {!! Form::button(' 关闭 ',['class'=>"btn btn-default",'id'=>'closewin']) !!}
                 </span>
        </div>
    </div>
    {!! Form::close() !!}
@endsection