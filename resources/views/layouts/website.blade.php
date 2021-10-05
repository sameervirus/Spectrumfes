<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title') | {{ $site_content['title'] . ' - ' . str_limit($site_content['description'],48) }}</title>
    <meta name="author" content="RainDesigner.com">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="{{ $site_content['title'] }}" />
    <meta property="og:type" content="Equipment and Tools" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:description" content="{{ $site_content['description'] }}" />
    <meta property="og:image" content="{{url('images/photo.png')}}?v=1" />

    <link rel="icon" type="image/png" href="{{ asset('images/'. $site_content['favicon']) }}">

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}?v=1" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}?v=1" rel="stylesheet">
    <!-- animate.css -->
    <link href="{{asset('vendors/animate.css/animate.min.css')}}?v=1" rel="stylesheet">
    <!-- fancybox -->
    <link href="{{asset('vendors/fancybox-2.1.7/source/jquery.fancybox.css')}}?v=1" rel="stylesheet">

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
    <link href="{{asset('css/responsive.css')}}?v={{time()}}" rel="stylesheet">
  </head>
  <body>
    {{ Visitor::log() }}
<div class="site_structure">    
    <header id="main-header">
        <div class="">
            <div class="logo col-md-2">
                <a href="{{route('home')}}">
                    <img src="{{asset('images/' . $site_content['logo'] )}}" alt="{{ $site_content['title'] }}" id="logo">
                </a>
            </div>
            <div class="lang col-md-1 hidden">
                <div class="rawimages">
                    <span><a href="#">
                        <img src="{{asset('images/en.png')}}" alt="English (United Kingdom)" title="English (United Kingdom)"></a>
                    </span>
                    <span><a href="{{route('home-ar')}}"><img src="{{asset('images/ar.png')}}" alt="Arabic - Egypt" title="Arabic - Egypt"></a></span>
                </div>
            </div>
            <div class="menu">                
                <ul id="nav">
                    <li><a href="{{route('home')}}" class="{{ $page == 'home' ? 'active' : '' }}">Home</a></li>
                    <li class="have-sub">
                        <a href="#" class="{{ $page == 'products' ? 'active' : '' }}">Products and services</a>
                        <div class="mega-menu">
                                <div id="mega-container" class="row">
                                    <a href="#" id="closes"></a>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Welding</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Fimer<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('fimer') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'fimer', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>                                           
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Cleaning machines</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Lavor<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('lavor') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'lavor', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Hawk<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('hawk') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'hawk', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Generators</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Perkins<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('perkins') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'perkins', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Compressors</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">CP<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('cp') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'cp', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Shamal<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('shamal') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'shamal', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Pneumatics tools</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Hazet<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('hazet') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'hazet', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">bosch<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('bosch') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'bosch', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Electrical tools</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Stayer<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('stayer') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'stayer', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Tyree sol. machines</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Teco<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('teco') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'teco', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Ravaglioli<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('ravaglioli') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'ravaglioli', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Lifters</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Mazzola<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('mazzola') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'mazzola', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Ravaglioli<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('ravaglioli') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'ravaglioli', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Startek<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('startek') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'startek', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Oil suction</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Faicom<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('faicom') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'faicom', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="mega-submenu menulevel_1">
                                           <li class="first"><a tabindex="0">Pumps</a></li>
                                           <li class="parent">
                                              <a class="dj-more " href="#">Hawk<em class="arrow" aria-hidden="true"></em></a>
                                              <div class="level_2" style="display: none;">
                                                 <div class="dj-subwrap-in">
                                                       <ul class="menulevel_2">
                                                        @foreach(\App\Admin\Products\Product::get_category('hawk') as $category)
                                                          <li><a href="{{ route('category', ['product' => 'hawk', 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                                        @endforeach
                                                       </ul>
                                                    <div style="clear:both;height:0"></div>
                                                 </div>
                                              </div>
                                           </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- <ul class="sub-menu">
                            @foreach($products as $product)
                                <li class="have-sub">
                                    <a href="{{ route('products', $product->product )}}">{{strtoupper(str_replace('_',' ',$product->product))}}</a>
                                    <ul class="sub-menu">
                                    @foreach(\App\Admin\Products\Product::get_category($product->product) as $category)
                                        <li><a href="{{ route('category', ['product' => $product->product, 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul> -->
                    </li>
                    <li><a href="{{route('solutions')}}" class="{{ $page == 'solutions' ? 'active' : '' }}">Solutions</a></li>
                    <li><a href="{{route('partners')}}" class="{{ $page == 'partners' ? 'active' : '' }}">Our agents</a></li>
                    <li><a href="{{route('customers')}}" class="{{ $page == 'customers' ? 'active' : '' }}">Our customers</a></li>
                    <li><a href="{{route('career')}}" class="{{ $page == 'career' ? 'active' : '' }}">Career</a></li>
                    <li><a href="{{route('about')}}" class="{{ $page == 'about' ? 'active' : '' }}">About us</a></li>
                    <li><a href="{{route('contacts')}}" class="{{ $page == 'contacts' ? 'active' : '' }}">Contact us</a></li>
                </ul>
                <!-- <div class="search">
                    <i class="fa fa-search"></i>
                </div> -->
                <div id="nav-mobile">
                    <span class="select_page">@yield('title')</span>
                    <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
                    <ul id="mobile_nav">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="have-sub"><a href="#">Products</a>
                            <!-- <ul class="sub-menu">
                                @foreach($products as $product)
                                <li class="have-sub">
                                    <a href="{{ route('products', $product->product )}}">{{strtoupper(str_replace('_',' ',$product->product))}}</a>
                                    <ul class="sub-menu">
                                    @foreach(\App\Admin\Products\Product::get_category($product->product) as $category)
                                        <li><a href="{{ route('category', ['product' => $product->product, 'category' => $category->category ] )}}">{{strtoupper(str_replace('_',' ',$category->category))}}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul> -->
                        </li>
                        <li><a href="{{route('solutions')}}">Solutions</a></li>
                        <li><a href="{{route('partners')}}">Partners</a></li>
                        <li><a href="{{route('career')}}">Career</a></li>
                        <li><a href="{{route('about')}}">About us</a></li>
                        <li><a href="{{route('contacts')}}">Contact us</a></li>
                    </ul>
                </div>              
            </div>
            
            <div class="search-container">                
                <form role="search" method="get" class="et-search-form" action="">
                    <input type="search" class="search-input" placeholder="Search …" value="" name="q" title="Search for:">
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
                <div class="col-md-6">
                    <h5>{{ $site_content['title'] }} @2018 All rights reserve</h5>
                </div>
                <div class="col-md-6 text-right">
                    <a href="https://www.raindesigner.com/" style="height:0;display:none">RainDesigner</a>
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
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}?v=1"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}?v=1"></script>
    <!-- Parallax -->
    <script src="{{asset('vendors/parallax.js-1.5.0/parallax.min.js')}}?v=1"></script>
    <!-- fancybox -->
    <script src="{{asset('vendors/fancybox-2.1.7/source/jquery.fancybox.js')}}?v=1"></script>

    @yield('jsFiles', '')

    <!-- Custom Style -->
    <script src="{{asset('js/website.js')}}?v=2"></script>
  </body>
</html>