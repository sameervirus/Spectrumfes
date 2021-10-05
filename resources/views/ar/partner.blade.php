@extends('layouts.arabic')

@section('title', 'الشركاء')

@section('content')

<div class="partners page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / الشركاء</h1>
            </div>
        </div>
        @foreach ($products as $product)
        <div class="row partner">
            <div class="col-md-4">
                <div class="product">
                    <a href="{{ route('products-ar', $product->product )}}">
                        <img src="{{asset('images/products/'. $product->product . '.png' )}}">
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="details">
                    <blockquote>
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->ar_desc}}</p>
                    </blockquote>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
        @endforeach
    </div>
</div>
@endsection