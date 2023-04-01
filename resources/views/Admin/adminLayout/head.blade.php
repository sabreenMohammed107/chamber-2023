<!DOCTYPE html>
<html lang="ar">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>أدمن الغرفة التجارية</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('adminasset/vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('adminasset/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
  <link rel="stylesheet" href="{{ asset('adminasset/vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
  <link rel="stylesheet" href="{{ asset('adminasset/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('adminasset/css/bootstrap.min.css')}}" rel="stylesheet">
   <!-- Date picker -->
   <link rel="stylesheet" href="{{ asset('adminasset/css/datepicker.css')}}">
  <!-- jQuery UI -->
  <link href="{{ asset('adminasset/css/jquery-ui.min.css')}}" rel="stylesheet">
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="{{ asset('adminasset/css/datatables.min.css')}}" rel="stylesheet">
  <link href="{{ asset('adminasset/css/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('adminasset/css/select.min.css')}}" rel="stylesheet">
    <!--sweeter-->
    <link rel="stylesheet" href="{{ asset('adminasset/css/sweetalert2.min.css')}}">
  <!-- Mystic styles -->
  <link href="{{ asset('adminasset/css/style.css')}}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('adminasset/img/logo/150.jpg')}}">

  <!--Search sabreen-->
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<script src="https://thdoan.github.io/bootstrap-select/js/bootstrap-select.js"></script>

<link rel="stylesheet" href="https://thdoan.github.io/bootstrap-select/css/bootstrap-select.css">





</head>
<style>

  .breadcrumb {
    background-color: #050e58;

  }
  .ms-content-wrapper {
    padding:0
  }
  .ms-aside-left-open .body-content .navbar {
    width:100%;
    left:0;
  }
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.review-rating>i {
    color: #FFB656;
}
  .review-rating>i.empty {
    color: #DADADA;
}
.review-rating>i:hover:before {
  content: "\f005";
  color: #FFB656 !important;
 
}
.review-rating>input:checked~i{
  content: "\f005";
  color: #FFB656 !important;

}
/**********
Add Testimonial

 */
.stars {
  display: inline-block;
  vertical-align: top;
}

.stars input[type="radio"] {
  display: none;
}

.stars>label {
  float: right;
  cursor: pointer;
  padding: 0px 3px;
  margin: 0px;
  -webkit-transition: 0.3s all;
  transition: 0.3s all;
}

.stars>label:hover, .stars>label:hover~label {
  -webkit-transform: scale(1.5);
  -ms-transform: scale(1.5);
  transform: scale(1.5);
}

.stars>label:before {
  content: "\f005";
  font-family:'Font Awesome 5 Free';
  font-style: normal;
  font-weight: normal;
  color: #DADADA;
  font-size: 14px;
  -webkit-transition: 0.3s all;
  transition: 0.3s all;
}

.stars>label:hover:before, .stars>label:hover~label:before {
  content: "\f005";
  color: #FFB656 !important;
 
}

.stars>input:checked label:before, .stars>input:checked~label:before {
  content: "\f005";
  color: #FFB656 !important;

}

/***************
select search
**********************/
.dropdown-item.active, .dropdown-item:active {
  color: #FFB656;
  text-decoration: none;
  background-color: #044c04c2;
}
.bootstrap-select .dropdown-menu li a span.text {
  color: #000;
  display: inline-block;
}
/********************
  </style>