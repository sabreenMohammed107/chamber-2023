<div class="row">
    @if($meetingLists!=null)
    @foreach($meetingLists as $list)
    <div class=" col-md-6">
        <div class="card ">

            @if($list->gallery->first() !=null && $list->gallery->first()->order==1)
            @if($list->gallery->first()->image!=null)
            <img src="{{ asset('uploads/meeting/'.$list->gallery->first()->image) }}" alt="...">
            @else
            <iframe id="popup-youtube-player" width="100%" height="200" src="{{$list->gallery->first()->vedio}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
            @endif
            @else
            <img src="" alt="no image">
            @endif
            <a href="{{ url('meetingDivisionDetails/'.$list->id) }}" style="color:black !important">
                <h6> @if(app()->getLocale()=='en')
                    {{$list->en_title}}
                    @else
                    {{$list->ar_title}}
                    @endif</h6>
            </a>
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


        </div>
    </div>

    @endforeach
    @endif
</div>

<div class="row no-gutters my-5">
    <div class="col text-center" style="margin-right: 45%">
        <div id="meetingPagination" class="block-27">
            {!! $meetingLists->links() !!}
        </div>
    </div>
</div>