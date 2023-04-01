@extends('Customer.webLayout.web')

@section('content')
<!--========== Start Banner ==========-->

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">@if(app()->getLocale()=='en')
                    {{Str::limit($socialresObj->en_title,40,'')}}
                    @else
                    {{Str::limit($socialresObj->ar_title,40,'')}}
                    @endif</h1>
                </div>
            </div>
        </div>
    </section>
<!--========== End Banner ==========-->


<!--========== تفاصيل المسئولية المجتمعية ==========-->
    <section class="ftco-section ftco-wrap-about">
        <div class="container">
            <div class="row">
               
            
                    <div class="col-md-7 ftco-animate text-justify img-thumbnail p-4">
                      <div class="heading-section mb-4 my-5 my-md-0">
                        <h2 class="mb-4 text-decoration">@if(app()->getLocale()=='en')
                    {{$socialresObj->en_title}}
                    @else
                    {{$socialresObj->ar_title}}
                    @endif</h2>
                      </div>
                      <p>  @if(app()->getLocale()=='en')
                  {!! $socialresObj->en_text !!}
                  @else
                  {!! $socialresObj->ar_text !!}
                  @endif </p>
         
                     
          
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('uploads/socialty/'.$socialresObj->image) }}" class="img-thumbnail">
                    </div>
                  </div>
              
            


        </div>
    </section>



@endsection
@section('scripts')

@endsection