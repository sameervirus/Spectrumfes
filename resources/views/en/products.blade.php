@extends('layouts.website')

@section('title', ucwords(str_replace('_',' ',str_replace('-',' ',$product))))

@section('content')
<div class="products page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / {{ucwords(str_replace('_',' ',str_replace('-',' ',$product)))}}</h1>
            </div>
        </div>
        @foreach ($categories->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $category)
            <div class="col-md-3">
                <div class="vendor">
                    <a href="{{ route('category', ['product' => $product, 'category' => $category->category ] )}}">
                        @if (ends_with($category->model, '.'))
                        <img src="{{asset('images/'.$product.'/'. str_replace('.','',$category->model) .'/small_'.$category->model.'.jpg' )}}">
                        @else
                        <img src="{{asset('images/'.$product.'/'. $category->model .'/small_'.$category->model.'.jpg' )}}">
                        @endif
                        <span class="over_lay"></span>
                        <p>{{ strtoupper(str_replace('_',' ',str_replace('-',' ',$category->category)))}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection