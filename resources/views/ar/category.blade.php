@extends('layouts.arabic')

@section('title', $items[0]->category_ar .' - '. $product_ar->name)

@section('content')
<div class="products page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / 
                    <a href="{{ route('products-ar', $product )}}">{{ $product_ar->name }}</a> / {{ $items[0]->category_ar }} </h1>
            </div>
        </div>
        @foreach ($items->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $item)
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a href="{{ route('item-ar', ['product' => $product, 'category' => $category, 'item' => $item->model] )}}">
                        @if (Illuminate\Support\Str::endsWith($item->model, '.'))
                        <img src="{{asset('images/'.$product.'/'. str_replace('.','',$item->model) .'/small_'.$item->model.'.jpg' )}}">
                        @else
                        <img src="{{asset('images/'.$product.'/'. $item->model .'/small_'.$item->model.'.jpg' )}}">
                        @endif
                        <span class="over_lay"></span>
                        <p>{{ $item->model_ar }}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection