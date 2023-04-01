<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>الغرفة التجارية للقاهرة</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--========== Fontawesome ==========-->
  <link rel="stylesheet" href="{{ asset('webasset/css/font-awesome.min.css')}}">

  <!--========== Animate CSS ==========-->
  <link rel="stylesheet" href="{{ asset('webasset/css/animate.css')}}">

  <!--========== Hover CSS ==========-->
  <link rel="stylesheet" href="{{ asset('webasset/css/hover-min.css')}}">

  <!--========== Carousel CSS ==========-->
  <link rel="stylesheet" href="{{ asset('webasset/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('webasset/css/owl.theme.default.min.css')}}">
  <!--========== data table CSS ==========-->
  <link rel="stylesheet" href="{{ asset('webasset/css/dataTables.bootstrap.min.css')}}">
  <!--========== lightbox CSS ==========-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('webasset/css/zabuto_calendar.min.css')}}">
  <!-- =================fas icons=========================== -->
   <!--========== fancy CSS ==========-->
   <link rel="stylesheet" type="text/css" href="{{ asset('webasset/css/jquery.fancybox.css')}}">   
  <!--========== Main Style CSS ==========-->
  <link rel="stylesheet" href="{{ asset('webasset/css/style.css')}}">
  <!--========== wow CSS ==========-->
  <!-- <link rel="stylesheet" href="css/wow/animate.css"> -->



  @yield('style')
</head>

