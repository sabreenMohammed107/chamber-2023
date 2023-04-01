<div class="col-md-1"></div>
      @foreach($socialres as $socialr)
      <div class="col-md-5  img-thumbnail m-2">
        <div class="row">
          <div class="blog-entry  col-md-6">
            <a href="socialpage.html" class="block-20" style="background-image: url('{{ asset('uploads/socialty/'.$socialr->image) }}'); background-size: contain">
            </a>
          </div>
          
          <div class="blog-entry  col-md-6">
            <div class="text pt-3 pb-4 px-4">
              <div class="meta">
                <div><a href="{{ url('socialresDetails/'.$socialr->id) }}" >
                @if(app()->getLocale()=='en')
                    {{Str::limit($socialr->en_title,30,'.')}}
                    @else
                    {{Str::limit($socialr->ar_title,30,'.')}}
                    @endif
                  </a></div>
              </div>
              <p><a href="#" class="text-dark">
                  @if(app()->getLocale()=='en')
                  {!! Str::limit($socialr->en_text, 70,'...') !!}
                  @else
                  {!! Str::limit($socialr->ar_text, 100,'...') !!}
                  @endif
                </a></p>
              <p class="clearfix">
                <a href="{{ url('socialresDetails/'.$socialr->id) }}" class="float-left read btn btn-primary text-white">{{ __('titles.more') }}</a>
              </p>
            </div>
          </div>
        </div>
      </div>

      @endforeach




      <div class="col-md-4 text-center"></div>

      <div id="socialresPagination" class="col-md-4 text-center  mt-5">
      {!! $socialres->links() !!}
      </div>
