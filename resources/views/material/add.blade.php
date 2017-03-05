@extends('app')
@section('content')
    <h1>增加品类</h1>
    {!! Form::open(['url'=>'/material'])!!}
        {{--输入名称--}}
        <div class="form-group">
            {!! Form::label('name', '名称:') !!}
            {!! Form::text('name', null, ['class' => 'form-control' ,'id'=>'name','placeholder'=>'']) !!}
        </div>
        {{--输入存放位置--}}
        <div class="form-group">
            {!! Form::label('place', '存放位置:') !!}
            {!! Form::text('place', null, ['class' => 'form-control' ,'id'=>'place','placeholder'=>'']) !!}
        </div>
        {{--输入所属单位--}}
        <div class="form-group">
            {!! Form::label('belongs_to', '所属单位:') !!}
            {!! Form::text('belongs_to', null, ['class' => 'form-control' ,'id'=>'belongs_to','placeholder'=>'']) !!}
        </div>
        {{--输入数量--}}
        <div class="form-group">
            {!! Form::label('total', '物资总数:') !!}
            {!! Form::number('total', null, ['class' => 'form-control' ,'id'=>'total','placeholder'=>'','min'=>'1']) !!}
        </div>
        {{--输入备注--}}
        <div class="form-group">
            {!! Form::label('note', '备注:') !!}
            {!! Form::text('note', null, ['class' => 'form-control' ,'id'=>'note','placeholder'=>'']) !!}
        </div>
        {!! Form::submit('添加',['class'=> 'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
    @stop