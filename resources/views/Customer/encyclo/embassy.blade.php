
@extends('Customer.webLayout.web')

@section('content')




<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">{{ __('titles.embassies') }}</h1>
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
            <div class="row">
                <div class="col-md-2 mr-3">
            <h5>{{ __('titles.type') }} :</h5></div>
            <div class="col-md-3 mb-3 ml-3">
      
              <select name="embassy_id" id="embassy_id" class="browser-default custom-select" >
                                    <option value="">{{ __('titles.select') }} {{ __('titles.type') }}</option>
                                    @foreach ($embassys as $embassy)
                                    <option value='{{$embassy->id}}'>
                                    @if(app()->getLocale()=='en')
                                            {{$embassy->en_type}}
					@else
                    {{$embassy->ar_type}}
					@endif   
                                    
                                    </option>
                                    @endforeach
                                </select>
            
            </div></div>
<div id="regionDetails">
    @include('Customer.encyclo.embassyDetails')
    
</div>
              
  
            </div>
          </div>
<!-- 
          <div class="row no-gutters my-5">
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
<script>
    $(document).on('change', '#embassy_id', function (e) {



$.ajax({
    type: 'GET',
 
    url : "{{ URL::to('fetch_embassy') }}",
    data :
     {
        embassy_id :$('#embassy_id').val()
         },

    success:function(data){

        
    $('#regionDetails').html(data);
   
    },
 
});

});
    </script>
@endsection
	


