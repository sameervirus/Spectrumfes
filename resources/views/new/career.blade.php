@extends('layouts.new')

@section('title', __('Jobs'))

@section('content')

@include('layouts.breadcrumbs', ['active' => __('Jobs')])

<section class="section section-lg bg-default text-md-left">
    <div class="container">
      <h3>{{ __('Jobs') }}</h3>
      <!-- Terms list-->
      <dl class="list-terms">
        <dt class="heading-6">{{ __('Available jobs') }}</dt>
        <dd>{!! $pages['jobs'] !!}</dd>        
    </div>
</section>

@endsection