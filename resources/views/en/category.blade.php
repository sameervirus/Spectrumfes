@extends('layouts.website')

@section('title', ucwords(str_replace('_',' ',str_replace('-',' ',$category))) .' - '. ucwords(str_replace('_',' ',str_replace('-',' ',$product))))

@section('content')
<div class="products page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / 
                    <a href="{{ route('products', $product )}}">{{ucwords(str_replace('_',' ',str_replace('-',' ',$product)))}}</a> / {{ucwords(str_replace('_',' ',str_replace('-',' ',$category)))}} </h1>
            </div>
        </div>
        @foreach ($items->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $item)
            <div class="col-md-3">
                <div class="vendor">
                    <a href="{{ route('item', ['product' => $product, 'category' => $category, 'item' => $item->model] )}}">
                        @if (ends_with($item->model, '.'))
                        <img src="{{asset('images/'.$product.'/'. str_replace('.','',$item->model) .'/small_'.$item->model.'.jpg' )}}">
                        @else
                        <img src="{{asset('images/'.$product.'/'. $item->model .'/small_'.$item->model.'.jpg' )}}">
                        @endif
                        <span class="over_lay"></span>
                        <p>{{ strtoupper(str_replace('_',' ',str_replace('-',' ',$item->model)))}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection