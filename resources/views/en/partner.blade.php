@extends('layouts.website')

@section('title', 'Partner')

@section('content')

<div class="partners page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home')}}">Home</a> / Our Partner</h1>
            </div>
        </div>
        @foreach ($products as $product)
        <div class="row partner" id="{{ $product->product }}">
            <div class="col-md-4">
                <div class="product">
                    <a href="{{ route('products', $product->product )}}">
                        <img src="{{asset('images/products/'. $product->product . '.png' )}}">
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="details">                    
                    <blockquote>
                        <a href="{{ route('products', $product->product )}}"><h3>{{ucwords(str_replace('_',' ',$product->product))}}</h3></a>
                        <p>{{$product->en_desc}}</p>
                        <p><a href="{{ route('products', $product->product )}}">View Products</a></p>
                    </blockquote>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
        @endforeach
    </div>
</div>
@endsection