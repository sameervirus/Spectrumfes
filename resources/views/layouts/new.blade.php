<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
  <head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title') | {{ $site_content['title'] . ' - ' . Illuminate\Support\Str::limit($site_content['description'], 33 ) }}</title>
    <meta name="author" content="RainDesigner.com">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ $site_content['title'] }}" />
    <meta property="og:type" content="Equipment and Tools" />
    <meta property="og:url" content="{{route('new_home', app()->getLocale())}}" />
    <meta property="og:description" content="{{ $site_content['description'] }}" />
    <meta property="og:image" content="{{url('images/photo.png')}}" />

    <link rel="icon" href="{{ asset('images/'. $site_content['favicon']) }}" type="image/x-icon">

    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    

    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="new/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="new/js/html5shiv.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{ asset('new/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('new/css/fonts.css')}}">
    <link rel="stylesheet" href="{{ asset('new/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('new/css/custom.css')}}?v={{time()}}">
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('new/css/ar.css')}}?v={{time()}}">
    @endif

    @yield('cssFiles', '')

    {!! $site_content['header'] !!}

  </head>
  <body>
    {{ Visitor::log() }}
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
        </div>
      </div>
    </div>

<div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="150px" data-xl-stick-up-offset="150px" data-xxl-stick-up-offset="150px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer">
              <div class="rd-navbar-aside">
                <div class="rd-navbar-aside-inner">
                  <ul class="rd-navbar-contacts-2">
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                        <div class="unit-body"><a class="phone" href="tel:{{ $site_content['office_mob'] }}"><span>{{ $site_content['office_mob'] }}</span></a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                        <div class="unit-body"><a class="address" href="https://goo.gl/maps/mc3VhWFeZJgJooQPA" target="_blank">{{ $site_content['office_address'] }}</a></div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-share-2">
                    @foreach ($site_content as $key => $value)

                        @if (Illuminate\Support\Str::startsWith($key,'social_') && @$value)
                            <li><a class="icon mdi mdi-{{ str_replace('social_','',$key)}}" href="{{$value}}" target="_blank"></a></li>
                        @endif

                    @endforeach
                  </ul>
                  <ul class="list-share-2">
                    <li><a class="lang" href="/en/"><img src="{{ asset('images/en.png') }}"></a></li>
                    <li><a class="lang" href="/ar/"><img src="{{ asset('images/ar.png') }}"></a></li>
                  </ul>
                </div>
              </div>
              <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="{{ route('new_home', app()->getLocale()) }}"><img class="brand-logo-dark" src="{{asset('images/' . $site_content['logo'] )}}" alt="" /></a></div>
                </div>
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-aside d-xl-none">
                    <div class="rd-navbar-aside-inner">
                      <ul class="rd-navbar-contacts-2">
                        <li>
                          <div class="unit unit-spacing-xs">
                            <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                            <div class="unit-body"><a class="phone" href="tel:{{ $site_content['office_mob'] }}"><span>{{ $site_content['office_mob'] }}</span></a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-xs">
                            <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                            <div class="unit-body"><a class="address" href="https://goo.gl/maps/mc3VhWFeZJgJooQPA" target="_blank">{{ $site_content['office_address'] }}</a></div>
                          </div>
                        </li>
                      </ul>
                      <ul class="list-share-2">
                        @foreach ($site_content as $key => $value)

                            @if (Illuminate\Support\Str::startsWith($key,'social_') && @$value)
                                <li><a class="icon mdi mdi-{{ str_replace('social_','',$key)}}" href="{{$value}}" target="_blank"></a></li>
                            @endif

                        @endforeach
                      </ul>
                      <ul class="list-share-2">
                        <li><a class="lang" href="/en/"><img src="{{ asset('images/en.png') }}"></a></li>
                        <li><a class="lang" href="/ar/"><img src="{{ asset('images/ar.png') }}"></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="rd-navbar-main">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item {{ $page == 'home' ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('new_home', app()->getLocale()) }}">{{ __('Home') }}</a>
                      </li>
                      <li class="rd-nav-item {{ $page == 'products' ? 'active' : '' }}"><a class="rd-nav-link products-link" href="#">{{ __('Products') }}</a>
                        <!-- RD Navbar Dropdown-->
                        <ul class="rd-menu rd-navbar-dropdown">
                            @foreach($products as $product)
                            <li class="rd-dropdown-item rd-navbar--has-dropdown rd-navbar-submenu"><a class="rd-dropdown-link" href="{{ route('new_products', ['locale'=>app()->getLocale(), 'partner'=>$product->product] )}}">{{ app()->getLocale() == 'ar' ? $product->name : TitleWords($product->product) }}</a>
                                <ul class="rd-menu rd-navbar-dropdown">
                                    @foreach(\App\Admin\Products\Product::get_category($product->product) as $category)
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('new_category', ['locale'=> app()->getLocale(), 'product' => $product->product, 'category' => $category->category ] )}}">{{ app()->getLocale() == 'ar' ? $category->category_ar : TitleWords($category->category) }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                      </li>
                      <li class="rd-nav-item">
                        <a class="rd-nav-link" href="{{route('new_partners', app()->getLocale())}}">{{ __('Our Partners') }}</a>
                      </li>
                      <li class="rd-nav-item">
                        <a class="rd-nav-link" href="{{route('new_career', app()->getLocale())}}">{{ __('Jobs') }}</a>
                      </li>
                      <li class="rd-nav-item">
                        <a class="rd-nav-link" href="{{route('new_about', app()->getLocale())}}">{{ __('About us') }}</a>
                      </li>
                      <li class="rd-nav-item">
                        <a class="rd-nav-link" href="{{route('new_contacts', app()->getLocale())}}">{{ __('Contact us') }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      @yield('content')

      <!-- Page Footer-->
      <footer class="section footer-classic context-dark footer-classic-2">
        <div class="footer-classic-content">
          <div class="container">
            <div class="row row-50 row-lg-0 no-gutters">
              <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
                <div class="footer-classic-header">
                  <h6 class="footer-classic-title">{{ __('Quick links') }}</h6>
                </div>
                <div class="footer-classic-body">
                  <ul class="footer-classic-list d-inline-block d-sm-block">
                    <li><a href="{{ route('new_home', app()->getLocale()) }}">{{ __('Home') }}</a>
                      </li>
                    <li>
                        <a href="{{route('new_partners', app()->getLocale())}}">{{ __('Our Partners') }}</a>
                      </li>
                      <li>
                        <a href="{{route('new_career', app()->getLocale())}}">{{ __('Jobs') }}</a>
                      </li>
                      <li>
                        <a href="{{route('new_about', app()->getLocale())}}">{{ __('About us') }}</a>
                      </li>
                      <li>
                        <a href="{{route('new_contacts', app()->getLocale())}}">{{ __('Contact us') }}</a>
                      </li>
                  </ul>
                  <ul class="list-inline footer-social-list">
                    @foreach ($site_content as $key => $value)

                        @if (Illuminate\Support\Str::startsWith($key,'social_') && @$value)
                            <li><a class="icon mdi mdi-{{ str_replace('social_','',$key)}}" href="{{$value}}" target="_blank"></a></li>
                        @endif

                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".1s">
                <div class="footer-classic-header">
                  <div class="box-width-230">
                    <h6 class="footer-classic-title">{{ __('Get in touch') }}</h6>
                  </div>
                </div>
                <div class="footer-classic-body">
                  <div class="box-width-230">
                    <div class="footer-classic-contacts">
                      <div class="footer-classic-contacts-item">
                        <div class="unit unit-spacing-sm align-items-center">
                          <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                          <div class="unit-body"><a class="phone" href="tel:{{ $site_content['office_mob'] }}"><span>{{ $site_content['office_mob'] }}</span></a></div>
                        </div>
                      </div>
                      <div class="footer-classic-contacts-item">
                        <div class="unit unit-spacing-sm align-items-center">
                          <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                          <div class="unit-body"><a class="mail" href="mailto:{{ $site_content['email'] }}">{{ $site_content['email'] }}</a></div>
                        </div>
                      </div>
                    </div><a class="button button-sm button-primary button-winona" href="{{route('new_contacts', app()->getLocale())}}">{{ __('Contact us') }}</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 position-static">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.2633385030317!2d31.28503351511339!3d29.97186108190888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU4JzE4LjciTiAzMcKwMTcnMTQuMCJF!5e0!3m2!1sen!2seg!4v1593688222608!5m2!1sen!2seg" style="width: 100%; height: 100%;padding: 15px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-classic-panel">
          <div class="container">
            <!-- Rights-->
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>{{ $site_content['title'] }}</span><span>.&nbsp;</span><span> {{ __('Design by') }} <a href="https://www.raindesigner.com" target="_blank">RainDesigner.com</a></span></p>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>

    <script src="{{asset('new/js/core.min.js')}}"></script>
    <script src="{{asset('new/js/script.js')}}"></script>

    @yield('jsFiles', '')

    {!! $site_content['footer'] !!}

  </body>
</html>