@extends('layouts.new')

@section('title', app()->getLocale() == 'en' ? TitleWords($item->model) . '-' . TitleWords($product->product) : $item->model_ar .'-'. $product->name)

@section('content')

@include('layouts.breadcrumbs', [
  'active' => app()->getLocale() == 'en' ? TitleWords($item->model) : $item->model_ar, 
  'first' => app()->getLocale() == 'en' ? TitleWords($product->product) : $product->name, 
  'first_slug' => $product->product,
  'second' => app()->getLocale() == 'en' ? TitleWords($item->category) : $item->category_ar,
  'second_slug' => $item->category
  ])

<!-- Project Page-->
<section class="section section-lg bg-default text-md-left item-container">
    <div class="container">
        <div class="row row-60 flex-lg-row-reverse">
            <div class="col-lg-6 col-xl-5">
                <div class="slick-project">
                    <!-- Slick Carousel-->
                    <div class="slick-slider carousel-parent" data-arrows="true" data-autoplay="true" data-swipe="true" data-items="1" data-child="#child-carousel-7" data-for="#child-carousel-7" data-slide-effect="true" data-lightgallery="group">
                      @foreach($images as $image)
                      @if (str_contains($image, 'small'))
                        <div class="item">
                          <a data-lightgallery="item" href="{{url(''. str_replace('small_','large_',$image) .'')}}">
                            <img src="{{asset(''. str_replace('small_','large_',$image) .'')}}" alt="" width="670" height="477" /></a>
                            <div class="slick-project-caption">
                                <div class="slick-project-title">{{ app()->getLocale() == 'ar' ? $item->model_ar : TitleWords($item->model) }}</div>
                            </div>
                        </div>
                      @endif
                      @endforeach
                    </div>
                    <div class="slick-slider child-carousel" id="child-carousel-7" data-for=".carousel-parent" data-items="3" data-sm-items="3" data-md-items="4" data-lg-items="3" data-xl-items="4" data-slide-to-scroll="1">
                      @foreach($images as $image)
                      @if (str_contains($image, 'small'))
                        <div class="item"><img src="{{asset($image)}}" alt="" width="670" height="477" /></div>
                      @endif
                      @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7">
                <div class="project-page">
                    <h4>{{ app()->getLocale() == 'ar' ? $item->model_ar : TitleWords($item->model) }}</h4>
                    {!! html_entity_decode(app()->getLocale() == 'ar' ? $item->features_ar : $item->features) !!}
                    <div class="group-sm group-middle">
                        <span class="project-page-social-title">{{ __('Share') }}</span>
                        <div>
                            <ul class="list-inline project-page-social-list">
                                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <a class="button button-lg button-primary button-winona" href="#" data-toggle="modal" data-target="#myModal"><div class="content-original">{{ __('Get a quote') }}</div><div class="content-dubbed">{{ __('Get a quote') }}</div></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Accordion-->
<section class="section section-sm section-last bg-default text-md-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <h4>{{ __('Details') }}</h4>

                <!-- Bootstrap collapse-->
                <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist" aria-multiselectable="false">
                    @if($item->technical_data)
                    <!-- Bootstrap card-->
                    <article class="card card-custom card-corporate">
                        <div class="card-header" id="accordion1Heading1" role="tab">
                            <div class="card-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">
                                    {{ __('Technical Data') }}
                                    <div class="card-arrow"></div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse show" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                            <div class="card-body">
                              @if(app()->getLocale() == 'ar')
                                {!! html_entity_decode($item->technical_data_ar) !!}
                              @else
                                {!! html_entity_decode($item->technical_data) !!}
                              @endif
                            </div>
                        </div>
                    </article>
                    @endif

                    @if($item->accessories)
                    <!-- Bootstrap card-->
                    <article class="card card-custom card-corporate">
                        <div class="card-header" id="accordion1Heading2" role="tab">
                            <div class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse2" aria-controls="accordion1Collapse2">
                                    {{ __('Accessories') }}
                                    <div class="card-arrow"></div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="accordion1Collapse2" role="tabpanel" aria-labelledby="accordion1Heading2">
                            <div class="card-body">
                              @if(app()->getLocale() == 'ar')
                                {!! html_entity_decode($item->accessories_ar) !!}
                              @else
                                {!! html_entity_decode($item->accessories) !!}
                              @endif
                            </div>
                        </div>
                    </article>
                    @endif

                    @if($item->optional)
                    <!-- Bootstrap card-->
                    <article class="card card-custom card-corporate">
                        <div class="card-header" id="accordion1Heading3" role="tab">
                            <div class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">
                                    {{ __('Optional') }}
                                    <div class="card-arrow"></div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="card-body">
                              @if(app()->getLocale() == 'ar')
                                {!! html_entity_decode($item->optional_ar) !!}
                              @else
                                {!! html_entity_decode($item->optional) !!}
                              @endif
                            </div>
                        </div>
                    </article>
                    @endif

                    @if($item->equipment)
                    <!-- Bootstrap card-->
                    <article class="card card-custom card-corporate">
                        <div class="card-header" id="accordion1Heading3" role="tab">
                            <div class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">
                                    {{ __('Equipment') }}
                                    <div class="card-arrow"></div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="card-body">
                              @if(app()->getLocale() == 'ar')
                                {!! html_entity_decode($item->equipment_ar) !!}
                              @else
                                {!! html_entity_decode($item->equipment) !!}
                              @endif
                            </div>
                        </div>
                    </article>
                    @endif

                    @if($item->benefits_features)
                    <!-- Bootstrap card-->
                    <article class="card card-custom card-corporate">
                        <div class="card-header" id="accordion1Heading3" role="tab">
                            <div class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">
                                    {{ __('Benefits') }}
                                    <div class="card-arrow"></div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                            <div class="card-body">
                              @if(app()->getLocale() == 'ar')
                                {!! html_entity_decode($item->benefits_features_ar) !!}
                              @else
                                {!! html_entity_decode($item->benefits_features) !!}
                              @endif
                            </div>
                        </div>
                    </article>
                    @endif

                    @if($item->data_sheet)
                    <!-- Bootstrap card-->
                    <article class="card card-custom card-corporate">
                        <div class="card-header" id="accordion1Heading4" role="tab">
                            <div class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4">
                                    {{ __('Data Sheet') }}
                                    <div class="card-arrow"></div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse" id="accordion1Collapse4" role="tabpanel" aria-labelledby="accordion1Heading4">
                            <div class="card-body">
                                <a target="_blank" class="ga-track-file" title="{{ app()->getLocale() == 'ar' ? $item->model_ar : $item->model }}" href="//{{$item->data_sheet}}"><span>www.{{strtolower($item->data_sheet)}}</span></a>
                            </div>
                        </div>
                    </article>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <h4 class="modal-title">{{ __('Get a quote') }}</h4>
        @if (\Session::has('success'))
          <p>{{ __('Thank you for your message we will contact you shortly') }}</p>
        @else
          <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{route('new_contacts', app()->getLocale())}}" novalidate="novalidate">
            {{ csrf_field() }}
              <div class="form-wrap">
                  <input class="form-input form-control-has-validation" id="contact-name" type="text" name="name" data-constraints="@Required" /><span class="form-validation"></span>
                  <label class="form-label rd-input-label" for="contact-name">{{ __('Name') }}*</label>
              </div>
              <div class="form-wrap">
                  <input class="form-input" id="contact-phone-5" type="text" name="phone" data-constraints="@Numeric">
                  <label class="form-label" for="contact-phone-5">{{ __('Your Phone') }}*</label>
              </div>
              <div class="form-wrap">
                  <input class="form-input form-control-has-validation" id="contact-email" type="email" name="email" data-constraints="@Email @Required" /><span class="form-validation"></span>
                  <label class="form-label rd-input-label" for="contact-email">{{ __('E-mail') }}*</label>
              </div>
              <div class="form-wrap">
                  <label class="form-label rd-input-label" for="contact-message">{{ __('Message') }}</label>
                  <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="user_message" data-constraints="@Required">{{ __('Please, I want information about the price and specifications') }} : {{ app()->getLocale() == 'ar' ? $item->model_ar : $item->model }} -  {{ app()->getLocale() == 'en' ? TitleWords($product->product) : $product->name }}</textarea><span class="form-validation"></span>
              </div>
              <button class="button button-primary button-winona" type="submit">
                  <div class="content-original">{{ __('Submit') }}</div>
                  <div class="content-dubbed">{{ __('Submit') }}</div>
              </button>
          </form>
        @endif
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection