
@extends('Customer.webLayout.web')

@section('content')




<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">{{ __('titles.reports') }}</h1>
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
      
              <select name="study_id" id="study_id" class="browser-default custom-select" >
                                    <option value="">{{ __('titles.select') }} {{ __('titles.type') }}</option>
                                    @foreach ($studies as $study)
                                    <option value='{{$study->id}}'>
                                    @if(app()->getLocale()=='en')
                                            {{$study->en_type}}
					@else
                    {{$study->ar_type}}
					@endif   
                                    
                                    </option>
                                    @endforeach
                                </select>
            
            </div></div>
<div id="regionDetails">
    @include('Customer.encyclo.studiesDetails')
    
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
    $(document).on('change', '#study_id', function (e) {



$.ajax({
    type: 'GET',
 
    url : "{{ URL::to('fetch_studies') }}",
    data :
     {
        study_id :$('#study_id').val()
         },

    success:function(data){

        
    $('#regionDetails').html(data);
   
    },
 
});

});
    </script>
@endsection
	


