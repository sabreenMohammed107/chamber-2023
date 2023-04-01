@extends('Customer.webLayout.web')

@section('content')


<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread"> {{ __('links.retailAcademy') }}</h1>
            </div>
        </div>
    </div>
</section>
<!--========== End Banner ==========-->

<!--========== أكاديمية التجزئة   ==========-->
<section class="ftco-section ftco-wrap-about">
    <div class="container">
        <div class="row">

            <div class="col-md-7 ftco-animate text-justify img-thumbnail p-4">
                <img class="moon" src="{{ asset('webasset/images/Cairo-Retail-Academy.png')}}" style="width: 150px; height: 150px;" />
                <div class="heading-section mb-4 my-5 my-md-0">
                    <h2 class="mb-4 text-decoration">{{ __('links.aboutAcademy') }}</h2>
                </div>

    
                {!!$data->ar_text!!}






            </div>

            <div class="col-md-5 ftco-animate ">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        @foreach($galleries as $key => $gallery)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            @if($gallery !=null && $gallery->vedio!=null)
                            <a class="col-md-3 text-center various fancybox fancy.iframe" data-fancybox-type="iframe" href="{{$gallery->vedio}}">
                                <img src="{{ asset('uploads/article/'.$gallery->image) }}" style="height: 200px !important;width:100%" alt="img-1" class="img-fluid"></a>
                            <div class="overlay"></div>
                            @else
                            <a class="various" href="{{ asset('uploads/article/'.$gallery->image) }}" data-fancybox="gallery" data-srcset="large.jpg 1600w, medium.jpg 1200w, small.jpg 640w">
                                <img src="{{ asset('uploads/article/'.$gallery->image) }}" style="height: 200px !important;width:100%" alt="img-1" class="img-fluid"></a>
                            <div class="overlay"></div>
                            @endif

                        </div>
                        @endforeach


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-left" style="color: #000;" aria-hidden="true"></i></span> <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-right" style="color: #000;" aria-hidden="true"></i></span> <span class="sr-only">Next</span> </a>
                    <!-- ================sasa new=========================  -->
                    <ol class='carousel-indicators fix-width scroll-inner'>
                        @foreach($galleries as $key => $gallery)

                        <li data-target="#carouselExampleControls" data-slide-to="{{$key}}" class="{{$key == 0? 'active' : '' }}">
                            <img src="{{ asset('uploads/article/'.$gallery->image) }}" alt='' />
                        </li>

                        @endforeach

                    </ol>
                    <!-- =====================sasa end======================= -->
                </div>
            </div>
        </div>
        <!-- =====================counter =================== -->
        <section class="ftco-counter " id="section-counter">
            <div class="container">
                <div class="statistic ">
                    <div class="section-header mb-5">
                        <h3>{{ __('titles.numbers') }}</h3>
                        <!-- <p class="text-center mt-5">هدفنا الوصول اليك في كل وقت ومكان. فإرضائك هو هدفنا.</p> -->
                    </div>
                    <div class="row justify-content-center">

                        <div class="col-md-12">
                            <div class="row">
                                @foreach($chamberNumbers as $number)
                                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
                                    <div class="block-18 text-center">
                                        <div class="text">
                                            <strong class="number" data-number="{{$number->value}}">{{$number->value}}</strong>
                                            <span style="font-size: 25px; font-weight: bold;">
                                                @if(app()->getLocale()=='en')
                                                {{$number->en_name}}
                                                @else
                                                {{$number->ar_name}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- photo -->

        <div class="col-md-12 mb-3 mt-3 text-center">
            <h3 class="font-weight-bold">{{ __('titles.graduates') }}</h3>
            <hr class="TitlesHr" style="width: 3%; margin-top: 30px; margin-right: 47%">
        </div>
        <div class="row">
            <div class="container text-center">
                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                  

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        @foreach($acdemyGalleries as $key => $gallery)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            @foreach($acdemyGalleries as $gallery)
                            <div class="col-md-4">

                                <img class="card-img-top" src="{{ asset('uploads/academy/'.$gallery->image) }}" alt="Card image cap">


                            </div>
                            @endforeach


                        </div>
                        @endforeach
                        <!--/.First slide-->

                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->
            </div>
        </div>
    </div>
</section><!-- #clients -->

@include('Customer.academy.footeracademy')



@endsection