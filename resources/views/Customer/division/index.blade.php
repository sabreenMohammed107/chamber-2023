@extends('Customer.webLayout.web')

@section('content')
 <!--========== Start Banner ==========-->
 <section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
              <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                  <h1 class="mb-2 bread"> {{ __('titles.division') }}
                </h1>
                </div>
              </div>
            </div>
          </section>
      <!--========== End Banner ==========-->
    
      
      <!--========== إدارات الغرفة ==========-->
		<section class="ftco-section " >
			<div class="container">
       
      <div class="row">
        <div class="col-md-1"></div>
        <div class="container-1 mr-3" >
          <span class="icon"><i class="fa fa-search"></i></span>
          <input type="text" id="mySearch-dept"  onkeyup="myFunctiondept()" placeholder="{{ __('titles.searchdivision') }}" title="Type in a category">
         

      </div></div>
                <div id="devisonContent">
                @include('Customer.division.indexList')
</div>


        
			</div>
    </section>
		





@endsection
@section('scripts')
<script>
$(document).ready(function() {



//pagination
$(document).on('click', '#devisionPagination .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
 
   fetch_data(page);
 });
 
 
 function fetch_data(page)
 {
	 
  $.ajax({
	
    url:"{{ URL::to('fetch_devision') }}?page="+page,

   
   success:function(data)
   {
     
    $('#devisonContent').html(data);
   }
  });
 }

});


</script>
@endsection