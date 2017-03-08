@extends('app')
@section('content')
    <h1>{{$material->name}}</h1>


    <hr>
    <h3>Info:</h3>
    <table class="table-responsive table">
        {!! Form::open(['url'=>'/material/detail/edit'])!!}
        <tr>
            <td>所属单位：</td>
            <td>
                <input type="text" class="form-control fix" readOnly value={{$material->belongs_to}} name="belongs_to" id="belongs_to">
            </td>
        </tr>
        <tr>
            <td>存放位置：</td>
            <td>
                <input type="text" class="form-control fix" readOnly  value={{$material->place}} name="place" id="place">
            </td>
        </tr>
        <tr>
            <td>总量：</td>
            <td>
                <input type="text" class="form-control fix" readonly value={{$material->total}} name="total" id="total">
            </td>
        </tr>
        <tr>
            <td>可借数量：</td>
            <td>
            <input type="text" class="form-control " readonly value={{$material->available}} name="available" id="available">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name='id' value="{{$material->id}}">

                {!! Form::submit('修改',['class'=> 'btn btn-info form-control']) !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}
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
                    <td>
                        {!! Form::open(['url'=>'/material/detail/delete'])!!}
                            <input type="hidden" name='id' value="{{$material->id}}">
                            <input type="hidden" name='lend_id' value="{{$lend_info->id}}">
                            {!! Form::submit('删除记录',['class'=> 'btn btn-danger ']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h3>无借出记录</h3>
    @endif
    @endsection
    @section('js')
        <script language="JavaScript">
            $(document).ready(function Write() {
               $(".fix").click(function () {
                   $(this).removeAttr("readonly");
               })
            });
        </script>
@stop


