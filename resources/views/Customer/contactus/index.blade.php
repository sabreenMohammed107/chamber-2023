@extends('Customer.webLayout.web')

@section('content')
<!--========== Start Banner ==========-->  
 <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
              <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                  <h1 class="mb-2 bread"> {{ __('links.contact') }}   </h1>
                </div>
              </div>
            </div>
  </section>
  <!--========== End Banner ==========-->
      
      
      
		<!--========== Start Contact Form ==========-->
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
                 <!-- ***** Contact Area Start ***** -->
    <div class="fancy-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Google Map -->
                    <div id="googleMap">
                      <iframe src="{{$branch->map_url}}" width="100%" height="100%" frameborder="0" style="border:0;opacity: 0.8;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>

           
              <div class="section-heading text-center">
                <h3>{{ __('titles.contactus') }}</h3>
                <p >{{ __('titles.contactstatment') }}</p>  
                                    </div>
                                    <div class="row">
                <div class="col-12 col-md-6">
                    <!-- Contact Details -->
                    <div class="contact-details-area wow fadeInRight animated" data-wow-delay="0.5s">
                        
                        <ul class="contact-info"  style=" line-height: 2.5;">
                <li><span>{{ __('links.address') }}:</span ><span class="mr-3 spanStyle" style="font-size: 16px;">
                {{$branch->address}}
            </span></li>
                <li><span>{{ __('links.phone') }}:</span><span  class="mr-3 spanStyle" style="font-size: 16px;">
                {{$branch->phone}}
            </span></li>
                <li><span>{{ __('links.fax') }}:</span> <span  class="mr-3 spanStyle" style="font-size: 16px;" >
                {{$branch->fax}}
            </span></li>
                <li><span>{{ __('links.email') }}:</span><span  class="mr-3 spanStyle" style="font-size: 16px;">
                {{$branch->email}}
            </span></li>
              </ul></div>
                   
                   
                </div>
                <div class="col-12 col-md-6">
                    <!-- Contact Form -->
                    <div class="contact-form-area wow fadeInRight animated" data-wow-delay="0.7s">
                      
                        <div class="contact-form">
                            <form action="{{route('sendMessage')}}" method="POST">
                            @csrf
                                <!-- Message Input Area Start -->
                                <div class="contact_input_area">
                                    <div class="row">
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('titles.name') }} " required>
                                            </div>
                                        </div>
                                         <!-- Single Input Area -->
                                         <div class="col-12">
                                          <div class="form-group">
                                              <input type="text" class="form-control"  name="mobile" placeholder="{{ __('links.mobile') }} " required>
                                          </div>
                                      </div>
                                       <!-- Single Input Area -->
                                       <div class="col-12">
                                        <div class="form-group">
                                            <input type="mail" class="form-control"  name="email" placeholder="{{ __('links.email') }}" required>
                                        </div>
                                    </div>
                                       
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea  class="form-control" name="messege" cols="30" rows="6" placeholder="{{ __('titles.notes') }} " required></textarea>
                                            </div>
                                        </div>
                                        <!-- Single Input Area -->
                                        <div class="col-12 mb-4">
                                            <button type="submit" class="btn fancy-btn fancy-dark bg-transparent"> {{ __('links.send') }}   </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    </div>
                <hr>
                 <!-- Follow Us -->
                 <div class="follow-us-area text-center" >
                  <h2 class="wow fadeInDown animated" data-wow-delay="1s">{{ __('links.follow') }}:
                  </h2>
                  <a href="{{$social->facebook_url}}" target="_blank" class="facebook wow fadeInDown animated text-center" data-wow-delay="1s"><i class="fa fa-facebook " aria-hidden="true"></i></a>
                  <a href="{{$social->twitter_url}}" target="_blank" class="twitter wow fadeInDown animated text-center" data-wow-delay="1.2s"><i class="fa fa-twitter " aria-hidden="true"></i></a>
                  <a href="{{$social->youtube_url}}" target="_blank" class="youtube wow fadeInDown animated text-center" data-wow-delay="1.4s"><i class="fa fa-youtube " aria-hidden="true"></i></a>
                  <a href="{{$social->linkedin_url}}" target="_blank" class="linkedin wow fadeInDown animated text-center" data-wow-delay="1.6s"><i class="fa fa-linkedin " aria-hidden="true"></i></a>
          
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->
		</div>
    </section>
    <!--========== End Contact Form ==========-->
    @endsection
     
     @section('scripts')
     @endsection


