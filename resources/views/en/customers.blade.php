@extends('layouts.website')

@section('title', 'Our Customers')

@section('content')
<div id="customers" class="career page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><a href="{{ route('home' )}}">Home</a> / Our Customers</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="details">
                    <h1>Our Customers</h1>
                    <h2>Spectrum for engineering solutions (F.E.S ) is honored to present a set of works  within a short period :</h2> 
                    <h3>food and beverage industry :</h3>
                    <ul>
                        <li>Sugar and Integrated Industries Company.</li>
                        <li>Egyptian Bakery & Bakery supplies Company.</li>
                        <li>Al Wawtania Poultry Company.</li>
                    </ul>
                    <h3>field of household industries:</h3>
                    <ul>
                        <li>EL-ABD CO. for home Appliance.</li>
                        <li>Electrolux For home industries.</li>
                    </ul>
                    <h3>Pharmaceutical industries:</h3>
                    <ul>
                        <li>Libtiz for pharmaceutical Industries.</li>
                    </ul>
                    <h3>Industrial field :</h3>
                    <ul>
                        <li>MCV Manufacturing Company.</li>
                        <li>Ascom for metal works.</li>
                        <li>Freedo company for engineering industries.</li>
                        <li>Sunny Egypt Company</li>
                        <li>Putec Factory for Cornish and Decoration.</li>
                        <li>Egyptian and Syrian Company for elevators.</li>
                        <li><b>Military factories such as:</b>
                            <ul>
                                <li>Factory 90</li>
                                <li>Factory 18</li>
                                <li>Factory 200</li>
                            </ul>
                        </li>
                    </ul>
                    <h3>Educational Field : </h3>
                    <ul>
                        <li>Misr Univercity for Seience and Technology</li>
                    </ul>
                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection