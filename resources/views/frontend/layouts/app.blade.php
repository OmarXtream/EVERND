<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta property="og:title" content="إيفرند - EVERND" />
<meta property="og:site_name" content="EVERND" />
<meta property="og:type" content="realestate" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'EVERND Real Estate') }}</title>

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/reality-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootsnav.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.transitions.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/cubeportfolio.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/range-Slider.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/search.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
<link rel="icon" href="{{asset('frontend/images/favicon.png')}}">
<link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon" />

@yield('styles')

</head>
<body>



<!--Loader-->
<div class="loader">
  <div class="span">
    <div class="location_indicator"></div>
  </div>
</div>
 <!--Loader--> 

 @include('frontend.partials.navbar')

 @if(Request::is('/'))
 @include('frontend.partials.slider')
 @endif

{{-- MAIN CONTENT --}}
@yield('content')

{{-- FOOTER --}}
@include('frontend.partials.footer')





@yield('scripts')

</body>
</html>