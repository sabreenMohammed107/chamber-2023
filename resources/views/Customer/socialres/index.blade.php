@extends('Customer.webLayout.web')

@section('content')
<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
      
        <h1 class="mb-2 bread">{{ __('titles.socialres') }}</h1>


      </div>
    </div>
  </div>
</section>
<!--========== End Banner ==========-->


<!--========== المسئولية المجتمعية ==========-->
<section class="ftco-section bg-light socialDiv">
  <div class="container">
    <div id="socialresContent" class="row">
     
    @include('Customer.socialres.indexSocialres')
     
    </div>


  </div>
</section>







@endsection
@section('scripts')
<script>
$(document).ready(function() {



//pagination
$(document).on('click', '#socialresPagination .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
 
   fetch_data(page);
 });
 
 
 function fetch_data(page)
 {
	 
  $.ajax({
	
    url:"{{ URL::to('fetch_socialres') }}?page="+page,

   
   success:function(data)
   {
     
    $('#socialresContent').html(data);
   }
  });
 }

});


</script>
@endsection