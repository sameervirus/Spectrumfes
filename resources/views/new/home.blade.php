@extends('layouts.new')

@section('title', __('Home'))

@section('content')

      <!-- Swiper-->
      <section class="section swiper-container swiper-slider-2">
        <div class="swiper-wrapper text-sm-left">
          <div class="swiper-slide context-dark" data-slide-bg="images/slide-1-1920x753.jpg">
            <div class="youhover"></div>
            <iframe 
              style="width: 100%;height: 100%" 
              src="https://www.youtube.com/embed/{{ youtube_code($site_content['home-youtube']) }}?autoplay=1&controls=0&frameborder=0&showinfo=0&loop=1&mute=1&playlist={{ youtube_code($site_content['home-youtube']) }}" allow="autoplay">
              </iframe>
          </div>
        </div>
      </section>

      <!-- About Company-->
      <section class="section section-md bg-gray-100 section-relative">
        <div class="container">
            <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">{{ __("Premium with ") }}{{ $site_content['title'] }}</span></h3>
          <div class="row row-40 row-lg-50 row-xl-60">
            <div class="col-sm-12 col-lg-12">
              <article class="box-icon-classic">
                <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                    <div class="unit-left">
                        <div class=""><img src="{{ asset('new/images/installment2.png') }}"></div>
                    </div>
                    <div class="unit-body">                    
                        {!!  $pages['installment']  !!}
                    </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <!-- What we offer-->
      <section class="section section-lg bg-default">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">{{ __('We provide solutions and services for') }}</span></h3>
          <div class="owl-carousel owl-style-3 dots-style-2" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-autoplay="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut">
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/9def79503dd36f928b38726a8cc47681.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Automotive service center') }}</h5><span class="services-creative-counter box-ordered-item">01</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/metro-hospital-delhi-1452767628-5697798c8fd49.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Hospitals') }}</h5><span class="services-creative-counter box-ordered-item">02</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/178674340.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Welding service center') }}</h5><span class="services-creative-counter box-ordered-item">03</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/shutterstock_133014653_chemical_manufacturingc06photo.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Industrial Facilities') }}</h5><span class="services-creative-counter box-ordered-item">04</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/Fleet_Image-560x376.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Fleet control') }}</h5><span class="services-creative-counter box-ordered-item">05</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/6ea0fdcdec56a5eaf3e3e823cbdf9416.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Car Care Centers') }}</h5><span class="services-creative-counter box-ordered-item">06</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/l1100199_75_g.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Power Control Systems') }}</h5><span class="services-creative-counter box-ordered-item">07</span>
              </div>
            </article>
            <!-- Services Creative-->
            <article class="services-creative"><a class="services-creative-figure" href="javascript:void(0)"><img src="{{ asset('images/solutions/generator_repair_portland_oregon.jpg')}}" alt="" width="370" height="230"/></a>
              <div class="services-creative-caption">
                <h5 class="services-creative-title">{{ __('Generator Support Centers') }}</h5><span class="services-creative-counter box-ordered-item">08</span>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- Section CTA-->
      <section class="section parallax-container" data-parallax-img="{{ asset('new/images/about-bg.jpg') }}">
        <div class="parallax-content section-lg context-dark text-md-left">
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-sm-7 col-md-6 col-lg-5">
                <div class="cta-classic">
                  <h4 class="cta-classic-title wow fadeInLeft">{{ $site_content['title'] }} {{ __('since') }} 2017</h4>
                  <p class="cta-classic-text wow fadeInRight" data-wow-delay=".1s">{!!  $pages['home_about']  !!}</p><a class="button button-lg button-primary button-winona wow fadeInUp" href="{{route('new_about', app()->getLocale())}}" data-wow-delay=".2s">{{ __('About us') }}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Mining machinery-->
      <section class="section section-xl bg-default text-center">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">{{ __('Our Gallery') }}</span></h3>
        </div>
        <div class="container container-inset-0">
          <div class="row row-30 row-desktop-8 gutters-8 hoverdir" data-lightgallery="group">
            @foreach($features as $feature)
            <div class="col-sm-6 col-lg-4 col-xxl-3">
              <div class="oh-desktop">
                <!-- Thumbnail Modern-->
                <article class="thumbnail thumbnail-modern wow slideInUp hoverdir-item" data-hoverdir-target=".thumbnail-modern-caption"><a class="thumbnail-modern-figure" href="{{ route('new_item', ['locale'=> app()->getLocale(),'product' => $feature->table, 'category' => $feature->category, 'item' => $feature->model] )}}"><img src="{{asset('images/'.$feature->table.'/'. str_replace('.','',$feature->model) .'/small_'.$feature->model.'.jpg' )}}" alt="" width="474" height="355"/></a>
                  <div class="thumbnail-modern-caption">
                    <h5 class="thumbnail-modern-title">
                        @if(app()->getLocale() == 'en')
                        <a href="{{ route('new_item', ['locale'=> app()->getLocale(),'product' => $feature->table, 'category' => $feature->category, 'item' => $feature->model] )}}">{{ strtoupper(str_replace('_',' ',str_replace('-',' ',$feature->model)))}}</a>
                        @else
                        <a href="{{ route('new_item', ['locale'=> app()->getLocale(),'product' => $feature->table, 'category' => $feature->category, 'item' => $feature->model] )}}">{{ strtoupper(str_replace('_',' ',str_replace('-',' ',$feature->model_ar)))}}</a>
                        @endif
                    </h5>
                  </div>
                </article>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>

      <!-- Section-->
      <section class="section section-xl bg-gray-100">
        <div class="container">
            <h3 class="oh-desktop"><span class="d-inline-block wow slideInLeft">{{ __('Our Partners') }}</span></h3>
          <div class="row row-60 justify-content-center flex-lg-row-reverse">
            <div class="col-md-12 col-lg-12 col-xl-12 clients-classic-div">
              <!-- Clients Classic-->
              <div class="clients-classic-wrap">
                @foreach ($products->chunk(4) as $chunk)
                <div class="row no-gutters">
                    @foreach ($chunk as $product)
                    <div class="col-sm-3 wow fadeInLeft">
                        <div class="clients-classic"><a class="clients-classic-figure" href="{{ route('new_products', [app()->getLocale(), $product->product] )}}"><img src="{{asset('images/products/'. $product->product . '.png' )}}" alt="" width="200" height="90"/></a></div>
                    </div>
                    @endforeach
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Subscribe to Our Newsletter-->
      <section class="section parallax-container" data-parallax-img="{{asset('new/images/bg-forms-1.jpg')}}">
        <div class="parallax-content section-md context-dark text-md-left">
          <div class="container">
            <div class="row row-30 justify-content-center align-items-center">
              <div class="col-lg-4 col-xl-3">
                <h5 class="oh-desktop"><span class="d-inline-block wow slideInUp">{{ __('Newsletter') }}</span></h5>
                <p class="oh-desktop"><span class="d-inline-block wow slideInDown">{{ __('Sign up to our newsletter to receive the latest news.') }}</span></p>
              </div>
              <div class="col-lg-8 col-xl-9">
                <!-- RD Mailform-->
                <div class="block-center">
                  <form class="rd-form rd-mailform rd-form-inline oh-desktop rd-form-inline-lg" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                    <div class="form-wrap wow slideInUp">
                      <input class="form-input" id="subscribe-form-0-email" type="email" name="email" data-constraints="@Email @Required"/>
                      <label class="form-label" for="subscribe-form-0-email">{{ __('Your E-mail') }}*</label>
                    </div>
                    <div class="form-button wow slideInRight">
                      <button class="button button-winona button-lg button-primary" type="submit">{{ __('Subscribe') }}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection