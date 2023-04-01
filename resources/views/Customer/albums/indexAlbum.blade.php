<div class="category-desc-pan  panel panel-default">
  <div class="test panel-heading">
    <p id="newTitle mr-5"> {{ __('titles.albumchamber') }} </p>
  </div>
  <div class="fees panel-body">
    <div class="row">
      @if($albums!=null)
      @foreach($albums as $album)
      <div class=" col-md-4 ">
        <div class="card">
          <a href="#" data-toggle="modal" data-target="#exampleModal{{$album->id}}">

            @if($album->gallery->first() !=null)
            @if($album->gallery->first()->image!=null)
            <img src="{{ asset('uploads/albums/'.$album->gallery->first()->image) }}" alt="First slide" class="img-fluid">
            @else
            <iframe id="popup-youtube-player" width="100%" height="200" src="{{$album->gallery->first()->vedio}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
            @endif
            @else
            <img src="" alt="no image">
            @endif
            <h6 class="mt-3 text-dark">
              @if(app()->getLocale()=='en')
              {{$album->en_name}}
              @else
              {{$album->ar_name}}
              @endif</h6>
            <p class="text-dark mr-5"><?php $date = date_create($album->album_date) ?>
              {{ date_format($date,"d-m-Y") }}</p>
          </a>
        </div>
      </div>




      <!-- Modal -->
      <div class="modal fade" id="exampleModal{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title">
              @if(app()->getLocale()=='en')
                            {{$album->en_name}}
					@else
                    {{$album->ar_name}} 
					@endif
              </h5>
            </div>
            <div class="modal-body">
              <div id="carouselExampleIndicators{{$album->id}}" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach($album->gallery as $key => $gallery)

                  <li data-target="#carouselExampleIndicators{{$album->id}}" data-slide-to="{{$key}}" class="{{$key == 0? 'active' : '' }}"></li>

                  @endforeach
                </ol>
                <div class="carousel-inner">
                  @foreach($album->gallery as $key => $gallery)

                  <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    @if($gallery !=null && $gallery->image!=null)
                    <img src="{{ asset('uploads/albums/'.$gallery->image) }}" class="d-block w-100" style="height: 400px;" alt="...">
                    @else
                    <iframe width="100%" height="400" src="{{$gallery->vedio}}"></iframe>
                    @endif

                  </div>

                  @endforeach


                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators{{$album->id}}" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true" style="margin-left: -30px;"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators{{$album->id}}" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true" style="margin-right: -30px; background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' …3cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3e%3c/svg%3e) !important"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--========== End Gallery Images ==========-->
      @endforeach
      @endif

    </div>
  </div>
</div>


<!-- =============show All ========================= -->
<div class="row">
  <div class="clearfix"></div>
  <div id="categoryAlbum" class="blog-pagination justify-content-center" style="width:10% ; margin:auto ;margin_bottom:20px">

    {!! $albums->links() !!}

  </div>
</div>