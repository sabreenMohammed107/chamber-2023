@extends('Customer.webLayout.web')

@section('content')

<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">{{ __('titles.egyptsContacts') }}</h1>
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
                        <td>{{ __('titles.name') }}</td>
            <td>{{ __('links.phone') }}</td>
            <td>{{ __('links.email') }}	</td>
            <td>{{ __('titles.website') }}</td>
            <td>{{ __('links.address') }}</td>
        </tr>
@foreach($agreements as $agreement)
        <tr>
            
            <td>
            @if(app()->getLocale()=='en')
                                            {{$agreement->en_name}}
					@else
                    {{$agreement->ar_name}}
					@endif   
            </td>
            <td>
        
                    {{$agreement->phone}}
					  
            </td>
            <td>
       
                    {{$agreement->email}}
					 
            </td>
            <td>
        
                    {{$agreement->website}}
				  
            </td>
            <td>
            @if(app()->getLocale()=='en')
                                            {{$agreement->en_address}}
					@else
                    {{$agreement->ar_address}}
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