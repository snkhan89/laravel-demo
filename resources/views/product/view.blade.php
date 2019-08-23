@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>View Product <a href="{{route('product.index')}}" class="btn btn-default pull-right">Back</a></h4>

                </div>

                <div class="panel-body">

                    <img src="{{ URL::to('/') }}/uploads/{{ $data->image }}" class="img-thumbnail" />
                    <h3>Title - {{ $data->title }} </h3>
                    <h3>Description - {{ $data->description }}</h3>
                    <h3>Price - {{ $data->price }}</h3>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
