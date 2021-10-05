@extends('layouts.website')

@section('title', 'Home Page')
@section('cssFiles')
<link rel="stylesheet" href="{{asset('css/carousel.css')}}?v=1">
<!-- <link rel="stylesheet" href="{{asset('vendors/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}?v=1"> -->
@endsection
@section('content')

<div class="slider">
    <img class="img-responsive" src="{{asset('images/photo.png')}}">
    {{-- <div class="parallax_bg" data-parallax="scroll" data-image-src="{{asset('images/photo.png')}}"></div> --}}
    <div class="container slide_detail">

        <div class="flex-caption">
            <h1>Quality, Efficiency<br>Intelligence</h1>
            <h4>Customer satisfaction is <br>our paramount aim</h4>
        </div>
        {{-- <div class="slide_title animated flipInX">
            <span>The service experience of a multinational at the price of a local</span>
        </div> --}}
        {{-- <div class="slide_buttom">
            <a href="{{route('contacts')}}" class="spical_button div_trans">Contact Us</a>
        </div> --}} 
    </div>
</div>
<div class="vendors h1home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="">Spectrum for Engineering Solutions (F.E.S)</h1>
                <p class="text-left">is a new company founded in Egypt in 2017 by an ex -multinational companies' managers. We provide high quality of service, technical experience and affordable price to various sectors through professional and different experienced team members who believe in that the customer satisfaction is paramount.</p>
            </div>
        </div>
    </div>
</div>
<div class="vendors page h1home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="">Our Agents</h1>
            </div>
        </div>
        @foreach ($products->chunk(6) as $chunk)
        <div class="row">
            @foreach ($chunk as $product)
            <div class="col-md-2">
                <div class="vendor">
                    <a href="{{route('partners')}}#{{$product->product}}">
                        <img src="{{asset('images/products/'. $product->product . '.png' )}}">
                        <span class="over_lay"></span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>

<div class="owl h1home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="">Our Customers</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Set up your HTML -->
                <!-- <div class="owl-carousel">
                    @foreach($customers as $image)
                        <div><img src="{{$image}}"></div>
                    @endforeach                  
                </div> -->
                <div class="carousel">
                  <div class="slides">
                  @foreach($customers as $image)
                    <div class="slideItem">
                      <a href="#"> <img src="{{$image}}"> </a>
                      <!-- <div class="shadow">
                        <div class="shadowLeft"></div>
                        <div class="shadowMiddle"></div>
                        <div class="shadowRight"></div>
                      </div> -->
                    </div>
                  @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("jsFiles")
<!-- <script src="{{asset('vendors/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script> -->
<script src="{{asset('js/jquery.carousel-1.1.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.11/jquery.mousewheel.min.js"></script>
<!-- <script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
</script> -->
<script type="text/javascript">
$(document).ready(function(){
    $('.carousel').carousel({
        carouselWidth:930,
        //carouselHeight:330,
        directionNav:true,
        shadow:true,
        buttonNav:'bullets'
    });
});
</script>
@endsection