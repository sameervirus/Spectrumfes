@extends('layouts.arabic')

@section('title', 'الرئيسية')

@section('content')

<div class="slider">
    <div class="parallax_bg" data-parallax="scroll" data-image-src="{{asset('images/photo.png')}}"></div>
    <div class="container slide_detail">
        <div class="slide_title animated flipInX">
            <span>تجربة خدمة متعددة الجنسيات بسعر المحلي</span>
        </div>
        <div class="slide_buttom">
            <a href="{{route('contacts-ar')}}" class="spical_button div_trans">الاتصال بنا</a>
        </div>
    </div>
</div>
<div class="vendors page h1home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="">شركائنا</h1>
            </div>
        </div>
        @foreach ($products->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $product)
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a href="{{ route('products-ar', $product->product )}}">
                        <img src="{{asset('images/products/'. $product->product . '.png' )}}">
                        <span class="over_lay"></span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection