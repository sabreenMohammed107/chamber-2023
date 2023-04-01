@extends('Customer.webLayout.web')

@section('content')

<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">{{ __('titles.countriesProtocol') }}</h1>
          </div>
        </div>
      </div>
    </section>
    <!--========== End Banner ==========-->



<!--========== الشعب التجارية ==========-->
    <section class="ftco-section ftco-wrap-about">
        <div class="container">
          <div class="row">
           
            <div class="col-md-12 ftco-animate">
              <div class="heading-section mb-5 my-5 my-md-0">
            </div>

            <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr class="bg-brown text-white">
                            <td>{{ __('titles.agreement') }}</td>
                           
                            <td>{{ __('titles.date') }}</td>
                            <td>{{ __('titles.show') }}</td>
                        </tr>
@foreach($agreements as $agreement)
                        <tr>
                            <td>
                            @if(app()->getLocale()=='en')
                                            {{$agreement->en_agreement}}
					@else
                    {{$agreement->ar_agreement}}
					@endif   
                                                    </td>
                      
                            <td>
                            <?php $date = date_create($agreement->agreement_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                  
                               </h6>
                            </td>
                            <td>
                            @if(app()->getLocale()=='en')
                            <a href="{{ asset('uploads/files/'.$agreement->en_file) }}" target="_blank"><i class="fa fa-eye"></i></a>
					@else
                    <a href="{{ asset('uploads/files/'.$agreement->ar_file) }}" target="_blank"><i class="fa fa-eye"></i></a>
					@endif  
                               
                            </td>
                        </tr>
            @endforeach            
                        
                        
                            
                            
                         

                        



                    </table>
                  </div>

              
  
            </div>
          </div>

          <!-- <div class="row no-gutters my-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <li><a href="#">&lt;</a></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&gt;</a></li>
                    </ul>
                  </div>
                </div>
              </div> -->
        </div>
      </section>

	






@endsection
@section('scripts')
@endsection