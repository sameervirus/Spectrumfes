@extends('layouts.new')

@section('title', app()->getLocale() == 'en' ? TitleWords($product->product) : $product->name)

@section('content')

@include('layouts.breadcrumbs', ['active' => app()->getLocale() == 'en' ? TitleWords($product->product) : $product->name])

<!-- Services 2-->
<section class="section section-lg bg-default">
<div class="container">

    <div class="row">
      @foreach ($categories as $category)
      <div class="col-md-4">
        <!-- Thumbnail Classic-->
        <article class="thumbnail thumbnail-classic thumbnail-lg">
            <a class="thumbnail-classic-figure" href="{{ route('new_category', ['locale'=>app()->getLocale(),'product' => $product->product, 'category' => $category->category ] )}}">
                @if (Illuminate\Support\Str::endsWith($category->model, '.'))
                <img src="{{asset('images/'.$product->product.'/'. str_replace('.','',$category->model) .'/small_'.$category->model.'.jpg' )}}" alt="" width="570" height="299">
                @else
                <img src="{{asset('images/'.$product->product.'/'. $category->model .'/small_'.$category->model.'.jpg' )}}" alt="" width="570" height="299">
                @endif
            </a>
          <div class="thumbnail-classic-caption">
            <h6 class="thumbnail-classic-title"><a href="{{ route('new_category', ['locale'=>app()->getLocale(),'product' => $product->product, 'category' => $category->category ] )}}">{{ app()->getLocale() == 'en' ? strtoupper(str_replace('_',' ',str_replace('-',' ',$category->category))) : $category->category_ar }}</a></h6>
          </div>
        </article>
      </div>
      @endforeach
    </div>
</div>
</section>

@endsection