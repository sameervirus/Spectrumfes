@extends('layouts.new')

@section('title', __('Contact us'))

@section('content')

@include('layouts.breadcrumbs', ['active' => __('Contact us')])

<section class="section section-lg bg-default text-md-left">
  <div class="container">
    <div class="row row-60 justify-content-center">
      <div class="col-lg-8">
        <h4 class="text-spacing-25 text-transform-none">{{ __('Get in touch') }}</h4>
        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{route('new_contacts', app()->getLocale())}}">
          {{ csrf_field() }}
          <div class="row row-20 gutters-20">
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-your-name-5">{{ __('Your Name') }}*</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required">
                <label class="form-label" for="contact-email-5">{{ __('Your E-mail') }}*</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-phone-5" type="text" name="phone" data-constraints="@Numeric">
                <label class="form-label" for="contact-phone-5">{{ __('Your Phone') }}*</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-message-5">{{ __('Message') }}</label>
                <textarea class="form-input textarea-lg" id="contact-message-5" name="user_message" data-constraints="@Required"></textarea>
              </div>
            </div>
          </div>
          <button class="button button-secondary button-winona" type="submit">{{ __('Submit') }}</button>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="aside-contacts">
          <div class="row row-30">
            <div class="col-sm-6 col-lg-12 aside-contacts-item">
              <p class="aside-contacts-title">{{ __('Get social') }}</p>
              <ul class="list-inline contacts-social-list list-inline-sm">
                @foreach ($contacts as $key => $value)

                  @if (starts_with($key,'social_') && @$value)
                    <li><a class="icon mdi mdi-{{ str_replace('social_','',$key)}}" href="{{$value}}" target="_blank"></a></li>
                  @endif

                @endforeach
              </ul>
            </div>
            <div class="col-sm-6 col-lg-12 aside-contacts-item">
              <p class="aside-contacts-title">{{ __('Phone') }}</p>
              <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                <div class="unit-body"><a class="phone" href="tel:{{ $contacts['office_tel'] }}"><span>{{ $contacts['office_tel'] }}</span></a></div>
              </div>
              <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                <div class="unit-body"><a class="phone" href="tel:{{ $contacts['office_mob'] }}"><span>{{ $contacts['office_mob'] }}</span></a></div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-12 aside-contacts-item">
              <p class="aside-contacts-title">{{ __('E-mail') }}</p>
              <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                <div class="unit-body"><a class="mail" href="mailto:{{ $contacts['email'] }}">{{ $contacts['email'] }}</a></div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-12 aside-contacts-item">
              <p class="aside-contacts-title">{{ __('Address') }}</p>
              <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                <div class="unit-body"><a class="address" target="_blank" href="https://goo.gl/maps/mc3VhWFeZJgJooQPA">{{ $contacts['office_address'] }}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection