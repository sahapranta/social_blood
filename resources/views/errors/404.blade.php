<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Social Blood') }}</title>
    <link rel="shortcut icon" href="{{ asset('image/icons/blood.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('image/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('image/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('image/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('image/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('image/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('image/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('image/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('image/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('image/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('image/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('image/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('image/icons/favicon-16x16.png')}}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="copyright"content="Pranta Saha">
    <meta name="language" content="EN">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="theme-color" content="#f84d61">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Application Title">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="msapplication-navbutton-color" content="#f84d61">
    <meta name="msapplication-TileColor" content="#f84d61">
    <meta name="msapplication-TileImage" content="{{ asset('image/icons/ms-icon-144x144.png') }}">
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="application-name" content="Application Name">
    <meta name="msapplication-tooltip" content="Tooltip Text">
    <meta name="msapplication-starturl" content="/">
        <!-- Tap highlighting  -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="manifest" href="manifest.json" />

    <!-- UC Mobile Browser  -->
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">

   

    <!-- Fitscreen  -->
    <meta name="viewport" content="uc-fitscreen=yes"/>

    <!-- Layout mode -->
    <meta name="layoutmode" content="standard">

    <!-- imagemode - show image even in text only mode  -->
    <meta name="imagemode" content="force">

    <!-- Orientation  -->
    <meta name="screen-orientation" content="portrait">
</head>
<body>
<svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
    </g>
</svg>
<div class="message-box">
  <h1>404</h1>
  <p>Page not found</p>
  <div class="buttons-con">
    <div class="action-link-wrap">
      <a onclick="history.back(-1)" class="link-button link-back-button">Go Back</a>
      <a href="/" class="link-button">Go to Home Page</a>
    </div>
  </div>
</div>
</body>
</html>