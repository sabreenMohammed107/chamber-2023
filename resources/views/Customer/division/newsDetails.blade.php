@extends('Customer.webLayout.web')

@section('content')
 <!--========== Start Banner ==========-->
 <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">{{ __('titles.newsDetails') }} </h1>
                </div>
            </div>
        </div>
    </section>
    <!--========== End Banner ==========-->


    <!--========== Start تنويهات و إعلانات ==========-->
    <section class="about-Adv">
        <!-- Sidebar -->
        <div class="container">
            <div id="newsDetails" class="row ">

                @include('Customer.division.newsDetailsList')
                <div class=" col-md-3 col-xs-12 mr-5">
                    <div class="  panel panel-default ">
                        <div class=" panel-heading mb-5" >
                            <div class="panel-heading" >
                               
                            </div>
                        </div>
                        <div class=" panel-body ">

                            <!-- frist section -->
<div class="fees">

@foreach($adsVedio as $key => $vedio)
                                    <iframe id="popup-youtube-player" width="100%" height="200px"
                                        src="{{$vedio->vedio_url}}" frameborder="0"
                                        allowfullscreen="true" allowscriptaccess="always"></iframe>
                                    <div>
                                        <h5> @if(app()->getLocale()=='en')
                                        {{$vedio->en_title}}
					@else
                    {{$vedio->ar_title}}
					@endif
                                           </h5>
                                        <p> @if(app()->getLocale()=='en')
                                        {{$vedio->en_subtitle}}
					@else
                    {{$vedio->ar_subtitle}}
					@endif</p>



                                    </div>
                                    @endforeach
                               
                          

<!-- second section -->
<div class=" panel-heading">
    <p  class="head-p bg-dark">{{ __('titles.importNews') }}</p>
</div>
<div class="panel-body">
@foreach($newsRandom as $news)
    <div class="fees">
    <div class="row ">
      
        <a href="{{ url('newsDivisionDetails/'.$news->id) }}" target="_blank">
        <p  style="float: left;">  
        @if( $news->gallery->first()!=null && $news->gallery->first()->image!=null)
                                        <img src="{{ asset('uploads/division/'.$news->gallery->first()->image) }}" alt="..." style="float: right; height: 70px;
          width: 62px; margin-right: 15px;">
                                  @else
                                  <img src="{{ asset('webasset/images/screen.png')}}"  style="float: right; height: 70px;
          width: 62px; margin-right: 15px;">
                                  @endif
        
         
                                  @if(app()->getLocale()=='en')
                  <?php
                  $output = nl2br(str_replace("&nbsp;", " ", $news->en_text));
                  ?>
                  {{str_limit(strip_tags($output),50,'...')}}
                  @else
                  <?php
                  $output = nl2br(str_replace("&nbsp;", " ", $news->ar_text));
                  ?>
                  {{str_limit(strip_tags($output),50,'...')}}

                  @endif
 
         </p></a>
        </div>
    </div>
  @endforeach
   
    <div class=" panel-heading">
        <p  class="head-p bg-dark">  {{ __('titles.advert') }}  </p>
    </div>
    <div class="panel-body">
        <div class="fees">
       
          
            <!-- <a href="advertesment.html" target="_blank">
           
              <img src="images/slider1.jpg" width="100%" height="200px"></a> -->
              <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner ">
                @foreach($ads as $key => $adsObj)
                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                  
                      <img class="d-block " style="width: 100%; height: 200px; " src="{{ asset('uploads/ads/'.$adsObj->image) }}"
                        alt="First slide">
                    </div>
                    @endforeach
                  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true" >
                    <i class="fa fa-angle-left"></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
                  <span class="carousel-control-next-icon" aria-hidden="true" >
                    <i class="fa fa-angle-right"></i>
                  </span>
                  <span class="sr-only" >Next</span>
                </a>
              </div>
         
        </div>


                                
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--========== End News ==========-->


@endsection
@section('scripts')
<script>

$(document).ready(function() {



//pagination
$(document).on('click', '#categoryNews .pagination a', function(event){
  

  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });
 
 
 function fetch_data(page)
 {

  $.ajax({
	
    url:"{{ URL::to('fetch_newsDetailsDeivsion') }}?page="+page,
	data:
		{
		
			id:$("#newsId").val(),

		
        } ,
   
   success:function(data)
   {
    $('#newsDetails').html(data);
   }
  });
 }

});


</script>
@endsection