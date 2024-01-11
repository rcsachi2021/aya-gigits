<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">        
        <meta name="viewport" content="width=990, target-densityDpi=device-dpi">
        <meta name="MobileOptimized" content="990">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="x-rim-auto-match" content="none">
        <title>Home - AYA Securities</title>
        <meta name="description" content="Home">
        <meta name="keywords" content="Home">
        <link href="{!! asset('assets/css/common.css') !!}" rel="stylesheet">        
        <link href="{!! asset('assets/css/home.css') !!}" rel="stylesheet">        
        <style>
            .header-container {
    position: relative;
    height: 105px;
    z-index: 2;
}
        </style>
<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="/css/smart/ie.css" />
<![endif]-->
        <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/js/modernizr.js') !!}"></script> 
        
<!--[if lt IE 9]>
        <script type="text/javascript" src="/jscripts/libs/html5shiv/html5.js"></script>
<![endif]-->
       </head>
    <body>
        <div class="header-container">
            <!-- ************** Start MAIN Menu **************************************** -->
                                <ul class="nav">
                    <li><a href="{{Route('home')}}"><span>Home</span></a></li>
                    <li><a href="{{Route('portfolio')}}"><span>Portfolios</span></a></li>
                    <li><a href="{{Route('vera')}}"><span>Vera+</span></a></li>
                    <li><a href="{{Route('affiliate')}}"><span>Affiliate</span></a></li>
                    <li class="last"><a href="{{Route('contact')}}"><span>Contact</span></a></li>
                </ul>
            <!-- ************** End MAIN Menu ****************************************** -->
            <a class="logo" href="">
                <img src="assets/images/logo_home.jpg" alt="">
            </a>
            
           <!-- ************** Start TOP Menu ***************************************** -->
           <div class="toolbar">
                   @auth
                    <a href="{{Route('logout')}}" title="Login">
                        Logout
                    </a>  
                    @endauth                           
                    @guest
                    <a href="{{Route('login')}}" title="Login">
                        Login
                    </a>
                    @endguest
                    
                    
                </div>
                    <!-- ************** End TOP Menu ******************************************* -->
        </div>
        <div id="google_translate_element"></div>
        <div class="image-container" style="background-image: url('assets/images/home_en.jpg');"></div>
        <div class="main-container">
            <div class="container clearfix">
                <div class="aya">
                    <img src="assets/images/aya_en.png" alt="">
                </div>
                <!-- ************** Start MENUS links BOX  ********************************* -->
                <div class="promo first">
    <div class="image">
        <img src="assets/images/01.jpg" alt="">
    </div>
    As one of the world's leading asset management. AYA provides you with a range of investment strategies to choose from, each actively managed and designed to deliver a different investment objective. Our strategies invest exclusively in collective investments (“funds"), ensuring diversified access to global investment markets irrespective of your portfolio size
</div>
<div class="promo">
    <div class="image">
        <img src="assets/images/02.jpg" alt="">
    </div>
    For the past decade, AYA has built with its clients a special relation as it grows to tailor Investment Programs to fit their criteria and challenge them to achieve their investment goals in life.
</div>
<div class="promo">
    <div class="image">
        <img src="assets/images/03.jpg" alt="">
    </div>
    Our in-house research team is extremely well-resourced and experienced, carrying out a detailed analysis of any funds that we invest in.
</div>
                <!-- ************** End MENUS links BOX  *********************************** -->
            </div>
        </div>
        <div class="footer-container">
            <div class="container clearfix">
                <div class="left">
                    AYA Capital Ltd<br>
                    57 Princes Gate Exhibition Road,<br>
                    United Kingdom, SW72PG
                </div>
                <div class="center">
                    Info.ayauk@ayacapitaluk.com<br>
                    Ayacapital.uk@gmail.com
                </div>
                <div class="right">
                    Copyright 2020-2023 <br>
AYA Capital. All Rights Reserved.<br>

                </div>
            </div>
        </div>
    <script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'en,fr'}, 'google_translate_element');
  }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body></html>