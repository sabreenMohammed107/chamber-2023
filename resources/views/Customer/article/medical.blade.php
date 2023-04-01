@extends('Customer.webLayout.web')

@section('content')


<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">{{ __('links.healthCare') }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!--========== End Banner ==========-->


<!--========== مركز تميز لخدمات التجار ==========-->
<section class="ftco-section ftco-wrap-about">
    <div class="container">
        <div class="row">

        <div class="col-md-7 ftco-animate text-justify img-thumbnail p-4">
                    <div class="heading-section mb-4 my-5 my-md-0">
                        <h2 class="mb-4 text-decoration">{{ __('links.healthCare') }}</h2>
                    </div>
                    @if(app()->getLocale()=='en')
                {!!$data->en_text!!}
                @else
                {!!$data->ar_text!!}
                @endif



            </div>
            <div class="col-md-5 ">
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

    </div>

</section>

    @endsection