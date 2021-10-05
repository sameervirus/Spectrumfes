@extends('layouts.new')

@section('title', app()->getLocale() == 'en' ? TitleWords($items[0]->category) . '-' . TitleWords($product->product) : $items[0]->category_ar .'-'. $product->name)

@section('content')

@include('layouts.breadcrumbs', ['active' => app()->getLocale() == 'en' ? TitleWords($items[0]->category) : $items[0]->category_ar, 'first' => app()->getLocale() == 'en' ? TitleWords($product->product) : $product->name , 'first_slug' => $product->product])

<!-- Services 2-->
<section class="section section-lg bg-default">
<div class="container">

    <div class="row">
      @foreach ($items as $item)
      <div class="col-md-4">
        <!-- Thumbnail Classic-->
        <article class="thumbnail thumbnail-classic thumbnail-lg">
            <a class="thumbnail-classic-figure" href="{{ route('new_item', ['locale'=>app()->getLocale(),'product' => $product->product, 'category' => $item->category, $item->model ] )}}">
                @if (ends_with($item->model, '.'))
                <img src="{{asset('images/'.$product->product.'/'. str_replace('.','',$item->model) .'/small_'.$item->model.'.jpg' )}}" alt="" width="570" height="299">
                @else
                <img src="{{asset('images/'.$product->product.'/'. $item->model .'/small_'.$item->model.'.jpg' )}}" alt="" width="570" height="299">
                @endif
            </a>
          <div class="thumbnail-classic-caption">
            <h6 class="thumbnail-classic-title"><a href="{{ route('new_item', ['locale'=>app()->getLocale(),'product' => $product->product, 'category' => $item->category, $item->model ] )}}">{{ app()->getLocale() == 'en' ? strtoupper(str_replace('_',' ',str_replace('-',' ',$item->model))) : $item->model_ar }}</a></h6>
          </div>
        </article>
      </div>
      @endforeach
    </div>
</div>
</section>
@endsection