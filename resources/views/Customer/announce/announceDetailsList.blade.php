<div class="category-desc col-md-8 col-xs-12">
  <div class="category-desc-pan  panel panel-default">
    <input type="hidden" id="announceId" value="{{$announceObj->id}}">
    <div class="test panel-heading mt-3">
      <p id="newTitle mr-5 mt-3">
        @if(app()->getLocale()=='en')
        {{$announceObj->en_title}}
        @else
        {{$announceObj->ar_title}}
        @endif
      </p>
      <h6>
        <?php $date = date_create($announceObj->announce_date) ?>
        {{ date_format($date,"d-m-Y") }}

      </h6>
    </div>
    <div class="fees panel-body">

      <div class="articleimg">
        <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
          <div class="carousel-inner ">
            @foreach($announceGallery as $key => $gallery)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
              @if($gallery !=null && $gallery->image!=null)
              <img src="{{ asset('uploads/announce/'.$gallery->image) }}" alt="{{$gallery->ar_title}}" title="{{$gallery->ar_title}}">
              @else
              <iframe width="560" height="315" src="{{$gallery->vedio}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              @endif

            </div>
            @endforeach

          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
              <i class="fa fa-angle-left"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
              <i class="fa fa-angle-right"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="outlineSocialShare">
        <i class="fa fa-twitter"></i>

        <i class="fa fa-facebook"></i>
        <i class="fa fa-envelope"></i>
      </div>
      <div class="newsStory">

        <p>
          @if(app()->getLocale()=='en')
          {!! $announceObj->en_text !!}
          @else
          {!! $announceObj->ar_text !!}
          @endif
        </p>
      </div>

    </div>
   
    <?php
$countEn=0;
$countAr=0;
foreach($newsFile as $file){
  if($file->language_id==0){
   
    $countEn=$countEn+1;
    continue;
  }
}
foreach($newsFile as $file){
  if($file->language_id==1){
   
    $countAr=$countAr+1;
 continue;
  }
}
  

?>
    <!-- start related file -->
    <div>
    @if(app()->getLocale()=='en' && $countEn>0)
      <a href="#demo" class="btn btn-info" data-toggle="collapse">{{ __('titles.relatedFile') }}</a>
@endif
@if(app()->getLocale()=='ar' && $countAr>0)
      <a href="#demo" class="btn btn-info" data-toggle="collapse">{{ __('titles.relatedFile') }}</a>
@endif

      <div id="demo" class="collapse">
        @foreach($newsFile as $file)
        @if(app()->getLocale()=='en' && $file->language_id==0)

        <li> <a href="{{asset('uploads/announce')}}/{{$file->path}}" target="_blank">
            {{$file->name}} </a>

          <input type="hidden" name="filename{{$file->id}}" value="{{asset('uploads/announce')}}/{{$file->path}}" alt="{{$file->path}}" />
          <input type="hidden" name="calender" value="{{$file->id}}">
          <input type="hidden" name="dawnName" value="{{$file->path}}">

        </li>
        @endif
        @if(app()->getLocale()=='ar' && $file->language_id==1)

        <li> <a href="{{asset('uploads/announce')}}/{{$file->path}}" target="_blank">
            {{$file->name}} </a>

          <input type="hidden" name="filename{{$file->id}}" value="{{asset('uploads/announce')}}/{{$file->path}}" alt="{{$file->path}}" />
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
  <div class="test panel-heading">
  @if(!$relatedAnnounces->isEmpty())
    <p id="newTitle mr-5 mt-3" class="subTest"> {{ __('titles.relatedAnnounce') }} </p>
    @endif
  </div>
  <div class="newsExt">
    <div class="row">
      <div class="container text-center">

        <!-- sabreen pagination -->
        <div class="fees panel-body" style="display: flex;flex-wrap: wrap;">
          @foreach($relatedAnnounces as $galleryAnn)


          <div class="card mb-2" style=" flex-grow: 1;width: 31%;margin:0 5px 5px">
            @if($galleryAnn->relatedannounce->gallery!=null && $galleryAnn->relatedannounce->gallery->first()!=null)
            <img class="card-img-top" src="{{ asset('uploads/announce/'.$galleryAnn->relatedannounce->gallery->first()->image) }}" alt="محمد أبو العينين - صورة أرشيفية" title="محمد أبو العينين - صورة أرشيفية">
            @else
            <img src="{{ asset('webasset/images/screen.png')}}" class="img_imp">
            @endif

            <div class="card-body">

              <a href="{{ url('announceDetails/'.$galleryAnn->relatedannounce->id) }}">
              <h5>
            @if(app()->getLocale()=='en')
            {{$galleryAnn->relatedannounce->en_title}}
            @else
            {{$galleryAnn->relatedannounce->ar_title}}
            @endif
          </h5>
                <p class="card-text">



                  @if(app()->getLocale()=='en')
                  <?php
                  $output = nl2br(str_replace("&nbsp;", " ", $galleryAnn->relatedannounce->en_text));
                  ?>
                  {{str_limit(strip_tags($output),100,'...')}}
                  @else
                  <?php
                  $output = nl2br(str_replace("&nbsp;", " ", $galleryAnn->relatedannounce->ar_text));
                  ?>
                  {{str_limit(strip_tags($output),100,'...')}}
                  @endif
                </p>
              </a>

            </div>


          </div>
          @endforeach
        </div>
        <div class="clearfix"></div>
        <div id="categoryAnnounce" class="blog-pagination justify-content-center" style="width:10% ; margin:auto ;margin_bottom:20px">

          {!! $relatedAnnounces->links() !!}

        </div>



        <!-- End sabreen pagination -->

      </div>
    </div>
  </div>
</div>
<div class=" col-md-3 col-xs-12 mr-5">
  <div class="  panel panel-default ">
    <div class=" panel-heading mb-5">
      <div class="panel-heading">

      </div>
    </div>
    <div class=" panel-body ">

      <!-- frist section -->
      <div class="fees">

        @foreach($adsVedio as $key => $vedio)
        <iframe id="popup-youtube-player" width="100%" height="200px" src="{{$vedio->vedio_url}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
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
          <p class="head-p bg-dark">{{ __('titles.importantAnnoounce') }}</p>
        </div>
        <div class="panel-body">
          @foreach($AnnounceRandom as $Anno)
          <div class="fees">
            <div class="row ">

              <a href="{{ url('announceDetails/'.$Anno->id) }}" target="_blank">
                <p style="float: left; margin: 0 7px;">
                  @if( $Anno->gallery->first()!=null && $Anno->gallery->first()->image!=null)
                  <img src="{{ asset('uploads/announce/'.$Anno->gallery->first()->image) }}" alt="..." style="float: right; height: 70px;
          width: 62px; margin-right: 15px;">
                  @else
                  <img src="{{ asset('webasset/images/screen.png')}}" style="float: right; height: 70px;
          width: 62px; margin-right: 15px;">
                  @endif

                  @if(app()->getLocale()=='en')
                  <?php
                  $output = nl2br(str_replace("&nbsp;", " ", $Anno->en_text));
                  ?>
                  {{str_limit(strip_tags($output),50,'...')}}
                  @else
                  <?php
                  $output = nl2br(str_replace("&nbsp;", " ", $Anno->ar_text));
                  ?>
                  {{str_limit(strip_tags($output),50,'...')}}

                  @endif


                </p>
              </a>
            </div>
          </div>
          @endforeach

          <div class=" panel-heading">
            <p class="head-p bg-dark"> {{ __('titles.advert') }} </p>
          </div>
          <div class="panel-body">
            <div class="fees">


              <!-- <a href="advertesment.html" target="_blank">
           
              <img src="images/slider1.jpg" width="100%" height="200px"></a> -->
              <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner ">
                  @foreach($ads as $key => $adsObj)
                  <div class="carousel-item {{$key == 0 ? 'active' : '' }}">

                    <img class="d-block " style="width: 100%; height: 200px; " src="{{ asset('uploads/ads/'.$adsObj->image) }}" alt="First slide">
                  </div>
                  @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                  </span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                  </span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>



          </div>
        </div>
      </div>