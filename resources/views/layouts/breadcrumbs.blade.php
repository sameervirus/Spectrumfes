<!-- Breadcrumbs -->
<section class="bg-gray-7">
  <div class="breadcrumbs-custom box-transform-wrap context-dark">
    <div class="container">
      <h3 class="breadcrumbs-custom-title">{{ $active }}</h3>
      <div class="breadcrumbs-custom-decor"></div>
    </div>
    <div class="box-transform" style="background-image: url({{ asset('new/images/bg-typography.jpg') }});"></div>
  </div>
  <div class="container">
    <ul class="breadcrumbs-custom-path">
      <li><a href="{{ route('new_home', app()->getLocale()) }}">{{ __('Home') }}</a></li>
      @if(@$first)
      <li><a href="{{ route('new_products', ['locale'=>app()->getLocale(), 'partner'=>$first_slug] )}}">{{$first}}</a></li>
      @endif
      @if(@$second && @$first)
      <li><a href="{{ route('new_category', ['locale'=> app()->getLocale(), 'product' => $first_slug, 'category' => $second_slug ] )}}">{{$second}}</a></li>
      @endif
      <li class="active">{{ $active }}</li>
    </ul>
  </div>
</section>