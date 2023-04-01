 <!--========== Start Footer ==========-->

 <footer class="ftco-footer ftco-bg-dark ftco-section">
   <div class="container-footer">

     <div class="row footerLogo">



       <div class="col-md-10 col-12">
         <a href="{{url('/')}}">
           @if(app()->getLocale()=='en')
           <h4 class="footer-logoTitle" style="text-align: left !important">{{ __('links.chamber') }}</h4>
           @else
           <h4 class="footer-logoTitle">{{ __('links.chamber') }}</h4>
           @endif

         </a>
       </div>


     </div>
     <div class="newfooterLogo">
       <div class="row">

         <div class="col-md-3 col-12">

           <a href="{{url('/')}}">
           @if(app()->getLocale()=='en')
           <img src="{{ asset('webasset/images/cairo-chamber-logo-footer.png')}}" class="img-fluid" style="width: 130px; margin-left: 30px;">
           @else
           <img src="{{ asset('webasset/images/cairo-chamber-logo-footer.png')}}" class="img-fluid" style="width: 130px; margin-right: 30px;">
           @endif
           </a>
           <ul class="contact-info mt-3 ml-3">
             <li><span>{{ __('links.address') }}:</span>
               <span class="contact-t">{{$branch->address}}</span>
             </li>
             <li><span>{{ __('links.phone') }} :</span>
               <span class="contact-t">{{$branch->phone}}</span>
             </li>
             <li><span>{{ __('links.email') }} :</span>
               <span class="contact-t">{{$branch->email}}</span>
             </li>

           </ul>
           <form  id="email-form" class="mr-3" action="{{url('/sendNewsLetter')}}" method="POST">
				@csrf
             <input type="email" name="email" placeholder="{{ __('links.emailList') }}"><input type="submit" value="{{ __('links.send') }}">
             
           </form>

         </div>

         <div class="col-md-6">
           <div class="row">
             <div class="col-md-2 col-5">

               <div class="ftco-footer-widget ">
                 <h2 class="ftco-heading-2">{{ __('links.home') }}</h2>
                 <p><a href="excellence.html">{{ __('links.excellence') }}</a></p>
                 <p><a href="relatedwebsites.html">{{ __('links.relatedwebsites') }}</a></p>
                 <p><a href="questions.html">{{ __('links.faq') }}</a></p>

                 <p><a href="contact.html">{{ __('links.contact') }}</a></p>

               </div>
             </div>





             <div class="col-md-3 col-6">
               <div class="ftco-footer-widget">
                 <h2 class="ftco-heading-2">{{ __('links.chamberServices') }}</h2>
                 <p><a href="medical-care.html">{{ __('links.healthCare') }}</a></p>
                 <p><a href="insurance.html">{{ __('links.lifeInsurance') }}</a></p>
                 <p><a href="guidance.html">{{ __('links.commerExtention') }}</a></p>
                 <p><a href="club.html">{{ __('links.tradersClub') }}</a></p>
                 <p><a href="hall.html">{{ __('links.conferenceRoom') }}</a></p>
               </div>
             </div>


             <div class="col-md-3  col-6">
               <div class="ftco-footer-widget ">
                 <h2 class="ftco-heading-2">{{ __('links.mediacenter') }}</h2>
                 <p><a href="news.html">{{ __('links.chamberNews') }}</a></p>
                 <p><a href="albums.html">{{ __('links.chamberAlbum') }}</a></p>
                 <p><a href="advertesment.html">{{ __('links.announce') }}</a></p>
                 <p><a href="chahbander.html">{{ __('links.shahbander') }}</a></p>

               </div>
             </div>

             <div class="col-md-3  col-6">
               <div class="ftco-footer-widget ">
                 <h2 class="ftco-heading-2">{{ __('links.retailAcademy') }}</h2>
                 <p><a href="retail-academy.html">{{ __('links.aboutAcademy') }}</a></p>
                 <p><a href="academy-courses.html">{{ __('links.courses') }}</a></p>
                 <p><a href="events.html">{{ __('links.events') }}</a></p>
                 <p><a href="training.html">{{ __('links.training') }}</a></p>
                 <p><a href="retail-academy.html#parteners">{{ __('links.sponsor') }}</a></p>
                 <p><a href="retail-contact.html">{{ __('links.contact') }}</a></p>
               </div>
             </div>



           </div>
         </div>


         <!-- ===============start location=================== -->

         <div class="col-md-3">



           <div class="row ">
             <div class="social-links">
               <a href="{{$social->twitter_url}}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
               <a href="{{$social->facebook_url}}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
               <a href="{{$social->feedsfloor_url}}" target="_blank" class="instagram">
                 <i class="fa fa-rss"></i>
                 <a href="{{$social->youtube_url}}" target="_blank" class="google-plus"><i class="fa fa-youtube"></i></a>
                 <a href="{{$social->linkedin_url}}" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
             </div>
             <iframe class="mt-2" src="{{$branch->map_url}}" width="100%" height="300" frameborder="0" style="border:0;opacity: 0.8;" allowfullscreen=""></iframe>
           </div>
         </div>
         <!-- ======================end location ================ -->

       </div>
     </div>

   </div>

   <div class="container-fluid">
     <div class="row">

       <div class="col-md-3 col-3 d-flex topper align-items-center">

         <div class="col-md-3 col-3"></div>


       </div>

       <div class="col-md-6 text-center ">

         <p class="copyrights">

           Copyright &copy;
           جميع الحقوق محفوظة لدى | الغرفة التجارية

         </p>
       </div>


     </div>
   </div>

 </footer>
 <!--========== End Footer ==========-->