@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Your order has been sended</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center h3">
                <strong>Code:</strong> 0000{{$order->id}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center h3">
                <a href="{{ url('/'.Auth::user()->role->name) }}">Go Home</a>
            </div>
        </div>
    </div>

@endsection
