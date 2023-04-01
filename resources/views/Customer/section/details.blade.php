@extends('Customer.webLayout.web')

@section('content')
<!--========== Start Banner ==========-->
<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">
            @if(app()->getLocale()=='en')
                                            {{$section->en_name}}
					@else
                    {{$section->ar_name}}
					@endif
            </h1>
          </div>
        </div>
      </div>
    </section>
    <!--========== End Banner ==========-->
      <!--========== End Banner ==========-->
<!--========== الإدارة ==========-->
<section class="ftco-section ftco-wrap-about">
        <div class="container">
          <div class="row">
          <div class="col-md-7 ftco-animate text-justify img-thumbnail p-4">
          @if(app()->getLocale()=='en')
                                            {!!$section->en_text!!}
					@else
                    {!!$section->ar_text!!}
          @endif
              <!-- start related file -->
    <div>
      <a href="#demo" class="btn btn-info" data-toggle="collapse">{{ __('titles.relatedFile') }}</a>

      <div id="demo" class="collapse">
        @foreach($newsFile as $file)
        @if(app()->getLocale()=='en' && $file->language_id==0)

        <li> <a href="{{asset('uploads/sections')}}/{{$file->path}}" target="_blank">
            {{$file->name}} </a>

          <input type="hidden" name="filename{{$file->id}}" value="{{asset('uploads/sections')}}/{{$file->path}}" alt="{{$file->path}}" />
          <input type="hidden" name="calender" value="{{$file->id}}">
          <input type="hidden" name="dawnName" value="{{$file->path}}">

        </li>
        @endif
        @if(app()->getLocale()=='ar' && $file->language_id==1)

        <li> <a href="{{asset('uploads/sections')}}/{{$file->path}}" target="_blank">
            {{$file->name}} </a>

          <input type="hidden" name="filename{{$file->id}}" value="{{asset('uploads/sections')}}/{{$file->path}}" alt="{{$file->path}}" />
          <input type="hidden" name="calender" value="{{$file->id}}">
          <input type="hidden" name="dawnName" value="{{$file->path}}">

        </li>
        @endif
        <!-- <a class="btn btn-primary" onclick='downloadFile({{$file->id}})'>dawnload</a> -->

        @endforeach
      </div>

    </div>
    <!-- End relatedFile -->
          </div>
          <div class="col-md-5">
                <img src="{{ asset('uploads/sections/'.$section->image) }}" class="img-thumbnail">
            </div>
           
          
          </div>
        </div>
      </section>

		




@endsection
@section('scripts')
@endsection
