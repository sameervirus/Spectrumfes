@extends('layouts.arabic')

@section('title', 'عن الشركة')

@section('content')
<div class="about page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home-ar' )}}">الرئيسية</a> / عن الشركة</h1>
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
                    <p><b>الطيف F.E.S.</b> هو بدء التشغيل الجديد مع إمكانات مثيرة للإعجاب. تأسست سبيكتروم فيس التي أسسها فريق فودافون السابق، ملتزمة الاستفادة من نوعية الخدمة المتوقعة من قبل متعددة الجنسيات إلى قطاع السوق أوسع بكثير. النطاق السعري الذي نقدمه مثل هذه النوعية من الخدمات والخبرة التقنية تمكن عملائنا من التمتع بأعلى معايير الخدمة في مثل هذه الأوقات الصعبة من الناحية المالية.</p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection