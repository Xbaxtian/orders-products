@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

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
