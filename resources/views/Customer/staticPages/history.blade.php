@extends('Customer.webLayout.web')

@section('content')

<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-4">
          <h1 class="mb-2 bread"> تاريخ  الغرفة التجارية</h1>
        </div>
      </div>
    </div>
  </section>
  <!--========== End Banner ==========-->




  <!--========== تاريخ الغرفة ==========-->
  <section class="ftco-section ftco-wrap-about bg-light">
        <div id="cd-timeline" class="cd-container">
    
                <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-picture">
                            <h5>بداية الحلم</h5>
                        </div> <!-- cd-timeline-img -->
            
                        <div class="cd-timeline-content">
                            <div class="text-center"><h2>1913</h2></div>
                            
                            <p>كـانت أول غرفة مصريـة هى تلك التـي أنشـأها في القـاهـرة (عبدالخالـق مدكور باشـا) باسـم "سر تجـار القاهرة" في عـام 1913 وقـد ضمـت بعض تجـار القـاهـرة وسمى رئيسها "شاهبنـدر التجـار" وشـاهبنـدر كـلمـة أصلها تركي ومعناها رئيس</p>
                            <span class="cd-date"><img src="{{ asset('webasset/images/slider2.jpg')}}" class="img-fluid"></span>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
            
                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-movie">
                        
                        </div> <!-- cd-timeline-img -->
            
                        <div class="cd-timeline-content">
                                <div class="text-center"><h2>1919</h2></div>
                            <p> قـرروا طائفـة مـن تجار العاصمة المعـروفين برئاسة "عبد القادر الجمال باشا" تأسيس غرفة تجارية مصرية لمدينة القاهرة وانتخبوه رئيساً لهـا وأنعـم عليـه "المـلـك فـؤاد" بلقـب شاهبنـدر تجـارة القاهـرة </p>
                            <span class="cd-date"><img src="{{ asset('webasset/images/slider2.jpg')}}" class="img-fluid"></span>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
            
               
            
                </div> <!-- cd-timeline -->
  </section>





@endsection
@section('scripts')
@endsection