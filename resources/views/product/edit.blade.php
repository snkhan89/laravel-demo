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
                    <h4>Edit Product <a href="{{route('product.index')}}" class="btn btn-default pull-right">Back</a></h4>

                </div>

                <div class="panel-body">
                    <form method="post" action="{{ route('product.update',$data->id) }}" data-parsley-validate enctype="multipart/form-data">

                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="col-md-4 text-right">Select Category</label>
                            <div class="col-md-8">
                                <select name="category_id" id="category_id" required class="form-control">
                                    <option value="">Select</option>
                                    @foreach($cat_data as $c_data)
                                        <option value="{{$c_data->id}}" @if($c_data->id == $data->category_id) selected @endif>{{$c_data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group">
                            <label class="col-md-4 text-right">Title</label>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control input-lg" required value="{{$data->title}}" />
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group">
                            <label class="col-md-4 text-right">Select Product Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control" accept="image/*" />
                                <img src="{{ URL::to('/') }}/uploads/{{ $data->image }}" class="img-thumbnail" width="100" />
                                <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group">
                            <label class="col-md-4 text-right">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" rows="2" cols="90" class="form-control" required>{{$data->description}}</textarea>
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group">
                            <label class="col-md-4 text-right">Price</label>
                            <div class="col-md-8">
                                <input type="text" required name="price" class="form-control" data-parsley-pattern="^\d+(\.\d{1,2})?$" value="{{$data->price}}">
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group text-center">
                            <input type="submit" name="add" class="btn btn-primary input-lg" value="Edit" />
                        </div>
                    </form>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
