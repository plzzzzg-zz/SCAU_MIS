@extends('app')
@section('search')
    {{--<div>--}}
        {{--<form class="navbar-form navbar-left" role="search">--}}
            {{--<div class="form-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search">--}}
            {{--</div>--}}
            {{--<button type="submit" class="btn btn-default">提交</button>--}}
        {{--</form>--}}
    {{--</div>--}}
    @endsection
@section('content')
    <h1>概览</h1>
    <span class="pull-right"><a href="{{url('/material/add')}}"><button class="btn">create</button></a></span>
    <hr>
    <table class="table-responsive table table-striped">
        <thead>
            <th>名称</th>
            <th>存放位置</th>
            <th>总数量</th>
            <th>可借数量</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($materials as $material)
                <tr>
                    <td><a href="{{action('MaterialController@detail',[$material->id])}}">{{$material->name}}</a></td>
                    <td>{{$material->place}}</td>
                    <td>{{$material->total}}</td>
                    <td>{{$material->available}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
@stop

