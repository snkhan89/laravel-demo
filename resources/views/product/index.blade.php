@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            <div class="panel panel-default">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="panel-heading">
                    <h4>Product Listing <a href="{{route('product.create')}}" class="btn btn-default pull-right">Add</a></h4>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="10%">Title</th>
                            <th width="10%">Category Name</th>
                            <th width="30%">Image</th>
                            <th width="10%">Price</th>
                            <th width="20%">Action</th>
                        </tr>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->cat_name }}</td>
                                <td><img src="{{ URL::to('/') }}/uploads/{{ $row->image }}" class="img-thumbnail" width="300" /></td>
                                <td>{{ $row->price }}</td>
                                <td>
                                    <a href="{{route('product.edit',$row->id)}}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{{route('product.show',$row->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $data->links() !!}
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
