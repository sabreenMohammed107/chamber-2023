@extends('Customer.webLayout.web')

@section('content')
<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">{{ __('links.conferences') }}</h1>
          </div>
        </div>
      </div>
    </section>
    <!--========== End Banner ==========-->



<!--==========   مؤتمرات ومعارض ==========-->
    <section class="ftco-section ftco-wrap-about">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar2 " style="box-shadow: 1px 1px 1px 1px #EEE;">
                        <a class="active addArow" >{{ __('titles.events') }}  </a>
                        <!-- <a  href="#cal-dept" onclick="caldept()">{{ __('titles.calen') }} </a> -->
                       
                       
                       
                    </div>
                </div>
                <div class="col-md-9">
            <div class="row  cal-dept">
                 
             
                <div id="calendar"></div>
              
              
            </div>
            <!--=======================End events tab=========================-->
            <div class="advertes-dept">
                <h5 style="border-bottom: 1px solid #CCC;">{{ __('titles.events') }}  </h5>
                <form id="target" action="javascript:void(0)"  >
                <div class="row">
                
                  <div class="col-md-5 col-xs-12">
                    <input type="text" class="input-style" id="confName" name="confName"  placeholder=" {{ __('titles.name') }}   " >
                  </div>
                  <div class="col-md-5 col-xs-12">
                  <select class="browser-default" name="conference_type_id" id="conference_type_id">
								<option value="">{{ __('titles.select') }}  </option>
                            @foreach ($types as $type)
                                        <option value='{{$type->id}}' >
                                         {{ $type->name }}</option>
                                           @endforeach
								</select>
                   
                    <!-- <input type="date" value="الي تاريخ" min="2005-01-01" max="2019-01-01"> -->
                  </div>
                 
                  <div class="col-md-5 col-xs-12">
                  <select class="browser-default" name="country_id" id="country_id">
								<option value="">{{ __('titles.select') }}  </option>
                            @foreach ($countries as $country)
                                        <option value='{{$country->id}}' >
                                         {{ $country->en_name }}</option>
                                           @endforeach
								</select>
                  </div>
                  <div class="col-md-5 col-xs-12">
                    <input type="date" value="الي تاريخ" id="confDate" name="confDate" >
                  </div>
                  <div class="col-md-2 col-xs-6">
                    <!-- <div class=" col-md-2 no-padding mt-3"> -->
                      <input type="submit" class="btn btn-block btn-primary  "  id="search-btn" value="{{ __('titles.search') }}">
                    <!-- </div> -->
                  </div>

                </div>
                </form>
       <!-- end search        -->

                <div id="confer" class="col-xs-12">
                @include('Customer.conference.calIndex')
                   
                </div>
              
            </div>
           
          </div>
        </div></div>
      </section>

      @endsection
     
@section('scripts')
      <script>
  function caldept() {
$('.cal-dept').css("display", "block");
$('.advertes-dept').css("display", "none");

}

function advertesdept() {
  $('.advertes-dept').css("display", "block");
  $('.cal-dept').css("display", "none");


}

</script>
<script>
$(document).ready(function() {

  $('#target').on('submit', function(e){
    event.preventDefault();
	
	
    $.ajax({
        url:"{{route('searchForm')}}",
        type: 'GET',
		
		data:
		{
		
			conference_type_id:$('#conference_type_id option:selected').val(),
		country_id:$('#country_id option:selected').val(),
		name:$('#confName').val(),
		conf_date:$('#confDate').val(),
		} ,
    success:function(data)
   {
    $('#confer').html(data);
   }
 });
  });


//pagination
$(document).on('click', '#categoryConference .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  
var conference_type_id =$('#conference_type_id option:selected').val();
 
  var country_id=$('#country_id option:selected').val();
  var name=$('#confName').val();
  var conf_date=$('#confDate').val();

 
  fetch_data(page,conference_type_id,country_id,name,conf_date);
 });
 
 
 function fetch_data(page,conference_type_id,country_id,name,conf_date)
 {
	 
  $.ajax({
	
    url:"{{ URL::to('fetch_conference') }}?page="+page,
    data:
	{
		
		conference_type_id:conference_type_id,
		country_id:country_id,
		name:name,
		conf_date:conf_date,
	
		
	} ,
   
   success:function(data)
   {
    $('#confer').html(data);
   }
  });
 }

});


</script>
@endsection
