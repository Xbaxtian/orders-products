@extends('layouts.app')

@section('content')

    <div class="" id="app">
        <prepare-order-wizard :data = "{{ json_encode([
                                                            'product'=>$product,
                                                            'vendor' =>$product->user
                                                            ]) }}"
                                :route = "'{{ route('client.submit_order') }}'"
        >
        </prepare-order-wizard>
    </div>
@endsection
