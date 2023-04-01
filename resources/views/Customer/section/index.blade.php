@extends('Customer.webLayout.web')

@section('content')
 <!--========== Start Banner ==========-->
 <section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
              <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                  <h1 class="mb-2 bread"> {{ __('titles.sections') }}
                </h1>
                </div>
              </div>
            </div>
          </section>
      <!--========== End Banner ==========-->
    
      
      <!--========== إدارات الغرفة ==========-->
		<section class="ftco-section">
			<div class="container">
        
      <div class="row">
        <div class="col-md-1"></div>
        <div class="container-1 mr-3" >
          <span class="icon"><i class="fa fa-search"></i></span>
          <input type="text" id="mySearch-dept"  onkeyup="myFunctiondept()" placeholder=" ..إبحث عن الإدارة.." title="Type in a category">
         

      </div></div>
                <div >
                 
                 
               <nav>
                <ul id="myMenu2">
                    @foreach($sections as $section)
                    <li><a href="{{ url('sectionDetails/'.$section->id) }}" class="text-dark text-decoration">
                    @if(app()->getLocale()=='en')
                                            {{$section->en_name}}
					@else
                    {{$section->ar_name}}
					@endif
                </a> </li>
                   @endforeach
                   
                   
                   
                

                  </ul>
                </nav>
</div>


        
			</div>
    </section>
		



@endsection
@section('scripts')
@endsection
