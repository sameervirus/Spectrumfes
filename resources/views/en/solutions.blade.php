@extends('layouts.website')

@section('title', 'Solutions')

@section('content')

<div class="solutions page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / Solutions</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/9def79503dd36f928b38726a8cc47681.jpg')}}">
                        <img src="{{ asset('images/solutions/9def79503dd36f928b38726a8cc47681.jpg')}}">
                        <span class="over_lay"><p>Automotive service center</p></span>
                    </a>                    
                </div>
                <p>Automotive service center</p>
            </div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/metro-hospital-delhi-1452767628-5697798c8fd49.jpg')}}">
                        <img src="{{ asset('images/solutions/metro-hospital-delhi-1452767628-5697798c8fd49.jpg')}}">
                        <span class="over_lay"><p>Hospitals</p></span>
                    </a>                    
                </div>
                <p>Hospitals</p>
            </div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/178674340.jpg')}}">
                        <img src="{{ asset('images/solutions/178674340.jpg')}}">
                        <span class="over_lay"><p>Welding service center</p></span>
                    </a>
                </div>
                <p>Welding service center</p>
            </div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/shutterstock_133014653_chemical_manufacturingc06photo.jpg')}}">
                        <img src="{{ asset('images/solutions/shutterstock_133014653_chemical_manufacturingc06photo.jpg')}}">
                        <span class="over_lay"><p>Industrial Facilities</p></span>
                    </a>                    
                </div>
                <p>Industrial Facilities</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/Fleet_Image-560x376.jpg')}}">
                        <img src="{{ asset('images/solutions/Fleet_Image-560x376.jpg')}}">
                        <span class="over_lay"><p>Fleet control</p></span>
                    </a>                    
                </div>
                <p>Fleet control</p>
            </div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/6ea0fdcdec56a5eaf3e3e823cbdf9416.jpg')}}">
                        <img src="{{ asset('images/solutions/6ea0fdcdec56a5eaf3e3e823cbdf9416.jpg')}}">
                        <span class="over_lay"><p>Car Care Centers</p></span>
                    </a>                    
                </div>
                <p>Car Care Centers</p>
            </div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/l1100199_75_g.jpg')}}">
                        <img src="{{ asset('images/solutions/l1100199_75_g.jpg')}}">
                        <span class="over_lay"><p>Power Control Systems</p></span>
                    </a>                    
                </div>
                <p>Power Control Systems</p>
            </div>
            <div class="col-md-3">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/generator_repair_portland_oregon.jpg')}}">
                        <img src="{{ asset('images/solutions/generator_repair_portland_oregon.jpg')}}">
                        <span class="over_lay"><p>Generator Support Centers</p></span>
                    </a>                    
                </div>
                <p>Generator Support Centers</p>
            </div>
        </div>
    </div>
</div>
@endsection