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
                    <h4>Order Listing</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="10%">Invoice No.</th>
                            <th width="30%">Customer Details</th>
                            <th width="10%">Category</th>
                            <th width="20%">Product Title</th>
                            <th width="10%">Price</th>
                            <th width="10%">Created On</th>
                        </tr>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->invoice_no }}</td>
                                <td>
                                    <span>Name: {{ $row->name }}</span><br/>
                                    <span>Email: {{ $row->email }}</span><br/>
                                    <span>Mobile: {{ $row->mobile }}</span>
                                </td>
                                <td>{{ $row->cat_name }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->created_at }}</td>
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
