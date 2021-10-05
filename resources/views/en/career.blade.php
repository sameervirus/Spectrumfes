@extends('layouts.website')

@section('title', 'Career')

@section('content')
<div class="career page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / Career</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product text-center">                   
                    <img src="{{asset('images/career.jpg')}}?v=1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <p>No Jobs are open currently. Please submit your CV to our email <a href="mailto:hr@spectrumfes.com">hr@spectrumfes.com</a></p>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection