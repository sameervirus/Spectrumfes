@extends('layouts.arabic')

@section('title', 'الوظائف')

@section('content')
<div class="career page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / الوظائف</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product text-center">                   
                    <img src="{{asset('images/career.jpg')}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <p>ليس هناك اي وظائف متاحة الان لكن يمكنك ارسال السيرة الذاتية علي الميل <a href="mailto:hr@spectrumfes.com">hr@spectrumfes.com</a></p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection