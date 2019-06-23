@extends('layouts.products')

@section('title', 'All Products')

@section('page_title', 'All Products')

@section('content')
    @if (!empty($products))
    @foreach ($products as $product)
    <div class="col-sm-4 each-product">
        <div class="card">
            <a href="{{ route('single_product', ['id' => $product->id]) }}">
                <img src="{{url('/images/dummy.png')}}" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
                <a href="{{ route('single_product', ['id' => $product->id]) }}">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                </a>
                <p class="card-text">{{$symbol}}{{$product->amount}}</p>
                <a href="{{ route('add_to_cart', ['id' => $product->id]) }}" class="btn btn-primary">Add To Cart</a>
            </div>
        </div>
    </div>
    @endforeach
    @endif
@endsection
