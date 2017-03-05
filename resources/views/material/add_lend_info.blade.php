@extends('app')
@section('content')
    <h1>{{$material->name}}</h1>
    <h4>剩余数量：{{$material->available}}</h4>
    <h2>增加借出记录</h2>
    {!! Form::open(['url'=>'/material/lend'])!!}
    <input type="hidden" name='name' value="{{$material->name}}">
    <input type="hidden" name='redirect' value="{{$material->id}}">
    {{--借给单位--}}
    <div class="form-group">
        {!! Form::label('lend_to', '借给:') !!}
        {!! Form::text('lend_to', null, [
        'class' => 'form-control' ,
        'id'=>'lend_to',
        'placeholder'=>'',
        ]) !!}
    </div>
    {{--输入联系人电话--}}
    <div class="form-group">
        {!! Form::label('lend_contact', '联系电话:') !!}
        {!! Form::text('lend_contact', null, [
        'class' => 'form-control' ,
        'id'=>'lend_contact',
        'placeholder'=>'',
        ]) !!}
    </div>
    {{--输入数量--}}
    <div class="form-group">
        {!! Form::label('lend_num', '数量:') !!}
        {!! Form::text('lend_num', null, [
        'class' => 'form-control' ,
        'id'=>'lend_num',
        'placeholder'=>'',
        ]) !!}
    </div>
    {{--预计归还时间,默认七天以后--}}
    <div class="form-group">
        {!! Form::label('should_return_time', '预计归还时间:') !!}
        {!! Form::date('should_return_time', null, [
        'class' => 'form-control' ,
        'id'=>'should_return_time',
        'placeholder'=>'',
        ]) !!}
    </div>
    {{--输入经手人--}}
    <div class="form-group">
        {!! Form::label('lend_from', '经手人:') !!}
        {!! Form::text('lend_from', null, [
        'class' => 'form-control' ,
        'id'=>'lend_from',
        'placeholder'=>'',
        ]) !!}
    </div>
    {{--输入经手人电话--}}
    <div class="form-group">
        {!! Form::label('lend_form_contact', '经手人电话:') !!}
        {!! Form::text('lend_from_contact', null, [
        'class' => 'form-control' ,
        'id'=>'lend_from_contact',
        'placeholder'=>'',
        ]) !!}
    </div>
    {{--输入备注--}}
    <div class="form-group">
        {!! Form::label('note', '备注:') !!}
        {!! Form::text('note', null, ['class' => 'form-control' ,'id'=>'note','placeholder'=>'']) !!}
    </div>
    {!! Form::submit('添加',['class'=> 'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
    @stop
