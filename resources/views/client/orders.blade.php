@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Code</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->orders as $order)
                            <tr>
                                <td>000{{$order->id}}</td>
                                <td>{{ucfirst($order->product->name)}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->product->price}} {{$order->product->currency}}</td>
                                <td>{{$order->total}} {{$order->product->currency}}</td>
                                <td><a href="#" class="btn btn-dark"> <i class="far fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
