@extends('layouts.products')

@section('title', $product->product_name)

@section('page_title', $product->product_name)

@section('content')
    <row class="col-sm-6">
        <img src="{{url('/images/details_dummy.png')}}" alt="{{$product->product_name}}" class="img-fluid" />
    </row>
    <row class="col-sm-6">
        <strong>SKU: {{$product->product_sku}}</strong>
        <p>{{$product->product_description}}</p>
        <span>{{$symbol}}{{$product->amount}}</span>
        <p>Instock: {{$product->product_quantity}}</p>
        <button class="tn btn-primary">Add to cart</button>
    </row>
@endsection
