@extends('layouts.new')

@section('title', __('About us'))

@section('content')

@include('layouts.breadcrumbs', ['active' => __('About us')])

<section class="section section-lg bg-default text-md-left">
    <div class="container">
      {!! $pages['about'] !!}
    </div>
</section>

@endsection