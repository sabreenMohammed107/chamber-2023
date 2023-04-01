@extends('Customer.webLayout.web')

@section('content')



<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-4">
          <h1 class="mb-2 bread"> @if(app()->getLocale()=='en')
                                                {{$row->en_name}}
                                                @else
                                                {{$row->ar_name}}
                                                @endif</h1>
        </div>
      </div>
    </div>
  </section>
  <!--========== End Banner ==========--><!--========== التعريق بالشخص ==========-->
<section class="ftco-section ftco-wrap-about">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-2 ftco-animate">
                   
                        <img src="{{ asset('uploads/people/'.$row->image) }}" class="img-thumbnail">
                </div>

                <div class="col-md-10 mt-3 text-right ftco-animate">
                   
                        <h4>@if(app()->getLocale()=='en')
                                                {{$row->en_name}}
                                                @else
                                                {{$row->ar_name}}
                                                @endif
                                              {{$row->id}}</h4>
                </div>
            </div>

                    <div class="row justify-content-center">

                        <div class="col-md-2"></div>

                        <div class="col-md-10">
                        @if(app()->getLocale()=='en')
                                                {!!$row->en_cv!!}
                                                @else
                                                {!!$row->ar_cv!!}
                                                @endif
                        </div>


                    </div>






                </div>
            </div>
        </div>
    </section>
    @endsection
@section('scripts')
@endsection


    