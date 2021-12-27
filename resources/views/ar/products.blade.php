@extends('layouts.arabic')

@section('title', $product_ar->name)

@section('content')
<div class="products page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / {{$product_ar->name}}</h1>
            </div>
        </div>
        @foreach ($categories->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $category)
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a href="{{ route('category-ar', ['product' => $product, 'category' => $category->category ] )}}">
                        @if (Illuminate\Support\Str::endsWith($category->model, '.'))
                        <img src="{{asset('images/'.$product.'/'. str_replace('.','',$category->model) .'/small_'.$category->model.'.jpg' )}}">
                        @else
                        <img src="{{asset('images/'.$product.'/'. $category->model .'/small_'.$category->model.'.jpg' )}}">
                        @endif
                        <span class="over_lay"></span>
                        <p>{{ $category->model_ar }}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection