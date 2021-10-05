<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title') | {{ $site_content['title'] . ' - ' . str_limit($site_content['description'], 33 ) }}</title>
    <meta name="author" content="RainDesigner.com">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ $site_content['title'] }}" />
    <meta property="og:type" content="Equipment and Tools" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:description" content="{{ $site_content['description'] }}" />
    <meta property="og:image" content="{{url('images/photo.png')}}" />

    <link rel="icon" type="image/png" href="{{ asset('images/'. $site_content['favicon']) }}">

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- fancybox -->
    <link href="{{asset('vendors/fancybox-2.1.7/source/jquery.fancybox.css')}}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo+2|Open+Sans" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114909180-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date()); 

      gtag('config', 'UA-114909180-1');
    </script>



    @yield('cssFiles', '')

    <!-- Custom Style -->
    <link href="{{asset('css/style.css')}}?v={{time()}}" rel="stylesheet">
    <link href="{{asset('css/arabic.css')}}?v={{time()}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}?v={{time()}}" rel="stylesheet">
  </head>
  <body>
    {{ Visitor::log() }}
<div class="site_structure">
    <div class="lang">
        <div class="rawimages">
            <span><a href="{{route('home')}}">
                <img src="{{asset('images/en.png')}}" alt="English (United Kingdom)" title="English (United Kingdom)"></a>
            </span>
            <span><a href="#"><img src="{{asset('images/ar.png')}}" alt="Arabic - Egypt" title="Arabic - Egypt"></a></span>
        </div>
    </div>
    <header id="main-header">
        <div class="container">
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('images/' . $site_content['logo'] )}}" alt="{{ $site_content['title'] }}" id="logo">
                </a>
            </div>
            <div class="menu">
                <ul id="nav">
                    <li><a href="{{route('home-ar')}}" class="{{ $page == 'home' ? 'active' : '' }}">الرئيسية</a></li>
                    <li class="have-sub">
                        <a href="#" class="{{ $page == 'products' ? 'active' : '' }}">المنتجات</a>
                        <ul class="sub-menu">
                            @foreach($products as $product)
                                <li class="have-sub">
                                    <a href="{{ route('products-ar', $product->product )}}">{{$product->name}}</a>
                                    <ul class="sub-menu">
                                    @foreach(\App\Admin\Products\Product::get_category($product->product) as $category)
                                        <li><a href="{{ route('category-ar', ['product' => $product->product, 'category' => $category->category ] )}}">{{$category->category_ar}}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('solutions-ar')}}" class="{{ $page == 'solutions' ? 'active' : '' }}">الحلول</a></li>
                    <li><a href="{{route('partners-ar')}}" class="{{ $page == 'partners' ? 'active' : '' }}">الشركاء</a></li>
                    <li><a href="{{route('career-ar')}}" class="{{ $page == 'career' ? 'active' : '' }}">الوظائف</a></li>
                    <li><a href="{{route('about-ar')}}" class="{{ $page == 'about' ? 'active' : '' }}">عن الشركة</a></li>
                    <li><a href="{{route('contacts-ar')}}" class="{{ $page == 'contacts' ? 'active' : '' }}">الاتصال بنا</a></li>
                </ul>
                <div class="search">
                    <i class="fa fa-search"></i>
                </div>
                <div id="nav-mobile">
                    <span class="select_page">@yield('title')</span>
                    <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
                    <ul id="mobile_nav">
                        <li><a href="{{route('home-ar')}}">الرئيسية</a></li>
                        <li class="have-sub"><a href="#">المنتجات</a>
                            <ul class="sub-menu">
                                @foreach($products as $product)
                                <li class="have-sub">
                                    <a href="{{ route('products-ar', $product->product )}}">{{strtoupper(str_replace('_',' ',$product->name))}}</a>
                                    <ul class="sub-menu">
                                    @foreach(\App\Admin\Products\Product::get_category($product->product) as $category)
                                        <li><a href="{{ route('category-ar', ['product' => $product->product, 'category' => $category->category ] )}}">{{$category->category_ar}}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('solutions-ar')}}">الحلول</a></li>
                        <li><a href="{{route('partners-ar')}}">الشركاء</a></li>
                        <li><a href="{{route('career-ar')}}">الوظائف</a></li>
                        <li><a href="{{route('about-ar')}}">عن الشركة</a></li>
                        <li><a href="{{route('contacts-ar')}}">الاتصال بنا</a></li>
                    </ul>
                </div>              
            </div>            
            <div class="search-container">                
                <form role="search" method="get" class="et-search-form" action="">
                    <input type="search" class="search-input" placeholder="البحث عن" value="" name="q" title="Search for:">
                    <span class="search-close"><i class="fa fa-close"></i></span>
                </form>
            </div>
        </div>
    </header>
    <content id="content">
        @yield('content')
        <script>
          (function() {
            var cx = '010672991394334274590:emfddxuvsjg';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
          })();
        </script>
        <gcse:searchresults-only> 
    </content>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pull-right-desktop">
                    <h5>{{ $site_content['title'] }} @2018 جميع الحقوق محفوظة</h5>
                </div>
                <div class="col-md-6 pull-right-desktop text-left">
                    <ul class="soical-media">
                        @foreach ($site_content as $key => $value)

                            @if (starts_with($key,'social_') && @$value)
                                <li><a href="{{$value}}" class="fa fa-{{ str_replace('social_','',$key)}}" target="_blank"></a></li>
                            @endif

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Parallax -->
    <script src="{{asset('vendors/parallax.js-1.5.0/parallax.min.js')}}"></script>
    <!-- fancybox -->
    <script src="{{asset('vendors/fancybox-2.1.7/source/jquery.fancybox.js')}}"></script>

    @yield('jsFiles', '')

    <!-- Custom Style -->
    <script src="{{asset('js/website.js')}}"></script>
  </body>
</html>