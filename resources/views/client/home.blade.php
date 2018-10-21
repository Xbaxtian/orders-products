@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in as a Client!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <th>Vendor</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Currency</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                        @foreach ($vendor->products as $product)
                            <tr>
                                <td>{{$vendor->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->currency}}</td>
                                <td>{{$product->description}}</td>
                                <td><a href="#" class="btn btn-primary">Order</a></td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
