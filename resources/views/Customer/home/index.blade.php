@extends('Customer.webLayout.web')

@section('content')
<!-- advertsment -->

<div id="overlay">
  <div class="overShow">
    <h2>الغرفة التجاريه بالقاهرة</h2>

    <p>ضع أعلانك المميز هنا .</p>

    <a href="{{$mainAds->url}}" target="_blank">

      <img src="{{ asset('uploads/ads')}}/{{$mainAds->image}}" alt="advertsment" style="width:100%;height: 350px;">
    </a>


    <button onclick="off()">X </button>
  </div>
</div>
<!-- end -->
<!--========== Start Slider ==========-->
<section class="  home-slider owl-carousel js-fullheight">

  @foreach($sliders as $slider)



  <div class="slider-item js-fullheight" style="background-image: url({{ asset('uploads/slider/'.$slider->image) }});">
    <div class="overlay"></div>

    <div class=" slider-text-edited js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

      <div class="col-md-6 text-lg-right sasa-ani">
        <div class="sasa-ani-ani">
          <h1 class="mb-4 text-dark">
            @if(app()->getLocale()=='en')
            {{$slider->master_en_text}}
            @else
            {{$slider->master_ar_text}}
            @endif </h1>

          <p> @if(app()->getLocale()=='en')
            {{$slider->sub_en_text}}
            @else
            {{$slider->sub_ar_text}}
            @endif</p>

          <button class="btn btn-primary  mr-3 ml-3 float-right font-weight-bold">
            <a href="shahbandr.cairochamber.org.eg" target="_blank"><span class="fa fa-angle-double-left"></span>
              {{ __('titles.more') }} </a>
          </button>
        </div>
      </div>

      <div class="col-md-6"></div>

    </div>
    <!--==================== End  edit slider-text sasa=================== -->
    <!-- </div> -->
  </div>

  @endforeach
</section>
<!--========== End Slider ==========-->
<!--========== start Adv section Slider ==========-->
<section class=" advertisement ">

  <div class="container">


    <!-- Grid row -->
    <div class="row mt-5 ">

      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-3">

        <div class="cube">
          @isset($ads['0'])
          <a href="{{ $ads['0']['url']}}" target="_blank">
            <div class="flippety" style="background-image: url({{ asset('uploads/ads')}}/{{ $ads['0']['image']}});">
              <h1>إعلانك رقم 1 </h1>

            </div>
          </a>
          @endisset
          @isset($ads['1'])
          <a href="{{ $ads['1']['url']}}" target="_blank">
            <div class="flop" style="background-image: url({{ asset('uploads/ads')}}/{{ $ads['1']['image']}});">
              <h2>إعلانك رقم 2 </h2>
            </div>
          </a>
          @endisset
        </div>

      </div>

      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-3">

        <div class="cube">
          @isset($ads['2'])
          <a href="{{ $ads['2']['url']}}" target="_blank">
            <div class="flippety " style="background-image: url({{ asset('uploads/ads')}}/{{ $ads['2']['image']}});">
              <h1>إعلانك هنا </h1>
            </div>
          </a>
          @endisset
          @isset($ads['3'])
          <a href="{{ $ads['3']['url']}}" target="_blank">
            <div class="flop" style="background-image: url({{ asset('uploads/ads')}}/{{ $ads['3']['image']}});">
              <h2>إعلانك هنا</h2>
            </div>
          </a>
          @endisset
        </div>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-3 ">

        <div class="cube">
          @isset($ads['4'])
          <a href="{{ $ads['4']['url']}}" target="_blank">
            <div class="flippety " style="background-image: url({{ asset('uploads/ads')}}/{{ $ads['4']['image']}});">
              <h1>إعلانك هنا</h1>
            </div>
          </a>
          @endisset
          @isset($ads['5'])
          <a href="{{ $ads['5']['url']}}" target="_blank">
            <div class="flop" style="background-image: url({{ asset('uploads/ads')}}/{{ $ads['5']['image']}});">
              <h2>إعلانك هنا</h2>
            </div>
          </a>
          @endisset
        </div>

      </div>
      <!-- Grid column -->

    </div>



  </div>
</section>
<!--========== End  Adv section ==========-->


<!--========== Start Tabs ==========-->
<section class="  mainNews">
  <div class="container">
    <div class="ftco-search">
      <div class="row">
        <div class="col-md-12 nav-link-wrap">
          <div class="nav nav-pills d-flex   text-center justify-content-center align-items-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">
              <span>{{ __('titles.news') }}</span>

            </a>

            <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">
              <span>{{ __('titles.electronic') }}</span>

            </a>

            <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">
              <span>{{ __('titles.services') }}</span>
            </a>

            <!-- <a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab"
            aria-controls="v-pills-4" aria-selected="false">
            <span>الفعاليات</span>
          </a> -->

            <!-- <a class="nav-link ftco-animate" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab"
            aria-controls="v-pills-5" aria-selected="false">
            <span>التدريبات و التوظيف</span>
          </a> -->


          </div>
        </div>
        <div class="col-md-12 tab-wrap">

          <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
              <div class="row d-flex align-items-stretch">
                <div class="col-md-1"></div>
                <div class=" col-md-10 col-xs-12">
                  <div class=" panel panel-default">
                    <div class=" panel-heading mt-5">
                      <!-- <p id="newTitle"> الاخبار</p> -->
                    </div>
                    <div class=" panel-body ">
                      <div class="row">
                        @foreach($news as $new)
                        @if((app()->getLocale()=='en' && $new->en_title )||(app()->getLocale()=='ar' &&$new->ar_title ))
                        <div class=" col-md-4 wow fadeInDown" data-wow-delay="0.2s" data-wow-duration="1s" data-wow-delay="0s">
                          <div class="card">
                            @if($new->gallery!=null && $new->gallery->first() !=null && $new->gallery->first()->order==1)
                            @if($new->gallery->first()->image!=null)
                            <img src="{{ asset('uploads/news/'.$new->gallery->first()->image) }}" alt="...">
                            @else
                            <iframe id="popup-youtube-player" width="100%" height="200" src="{{$new->gallery->first()->vedio}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
                            @endif
                            @else
                            <img src="" alt="no image">
                            @endif
                            <div class="card-body">
                              <div style="position: relative;height: 70px ;border-bottom: 1px solid #ccc;">
                                <a href="{{ url('newsDetails/'.$new->id) }}">
                                  <h5>
                                    @if(app()->getLocale()=='en')
                                    {{ Str::limit($new->en_title, 70,'') }}

                                    @else
                                    {{ Str::limit($new->ar_title, 70,'') }}

                                    @endif
                                  </h5>
                                </a>
                                <span style="color: #ccc ;">
                                  <?php $date = date_create($new->news_date) ?>
                                  {{ date_format($date,"d-m-Y H:i:s") }}
                                </span>
                              </div>

                              <p>
                                @if(app()->getLocale()=='en')
                                <?php
                                $output = nl2br(str_replace("&nbsp;", " ", $new->en_text));
                                ?>
                                {{Str::words(strip_tags($output),25,'...')}}
                                @else
                                <?php
                                $output = nl2br(str_replace("&nbsp;", " ", $new->ar_text));
                                ?>
                                {{Str::words(strip_tags($output),30,'...')}}

                                @endif
                              </p>

                              <a href="{{ url('newsDetails/'.$new->id) }}" class="btn btn-primary">{{ __('titles.more') }}</a>

                            </div>

                          </div>

                        </div>






                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>




                <div class="col-md-4 text-center"></div>

                <div class="col-md-4 text-center  mt-5">
                  <p><a href="{{url('/news')}}" class="btn btn-primary w-100">{{ __('titles.seeAll') }}</a></p>
                </div>


              </div>
            </div>
            <!--===================End News tab ====================-->

            <div class="tab-pane fade " id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab" style="padding: 50px 0 100px 0!important; ">
              <div class="row d-flex justify-content-center greyly " style="padding: 130px 0 !important; ">



                <div class="col-md-4 col-5 text-center electronicPayment">
                  <a href="online-payment.html">
                    <img src="{{ asset('webasset/images/icons/payment.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('titles.serv') }} <br>{{ __('titles.payment') }} </h5>
                  </a>
                </div>

                <div class="col-md-4 col-5 text-center electronicPayment">
                  <a href="qr-code.html">
                    <img src="{{ asset('webasset/images/icons/qr-code.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('titles.serv') }} <br>{{ __('titles.qr') }} </h5>
                  </a>
                </div>

                <div class="col-md-4 col-5 text-center electronicPayment">
                  <a href="blockchain.html">
                    <img src="{{ asset('webasset/images/icons/blockchain.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('titles.serv') }} <br>{{ __('titles.block') }} </h5>
                  </a>
                </div>



              </div>
            </div>

            <div class="tab-pane fade greyly" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab" style="padding: 80px 0 100px 0!important; margin-top: 70px;">
              <div class="row d-md-flex justify-content-center chamberServices" style="padding: 30px 0 !important; ">
                <?php
                $articleId = 1;
                $medicalId = 2;
                $insuranceId = 3;
                $ershadId = 4;
                $clubId = 5;
                $chamberConferanceId = 6;
                $tawfeekId = 7;
                $ladiesId = 8;

                ?>

                <div class="col-md-3 col-6 text-center ">
                  <a href="{{ url('article/'.$insuranceId) }}">
                    <img src="{{ asset('webasset/images/icons/heartbeat.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.lifeInsurance') }}</h5>
                  </a>
                </div>



                <div class="col-md-3 col-6 text-center">
                  <a href="{{ url('article/'.$medicalId) }}">
                    <img src="{{ asset('webasset/images/icons/first-aid-kit.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.healthCare') }}</h5>
                  </a>
                </div>
                <div class="col-md-3 col-6 text-center">
                  <a href="{{ url('article/'.$tawfeekId) }}">
                    <img src="{{ asset('webasset/images/icons/champr-serv-icon-3 (1).png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.arbitration') }}</h5>
                  </a>
                </div>

                <div class="col-md-3 col-6 text-center">
                  <a href="{{ url('article/'.$articleId) }}">
                    <img src="{{ asset('webasset/images/icons/education.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.excellence') }}</h5>
                  </a>
                </div>


                <div class="col-md-4 col-6 text-center mt-5">
                  <a href="{{ url('article/'.$chamberConferanceId) }}">
                    <img src="{{ asset('webasset/images/icons/meeting.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.conferenceRoom') }}</h5>
                  </a>
                </div>


                <div class="col-md-4 col-6 text-center mt-5">
                  <a href="{{ url('article/'.$clubId) }}">
                    <img src="{{ asset('webasset/images/icons/global-community.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.tradersClub') }}</h5>
                  </a>
                </div>


                <div class="col-md-4 col-6 text-center mt-5">
                  <a href="{{ url('article/'.$ershadId) }}">
                    <img src="{{ asset('webasset/images/icons/business-people.png')}}" class="img-fluid mb-4">
                    <h5>{{ __('links.commerExtention') }}</h5>
                  </a>
                </div>



              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">

              <!--=======================End events tab=========================-->

              <!-- <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-day-5-tab">
            <div class="row justify-content-center">




            </div>
          </div> -->

            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!--========== End Tabs ==========-->
<!--===========strat traning section =============-->
<!-- =======================calender section ===
================== -->
<section class="event-calender ">
  <div class="container">
    <div class="section-header">
      <h3>{{ __('titles.events') }} </h3>

      <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-5 col-xs-12 " style=" margin-top: 40px; ">
          <div id="calendar" class="calendar-base wow fadeInDown"></div>
        </div>
        <style>
          .event-calender .carousel-control-next-icon,
          .event-calender .carousel-control-prev-icon {
            background: #000 !important;
          }
        </style>
        <!-- calendar-left -->
        <div class="col-md-5 col-xs-12 mr-3 wow fadeInDown" data-wow-delay="0.5s" style=" margin-top: 10px;">
          <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner ">
              @if(!$conferences->isEmpty())
              @foreach($conferences as $key => $conference)
              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">



                @if($conference->gallery!=null && $conference->gallery->first()!=null && $conference->gallery->first()->image!=null)
                <a href="{{ url('conferenceDetails/'.$conference->id) }}">
                  <img src="{{ asset('uploads/conferance/'.$conference->gallery->first()->image) }}" class="d-block calendar-base" style="width: 100%; height: 300px; margin-top: 30px;">
                </a>
                @else
                <img src="{{ asset('webasset/images/unnamed.png')}}" class="d-block calendar-base" style="width: 100%; height: 300px; margin-top: 30px;">
                @endif





              </div>
              @endforeach
              @else
              <a href="{{url('/')}}">
                <img src="{{ asset('webasset/images/cairo-chamber-logo.png')}}" class="d-block calendar-base" style="width: 100%; height: 300px; margin-top: 30px;">
              </a>
              @endif
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">
                  <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">
                  <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div>

        </div>
        <!-- </div> -->

        <div class="col-md-4 text-center"></div>

        <div class="col-md-4 text-center  mt-5">
          <p><a href="{{url('/conference')}}" class="btn btn-primary w-100">{{ __('titles.eventsPage') }}</a></p>
        </div>


      </div>
    </div>
  </div>
</section>
<!-- ======================end calender================= -->
<!--========== End Magazin Parallex ==========-->
<section class=" joinTraining">
  <div class="container ">
    <div class="section-header mb-4">
      <h3>{{ __('links.aboutAcademy') }}</h3>

    </div>
    <div class="row mt-5">
      <div class="col-md-4 col-12 wow fadeInDown">
        <div class="row h100   ml-1">

          <!-- <img src="images/form.jpg" class=" img-fullwidth h100 join-image " alt="alt text"> -->
          <iframe width="560" height="315" class="greyly  img-fullwidth h100 join-image " src="https://www.youtube.com/embed/J06I7TD5QpI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <?php
        $articleAcademy = 9;
        $academytraining = 10;
        ?>
        <div class="row h100 mb-4 ">
          <div class="col-md-11  mb-4 greyly  event wow fadeInDown" data-wow-delay="1s">
            <a href="{{ url('academytraining/'.$academytraining) }}" class="text-black ">
              <h5 class="text-black cstm">{{ __('links.training') }}</h5>
              <p class="eventP">خدمات التدريب بالغرفة التجارية بالقاهرة تعمل على إحداث طفرة حقيقية للقطاع الخاص
                ودعم إمكاناته عبر تقديم خدمات التدريب والتأهيل لمواجهة تحديات المستقبل ومتطلبات
                التنمية، بالإضافة إلى تقديم نشاطات تدريبية موجهة للتطوير المستمر لمهارات القطاع الخاص،
                وذلك للمساهمة الفعالة في تشجيع الشباب للانخراط والعمل في القطاع الخاص وذلك بعد تدريبه بالشكل
                الملائم والمناسب.

              </p>



              <div class="overlay ">
                <div class="text">
                  <button class="btn btn-primary">
                    <a href="{{ url('academytraining/'.$academytraining) }}">{{ __('titles.knowmore') }}</a>
                  </button>
                </div>
              </div>

            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12 ">
        <div class="row  mb-4 h100 ">
          <div class="col-md-11  mb-4 greyly  event wow fadeInDown" data-wow-delay="0.5s">
            <a href="{{ url('academy/'.$articleAcademy) }}" class="text-black">
              <h5 class="text-black cstm">{{ __('links.jobs') }}</h5>
              <p class="eventP"> خدمات التدريب بالغرفة التجارية بالقاهرة تعمل على إحداث طفرة حقيقية للقطاع الخاص
                ودعم إمكاناته عبر تقديم خدمات التدريب والتأهيل لمواجهة تحديات المستقبل ومتطلبات
                التنمية، بالإضافة إلى تقديم نشاطات تدريبية موجهة للتطوير المستمر لمهارات القطاع الخاص،
                وذلك للمساهمة الفعالة في تشجيع الشباب للانخراط والعمل في القطاع الخاص وذلك بعد تدريبه بالشكل
                الملائم والمناسب.

              </p>



              <div class="overlay">
                <div class="text">
                  <button class="btn btn-primary">
                    <a href="{{ url('academy/'.$articleAcademy) }}">{{ __('titles.knowmore') }}</a>
                  </button>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>




    </div>
  </div>

</section>

<!--===========end traning section =============-->

<section class="MagazinParallex">
  <div class="section-header mb-4">
    <h3>{{ __('titles.importantAnnoounce') }}</h3>
  </div>

  <div class="container adv mt-5">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div id="advCarousel" class="carousel slide" data-ride="carousel" data-interval="false">

          <div class="carousel-inner">
            @foreach($announces as $key => $announce)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">

              @if($announce->gallery!= null && $announce->gallery->first()!=null && $announce->gallery->first()->image!=null)
              <img src="{{ asset('uploads/announce/'.$announce->gallery->first()->image) }}" alt="Image" style="max-width:100%;">

              @else
              <img src="{{ asset('webasset/images/unnamed.png')}}" alt="no image" style="max-width:100%;">
              @endif
              <div class="advr">
                <div class="carousel-caption line-height:inherit">

                  <div class="row">
                    <span class="col-md-3 col-2 banner-text-bg bounceInLeft aimated text-span">
                      <?php $date = date_create($announce->announce_date) ?>
                      {{ date_format($date,"d-m-Y") }}

                      </h6>
                    </span>
                    <a href="{{ url('announceDetails/'.$announce->id) }}"><span class="col-md-9 col-10 test-news">
                    @if(app()->getLocale()=='en')
                                    {{ Str::limit($announce->en_title, 70,'') }}

                                    @else
                                    {{ Str::limit($announce->ar_title, 70,'') }}

                                    @endif
                      </span></a> </div>
                  <!-- <a class="more" style="z-index:20" href="advertesment.html">المزيد...</a> -->


                </div>
              </div>
            </div>

            @endforeach

            <!--.item-->



            <a class="latestNews" href="{{url('/announce')}}">{{ __('titles.latestannounce') }}</a>

          </div>
          <!--.carousel-inner-->
          <!-- <a data-slide="prev" href="#advCarousel" class="left carousel-control">
          <span class="ion-ios-arrow-back">
            <</span> </a> <a data-slide="next" href="#advCarousel" class="right carousel-control"><span
                class="ion-ios-arrow-forward">></span></a> -->
        </div>
        <!--.Carousel-->
      </div>
    </div>
  </div>

</section>




@endsection
@section('scripts')
@endsection