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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{!! asset('assets/css/common.css') !!}" rel="stylesheet"> 
        <link href="{!! asset('assets/css/feedback.css') !!}" rel="stylesheet">               
        <link href="{!! asset('assets/css/highslide.css') !!}" rel="stylesheet">
                
           
        <style>
           
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
h1.page-title {
    font-size: 28px !important;
    font-weight: bold !important;
    color: #00447c;
    margin-top: 4px;
    margin-bottom: 12px;
}
header {
  overflow: hidden;
}

header img {
  margin-left: 50%;
  transform: translateX(-50%);
}
        </style>
        <!-- Latest compiled and minified CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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
            @include('template.includes.header')
            <div class="page-container clearfix col-md-12 col-sm-12" style="min-height: 504px;">
                @include('template.includes.sidebar')
                @yield('banner')
                
                <div class="column-center">
                    <h1 class="page-title">@yield('title')</h1>

                </div>
              <div class="@yield('class')">
                <div class="container">
                    @yield('content')                    
                </div>
            </div>
            </div>
@include('template.includes.footer')
</body>
</html>