@extends('partials.website.app')
@section('website_content')

<iframe id="ifram" src="{{$book->livre}}" scrolling="no" frameborder="0" height="100%" width="100%" style="position:absolute;clip:rect (190px,1100px,800px,250px);top: 0;z-index: -1;">

  <style>
    #ifram {
      position: absolute;
      clip: rect (190px, 1100px, 800px, 250px);
      top: 0 !important;
      z-index: -18 !important;
    }
  </style>

  @endsection