@extends('layouts.new')

@section('title', __('Our Partners'))

@section('content')

@include('layouts.breadcrumbs', ['active' => __('Our Partners')])

<section class="section section-sm bg-default text-md-left">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <h4>{{ __('Our Partners') }}</h4>
          <!-- Bootstrap tabs-->
          <div class="tabs-custom tabs-vertical tabs-line" id="tabs-2">
            <!-- Nav tabs-->
            <ul class="nav nav-tabs list-category">
                @foreach ($products as $product)
                <li class="nav-item list-category-item" role="presentation"><a class="nav-link {{ $loop->index == 0 ? 'active' :'' }}" href="#{{$product->product}}" data-toggle="tab">{{app()->getLocale() == 'en' ? title_case($product->product) : $product->name }}</a></li>
                @endforeach
            </ul>
            <!-- Tab panes-->
            <div class="tab-content">
                @foreach ($products as $product)
                  <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' :'' }}" id="{{$product->product}}">
                    <div class="row row-50 flex-xl-row-reverse">
                      <div class="col-xl-3">
                        <article class="team-classic"><a class="team-classic-figure" href="{{ route('new_products', [app()->getLocale(), $product->product] )}}"><img src="{{asset('images/products/'. $product->product . '.png' )}}" alt="" width="270" height="182"></a>
                        </article>
                      </div>
                      <div class="col-xl-9">
                        <a href="{{ route('new_products', [app()->getLocale(), $product->product] )}}"><h3>{{app()->getLocale() == 'en' ? TitleWords($product->product) : $product->name}}</h3></a>
                        {{ app()->getLocale() == 'ar' ? $product->ar_desc : $product->en_desc }}
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection