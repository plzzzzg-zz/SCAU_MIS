@extends('app')
@section('content')
    <h1>{{$material->name}}</h1>


    <hr>
    <h3>Info:</h3>
    <table class="table-responsive table">
        <tr>
            <td>所属单位：</td>
            <td>{{$material->belongs_to}}</td>
        </tr>
        <tr>
            <td>存放位置：</td>
            <td>{{$material->place}}</td>
        </tr>
        <tr>
            <td>总量：</td>
            <td>{{$material->total}}</td>
        </tr>
        <tr>
            <td>可借数量：</td>
            <td>{{$material->available}}</td>
        </tr>
    </table>
    <span class="">
        <a href="{{action('MaterialController@add_lend_info',[$material->id])}}">
            <button class="btn">增加记录</button>
        </a>
    </span>
    <hr>
    @if($lend_infos->contains('name',$material->name))

        <table class="table-responsive table">
            <thead>
            <td>借给</td>
            <td>联系电话</td>
            <td>经手人</td>
            <td>联系电话</td>
            <td>数目</td>
            <td>借出时间</td>
            <td>应还时间</td>
            <td>归还时间</td>
            <td>当前状态</td>
            <td>操作</td>
            </thead>
            @foreach($lend_infos as $lend_info )
                <tr>
                    <td>{{$lend_info->lend_to}}</td>
                    <td>{{$lend_info->lend_contact}}</td>
                    <td>{{$lend_info->lend_from}}</td>
                    <td>{{$lend_info->lend_from_contact}}</td>
                    <td>{{$lend_info->lend_num}}</td>
                    <td>{{$lend_info->lend_time}}</td>
                    <td>{{$lend_info->should_return_time}}</td>
                    <td>{{$lend_info->returned_time}}</td>
                    <td>{{$lend_info->status}}</td>
                    @if($lend_info->status=='未归还')
                    <td>
                        {!! Form::open(['url'=>'/material/return'])!!}
                            <input type="hidden" name='lend_num' value="{{$lend_info->lend_num}}">
                            <input type="hidden" name='name' value="{{$lend_info->name}}">
                            <input type="hidden" name='id' value="{{$material->id}}">
                            <input type="hidden" name='lend_id' value="{{$lend_info->id}}">
                            {!! Form::submit('确认归还',['class'=> 'btn  ']) !!}
                        {!! Form::close() !!}
                    </td>
                        @else
                        <td>
                            <button class="btn" disabled>
                               已归还
                            </button>
                        </td>
                        @endif
                </tr>
            @endforeach
        </table>
    @else
        <h3>无借出记录</h3>
    @endif
@stop


