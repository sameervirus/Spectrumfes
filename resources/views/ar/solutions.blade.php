@extends('layouts.arabic')

@section('title', 'الحلول')

@section('content')

<div class="solutions page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / الحلول</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/9def79503dd36f928b38726a8cc47681.jpg')}}">
                        <img src="{{ asset('images/solutions/9def79503dd36f928b38726a8cc47681.jpg')}}">
                        <span class="over_lay"><p>مركز خدمة السيارات</p></span>
                    </a>                    
                </div>
                <p>مركز خدمة السيارات</p>
            </div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/metro-hospital-delhi-1452767628-5697798c8fd49.jpg')}}">
                        <img src="{{ asset('images/solutions/metro-hospital-delhi-1452767628-5697798c8fd49.jpg')}}">
                        <span class="over_lay"><p>المستشفيات</p></span>
                    </a>                    
                </div>
                <p>المستشفيات</p>
            </div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/178674340.jpg')}}">
                        <img src="{{ asset('images/solutions/178674340.jpg')}}">
                        <span class="over_lay"><p>مركز خدمة اللحام</p></span>
                    </a>
                </div>
                <p>مركز خدمة اللحام</p>
            </div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/shutterstock_133014653_chemical_manufacturingc06photo.jpg')}}">
                        <img src="{{ asset('images/solutions/shutterstock_133014653_chemical_manufacturingc06photo.jpg')}}">
                        <span class="over_lay"><p>منشأت صناعية</p></span>
                    </a>                    
                </div>
                <p>منشأت صناعية</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/Fleet_Image-560x376.jpg')}}">
                        <img src="{{ asset('images/solutions/Fleet_Image-560x376.jpg')}}">
                        <span class="over_lay"><p>مراقبة الأسطول</p></span>
                    </a>                    
                </div>
                <p>مراقبة الأسطول</p>
            </div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/6ea0fdcdec56a5eaf3e3e823cbdf9416.jpg')}}">
                        <img src="{{ asset('images/solutions/6ea0fdcdec56a5eaf3e3e823cbdf9416.jpg')}}">
                        <span class="over_lay"><p>مراكز العناية بالسيارات</p></span>
                    </a>                    
                </div>
                <p>مراكز العناية بالسيارات</p>
            </div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/l1100199_75_g.jpg')}}">
                        <img src="{{ asset('images/solutions/l1100199_75_g.jpg')}}">
                        <span class="over_lay"><p>أنظمة التحكم في الطاقة</p></span>
                    </a>                    
                </div>
                <p>أنظمة التحكم في الطاقة</p>
            </div>
            <div class="col-md-3 pull-right-desktop">
                <div class="vendor">
                    <a class="fancybox" rel="gallery" data-fancybox="gallery" href="{{ url('images/solutions/generator_repair_portland_oregon.jpg')}}">
                        <img src="{{ asset('images/solutions/generator_repair_portland_oregon.jpg')}}">
                        <span class="over_lay"><p>مراكز دعم المولدات</p></span>
                    </a>                    
                </div>
                <p>مراكز دعم المولدات</p>
            </div>
        </div>
    </div>
</div>
@endsection