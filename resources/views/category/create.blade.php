@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            <div class="panel panel-default">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-heading">
                    <h4>Add Category <a href="{{route('category.index')}}" class="btn btn-default pull-right">Back</a></h4>

                </div>

                <div class="panel-body">
                    <form method="post" action="{{ route('category.store') }}" data-parsley-validate>

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 text-right">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control input-lg" required />
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group text-center">
                            <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
