@extends('layouts.website')

@section('title', 'About us')

@section('content')
<div class="about page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / About us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product text-center">                   
                    <img src="{{asset('images/about.jpg')}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <h1>Who we are ?</h1>
                    <p>Spectrum for engineering solutions (F.E.S) is a a new company founded in Egypt in 2017 by an ex -multinational companies' managers.</p>
                    <p>Our company is committed to provide for diverse sectors the perfect products and efficient solutions, supply the field of industry to maintain sustainable operations and offer technical services, consultancy services and a full after-sales services in time with competitive price range.</p>
                    <p>Our team is professional and different experienced who integrate our products and solutions with customers’ needs.</p>
                    <p>Our partners are a well-known international companies which make us very confident about the service we provide.</p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <h1>Our vision</h1>
                    <p>To penetrate the industrial field with developed intelligent solutions in 2025.</p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <h1>Our mission</h1>
                    <p>Our aim is to make customers delighted</p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <h1>How we do it ?</h1>
                    <p>We offer a complete package:<br/>(from providing products, services and solutions to full after sales services).</p>
                    <p>Products & Solutions.</p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection