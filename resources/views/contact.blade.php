<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="" class="">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        
        <meta name="viewport" content="width=990, target-densityDpi=device-dpi">
        <meta name="MobileOptimized" content="990">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="x-rim-auto-match" content="none">
        <title>Feedback - AYA Securities</title>
        <meta name="description" content="Feedback">
        <meta name="keywords" content="Feedback">
        <link href="{!! asset('assets/css/common.css') !!}" rel="stylesheet"> 
        <link href="{!! asset('assets/css/feedback.css') !!}" rel="stylesheet">               
        <link href="{!! asset('assets/css/highslide.css') !!}" rel="stylesheet">    
        <style>
        h1.page-title {
    font-size: 28px !important;
    font-weight: bold !important;
    color: #00447c;
    margin-top: 4px;
    margin-bottom: 12px;
}
.text-danger{
    font-size: 12px;
    color: red;
}
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="/css/smart/ie.css" />
<![endif]-->        
<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/js/modernizr.js') !!}"></script> 
<!--[if lt IE 9]>
        <script type="text/javascript" src="/jscripts/libs/html5shiv/html5.js"></script>
<![endif]-->        

    <body>
        <div class="body-overlay"></div>
        <div class="body-container">
            <div class="header-container">
                <div class="line"></div>
                
                <!-- ************** Start MAIN Menu **************************************** -->
                <ul class="nav">
                    <li><a href="{{Route('home')}}"><span>Home</span></a></li>
                    <li><a href="{{Route('portfolio')}}"><span>Portfolios</span></a></li>
                    <li><a href="{{Route('vera')}}"><span>Vera+</span></a></li>
                    <li><a href="{{Route('affiliate')}}"><span>Affiliate</span></a></li>
                    <li class="last"><a href="{{Route('contact')}}"><span>Contact</span></a></li>
                </ul>
                <!-- ************** End MAIN Menu ****************************************** -->
                <a class="logo" href="/">
                    <img src="assets/images/logo.jpg" alt="">
                </a>
                
                <div class="toolbar">
                    <a href="{{route('login')}}" title="Login">
                      Login
                    </a>
                    
                </div>
            </div>
            <div id="google_translate_element"></div>
            <div class="page-container clearfix" style="min-height: 504px;">
                <div class="column-left">
                    <div class="sidebox">
                        <!-- ************** Start LEFT Menu **************************************** -->
                                                <!-- ************** End LEFT Menu ****************************************** -->
                    </div>
                </div>
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session()->get('message')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
                <div class="column-center">
                    <h1 class="page-title">Feedback</h1>
                            <div class="feedack-left">
                                <div class="feedback-descr"><p><img style="float: left; margin-right: 24px;" src="assets/images/fed.jpg" alt="" width="164" height="115">AYA Capital<br>57 Princes Gate Exhibition Road, London, 5th floor<br>United Kingdom, SW72PG<br><span><a href="mailto:Info.ayauk@ayacapitaluk.com">Info.ayauk@ayacapitaluk.com</a></span><br><span><a href="mailto:Ayacapital.uk@gmail.com">Ayacapital.uk@gmail.com</a></span></p></div>
                                <iframe src="" width="100%" height="280" frameborder="0" style="border:0;"></iframe>
                            </div>
                            <div class="feedack-right">
                                <form method="POST" action="{{Route('savecontact')}}" class="feedack-form">
                                    @csrf
                                    <h2>Contact Us</h2>
                                    <p class="caption">Send us a message and we'll get right back to you.</p>
                                    <table width="100%" border="0">
                                        <tbody><tr>
                                            <td colspan="2">
                                                <input type="text" name="name" placeholder="Your Name" value="" class="">
                                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="text" name="phone_or_email" placeholder="Your contacts: phone or e-mail" value="" class="">
                                                @error('phone_or_email')<span class="text-danger">{{$message}}</span>@enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="text" name="subject" placeholder="Message subject" value="" class="">
                                                @error('subject')<span class="text-danger">{{$message}}</span>@enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <textarea name="message" rows="5" placeholder="Message text" class=""></textarea>
                                                @error('message')<span class="text-danger">{{$message}}</span>@enderror
                                            </td>
                                        </tr>
                                        <tr class="buttons">
                                            <td>
                                                <button type="submit">Send</button>
                                            </td>
                                            <td align="right">
                                                <button type="reset">Reset</button>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </form>
                            </div>
                </div>
                
            </div>
            <div class="footer-container clearfix">
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
                    Copyright 2010-2015 <br>
AYA Capital. All Rights Reserved.<br>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'en,fr'}, 'google_translate_element');
  }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>