<div class="row">
    @if($newsLists!=null)
    @foreach($newsLists as $list)
    <div class=" col-md-6">
        <div class="card ">
           
            @if($list->gallery->first() !=null && $list->gallery->first()->order==1)
                                 @if($list->gallery->first()->image!=null)
                                        <img src="{{ asset('uploads/division/'.$list->gallery->first()->image) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{{$list->gallery->first()->vedio}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                  @else
                                  <img src="" alt="no image">
                                  @endif
                                  <a href="{{ url('newsDivisionDetails/'.$list->id) }}" style="color:black !important">
                <h6> @if(app()->getLocale()=='en')
                            {{$list->en_title}} 
					@else
                    {{$list->ar_title}} 
                    @endif</h6></a>
                    <p> 
                    @if(app()->getLocale()=='en')
                <?php
                $output = nl2br(str_replace("&nbsp;", " ", $list->en_text));
                ?>
                {{str_limit(strip_tags($output),100,'...')}}
                @else
                <?php
                $output = nl2br(str_replace("&nbsp;", " ", $list->ar_text));
                ?>
                {{str_limit(strip_tags($output),100,'...')}}
                @endif
                                                </p>
            </a>

        </div>
    </div>

@endforeach
@endif
</div>

<div class="row no-gutters my-5">
        <div class="col text-center" style="margin-right: 45%">
          <div id="newsDataPagination" class="block-27">
          {!! $newsLists->links() !!}
          </div>
        </div>
      </div>