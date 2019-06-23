@extends('layouts.products')

@section('title', 'Cart')

@section('page_title', 'Cart')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Details</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cart as $key => $eachItem)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$eachItem['item']['product_name']}}</td>
                <td>{{$eachItem['qty']}}</td>
                <td>{{$symbol}}{{$eachItem['price']}}</td>
            </tr>
        @endforeach
            <tr>
                <th scope="row" colspan="3">Total: </th>
                <td>{{$symbol}}{{$totalPrice}}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
@endsection
