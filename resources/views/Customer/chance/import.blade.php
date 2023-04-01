@extends('Customer.webLayout.web')

@section('content')



<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-4">
          <h1 class="mb-2 bread">{{ __('links.import') }}</h1>
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

          <div id="importContent" class="table-responsive">
              @include('Customer.chance.importList')
         
          </div>



        </div>
      </div>

     
    </div>
  </section>

  @endsection
@section('scripts')
<script>
$(document).ready(function() {



//pagination
$(document).on('click', '#categoryImport .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
 
  fetch_data(page);
 });
 
 
 function fetch_data(page)
 {
	 
  $.ajax({
	
    url:"{{ URL::to('fetch_importChance') }}?page="+page,
    data:
		{
		
			id:$("#chanceType").val(),

		
        } ,
   
   success:function(data)
   {
    $('#importContent').html(data);
   }
  });
 }

});


</script>
@endsection

