@extends('Customer.webLayout.web')

@section('content')


<!--========== Start Banner ==========-->

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">{{ __('links.courses') }}</h1>
      </div>
    </div>
  </div>
</section>
<!--========== End Banner ==========-->


<!--========== أكاديمية التجزئة   ==========-->
<section class=" ftco-wrap-about">
  <div class="container">
    <div class=" text-justify mt-3 p-4 mr-5">
      <div class="section-header ">
        <h3>{{ __('links.training') }}</h3>

      </div>


      <p>
        خدمات التدريب بالغرفة التجارية بالقاهرة تعمل على إحداث طفرة حقيقية للقطاع الخاص
        ودعم إمكاناته عبر تقديم خدمات التدريب والتأهيل لمواجهة تحديات المستقبل ومتطلبات
        التنمية، بالإضافة إلى تقديم نشاطات تدريبية موجهة للتطوير المستمر لمهارات القطاع الخاص،
        وذلك للمساهمة الفعالة في تشجيع الشباب للانخراط والعمل في القطاع الخاص وذلك بعد تدريبه بالشكل
        الملائم والمناسب.

      </p>

    </div>
    <div class="col-md-6  ftco-animate mt-2 ">
      @if(app()->getLocale()=='en')
      <h4 style="text-align: left !important">{{ __('links.courses') }}</h4>
      @else
      <h4>{{ __('links.courses') }}</h4>
      @endif

    </div>
    <div class="row">

      <div class="container text-center">
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

          <div class="controls-top" style="text-align: center">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
          </div>
          <!--/.Controls-->



          <!--Slides-->
          <div class="carousel-inner" role="listbox">

            <!--First slide-->
            @foreach($coursegalleries as $key => $gallery)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
              @foreach($coursegalleries as $gallery)

              <div class="col-md-3">
                <div class="card mb-2">
                  <img class="card-img-top" src="{{ asset('uploads/academy/'.$gallery->image) }}" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">
                      @if(app()->getLocale()=='en')
                      {{$gallery->en_name}}
                      @else
                      {{$gallery->ar_name}}
                      @endif
                    </h4>
                    <p class="card-text">
                      @if(app()->getLocale()=='en')
                      {!! Str::limit($gallery->en_description, 120,'...') !!}
                      @else
                      {!! Str::limit($gallery->ar_description, 150,'...') !!}
                      @endif
                    </p>
                    <a href="{{ url('courseRegisteration/'.$gallery->id) }}" class="btn btn-primary">{{ __('titles.registerbutton') }}</a>
                  </div>
                </div>
              </div>




              @endforeach


            </div>
            @endforeach



          </div>
          <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12 ftco-animate text-justify img-thumbnail p-4 mr-3">


        <h6>{{ __('titles.allcourses') }}</h6>


        <div class="row CoursesUl" style="display: flex;flex-wrap: wrap;">
          @foreach($courses as $course)
          <div style=" flex-grow: 1;width: 31%;margin:0 5px 5px">

            <li><a href="#" class="text-dark">
                @if(app()->getLocale()=='en')
                {{$course->en_name}}
                @else
                {{$course->ar_name}}
                @endif
              </a></li>


          </div>
          @endforeach



          </ul>





        </div>

      </div>



    </div>
</section>



@include('Customer.academy.footeracademy')



@endsection