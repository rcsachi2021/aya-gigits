@extends('template.master')
@section('title', 'Portfolio')
@section('class','demo10')
@section('content')
<div class="container">
<div class="row">
                        <div class="col-md-12 col-sm-6 col-lg-3">
                            <div class="pricingTable10">
                                <div class="pricingTable-header">
                                    <h3 class="heading">Pollux</h3>                                   
                                </div>
                                <div class="pricing-content">
                                    <ul>
                                        <li>Portfolio Cost<br/> 0.0052 BTC</li>
                                        <li>Capital Range<br/> 1 BTC - 5 BTC</li>
                                        <li>Profit range<br/> 15% - 50%</li>
                                        <li>Trading period<br/> 30 - 60 days</li>                                        
                                    </ul>

                                    <a href="{{Route('signup',encrypt('pollux'))}}" class="read">Activate Portfolio</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-lg-3">
                            <div class="pricingTable10">
                                <div class="pricingTable-header">
                                    <h3 class="heading">Antares</h3>                         
                                </div>
                                <div class="pricing-content">
                                    <ul>
                                        <li>Portfolio Cost<br/> 0.0087 BTC</li>
                                        <li>Capital Range<br/> 5 BTC - 10 BTC</li>
                                        <li>Profit Range<br/> 20% - 50%</li>
                                        <li>Trading Period<br/> 30 - 60 Days</li>
                                                                                
                                    </ul>                                    
                                    <a href="{{Route('signup',encrypt('antares'))}}" class="read">Activate Portfolio</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-lg-3">
                            <div class="pricingTable10">
                                <div class="pricingTable-header">
                                    <h3 class="heading">Tauri</h3>                              
                                </div>
                                <div class="pricing-content">
                                    <ul>
                                        <li>Portfolio Cost<br/> 0.012 BTC</li>
                                        <li>Capital Range<br/> 10 BTC - 20 BTC</li> 
                                        <li>Profit Range<br/> 80% - 120%</li>
                                        <li>Trading Period<br/> 30 - 60 days</li>                                                                              
                                    </ul>
                                    <a href="{{Route('signup',encrypt('tauri'))}}" class="read">Activate Portfolio</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-lg-3">
                            <div class="pricingTable10">
                                <div class="pricingTable-header">
                                    <h3 class="heading">Exclusive ★</h3>                            
                                </div>
                                <div class="pricing-content">
                                    <ul>
                                        <li>Portfolio Cost<br/> 0.017 BTC</li>
                                        <li>Capital<br/> 50 BTC</li>
                                        <li>Profit Range<br/> 120% - 250% </li>
                                        <li>Trading Period<br/> Annual</li>                                       
                                    </ul>
                                    <a href="{{Route('signup',encrypt('exclusive'))}}" class="read">Activate Portfolio</a>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection