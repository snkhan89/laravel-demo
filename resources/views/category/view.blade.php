@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>View Category <a href="{{route('category.index')}}" class="btn btn-default pull-right">Back</a></h4>

                </div>

                <div class="panel-body">
                  <h3>Category Name - {{$data->name}}</h3>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
