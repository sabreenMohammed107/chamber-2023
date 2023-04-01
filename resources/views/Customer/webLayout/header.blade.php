

 <!--========== Start Top Menu ==========-->

 <div class=" bg-black top">
   <div class="container">
     <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
       <div class="col-lg-12 d-block">
         <div class="row d-flex">
           <div class="col-md-6  col-4 d-flex topper align-items-center">
             <p class=" mr-3  mt-3">

               <a href="shahbandr.cairochamber.org.eg" target="_blank" class="text-white ">
                 <span class="top-span">{{ __('links.shahbander') }}</span>
               </a></p>
             <div class="icon mr-3 d-flex justify-content-center align-items-center">
               <a href="{{$social->facebook_url}}" target="_blank" class="text-white">
                 <span class="fa fa-facebook"></span>
               </a>
             </div>


             <div class="icon mr-2 d-flex justify-content-center align-items-center">
               <a href="{{$social->twitter_url}}" target="_blank" class="text-white">
                 <span class="fa fa-twitter"></span>
               </a>
             </div>

             <div class="icon mr-2 d-flex justify-content-center align-items-center">
               <a href="{{$social->youtube_url}}" target="_blank" class="text-white">
                 <span class="fa fa-youtube"></span>
               </a>
             </div>
             <div class="icon mr-2 d-flex justify-content-center align-items-center">
               <a href="{{$social->feedsfloor_url}}" target="_blank" class="text-white">
                 <span class="fa fa-rss"></span>
               </a>
             </div>
             <div class="icon mr-2 d-flex justify-content-center align-items-center">
               <a href="{{$social->linkedin_url}}" target="_blank" class="text-white">
                 <span class="fa fa-linkedin"></span>
               </a>
             </div>
             <!-- <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram">
                    <i class="fa fa-rss"></i>
                  <a href="#" class="google-plus"><i class="fa fa-youtube"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div> -->

           </div>

           <div class="col-md-6 col-8 d-flex topper align-items-center text-lg-right ">



             <div class="header_search_container active">
               <div class="container ">
                 <div class="row">
                   <div class="col">

                     <i id="search-btn" class="fa fa-search fa-2x"></i>

                     <div id="search-overlay" class="block">
                       <div class="centered">
                         <div id='search-box'>
                           <i id="close-btn" class="fa fa-times fa-2x"></i>
                           <form action="{{route('search')}}" id='search-form' method='get' target='_top'>

                             <input id='search-text' name='q' placeholder="{{ __('links.searchhere') }}" type='text' />
                             <button id='search-button' type='submit'>
                               <span>{{ __('links.search') }}</span>
                             </button>
                           </form>
                         </div>
                       </div>
                     </div>

                   </div>
                 </div>
               </div>
             </div>

             <!-- <p class="  mr-3  mt-2 register-link">
                <a href="shahbandr.cairochamber.org.eg" target="_blank" class="  text-white">
                  <span class="welcomeuser"><span class="welcome">{{ __('titles.welcom') }} :</span>
                    <span class="welcomeuser"></span>
                </a></p> -->
             {{-- @guest

             @if (Route::has('register'))

             @endif
             @else
             <li class="nav-item dropdown">
               <span class="welcomeuser"><span class="welcome">{{ __('links.welcom') }} :</span>
                 <span class="welcomeuser"> {{ Auth::user()->name }} </span>

                 <button class="btn btn-primary mr-3 ml-3 "><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                     {{ __('links.Logout') }}
                   </a></button>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                 </form>
             </li>
             @endguest --}}
             <div class="langLink">
             <a href="{{ URL::to('changeLang/en') }}" class=" text-white"><span> {{ __('links.en') }}</span></a>&nbsp;/&nbsp;
             <a href="{{ URL::to('changeLang/ar') }}" class=" text-white"><span> {{ __('links.ar') }}</span></a>
             </div>



             <a href="#" class=" text-white">
               <div class="img-2030">
                 <img class="logo-2030" src="{{ asset('webasset/images/3201621141837383.jpg')}}" alt="2030" style="height:70px; border-radius: 0 0 10px 10px;opacity: 0.9;">
               </div>
             </a>
           </div>


         </div>
       </div>
     </div>
   </div>
 </div>
 <!--========== End Top Menu ==========-->



 <!--========== Start Main Logo ==========-->
 <section class=" main-logo ">
   <div class="container">

     <!-- <div class="row d-flex align-items-center px-md-0"> -->
     <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
       <div class="col-lg-12 d-block">
         <div class="row d-flex">
           <div class="col-md-2 col-6">
             <a href="{{url('/')}}">
               <img src="{{ asset('webasset/images/cairo-chamber-logo.png')}}" style="width: 220px; height: 150px;">

             </a>
           </div>


           <div class="col-md-6 col-6  main-logoH3">
             <a href="{{url('/')}}">
               <div class="logoName">
               @if(app()->getLocale()=='en')
               <h4 style=" color:#000!important ;text-align: left !important;margin-left:20px !important">Cairo Chamber Of Commerce</h4>

                                                @else
                                                <h1 style="font-family:titlefont, serif; color:linear-gradient(to bottom left, #261204, #c8a97e)">الغرفة التجارية للقاهرة</h1>

                 <h6>Cairo Chamber Of Commerce</h6>
                                                @endif

               </div>
             </a>
           </div>
           <!-- <div class="col-md-6 col-9 d-flex topper align-items-center text-lg-right "> -->
           <div class="col">
             <div class="header_search_content d-flex flex-row align-items-center grey event">

               <!-- <div class="col-md-4 col-6  main-logoH3"> -->
               <div id="logo-date" class="logo-date">
                 <div class="container-Date">
                   <div class="date" id="printTime"></div>
                   @if(app()->getLocale()=='ar')
                   <div class="date" id="printDay"></div>

                   @endif

                   <div class="date" id="printDate"></div>

                 </div>

               </div>



             </div>
           </div>
           <!-- </div> -->


           <div class="slogan">
             <span>{{ __('links.slogan') }}</span>
           </div>
         </div>
       </div>

     </div>
   </div>
 </section>
 <!-- <hr class="logoHr"> -->

 <!--========== End Main Logo ==========-->
