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
                    <h4>Category Listing <a href="{{route('category.create')}}" class="btn btn-default pull-right">Add</a></h4>

                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="50%">Category Name</th>
                            <th width="30%">Action</th>
                        </tr>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <a href="{{route('category.edit',$row->id)}}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{{route('category.show',$row->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a>
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
