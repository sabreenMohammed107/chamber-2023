 <div class="  panel panel-default">
     <div class=" panel-heading mt-5">

     </div>
     <div class=" panel-body">
         <div class="row">
             @foreach($conferences as $conference)
             @if((app()->getLocale()=='en' && $conference->en_title )||(app()->getLocale()=='ar' &&$conference->ar_title ))
             <div class="col-md-6">
                 <div class="card">
                     <a href="{{ url('conferenceDetails/'.$conference->id) }}">
                         @if($conference->gallery->first() !=null && $conference->gallery->first()->order==1)
                         @if($conference->gallery->first()->image!=null)
                         <img src="{{ asset('uploads/conferance/'.$conference->gallery->first()->image) }}" alt="...">
                         @else
                         <iframe id="popup-youtube-player" width="100%" height="200" src="{{$conference->gallery->first()->vedio}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
                         @endif
                         @else
                         <img src="" alt="no image">
                         @endif

                         <div style="position: relative;height: 70px ;border-bottom: 1px solid #ccc;">

                             <h5>
                                 @if(app()->getLocale()=='en')
                                 {{ Str::limit($conference->en_title, 91,'') }}

                                 @else
                                 {{ Str::limit($conference->ar_title, 89,'') }}

                                 @endif
                             </h5>
                     </a>
                 </div>
                 
                 <p>
                 @if(app()->getLocale()=='en')
            <?php
            $output = nl2br(str_replace("&nbsp;", " ", $conference->en_text));
            ?>
            {{str_limit(strip_tags($output),100,'...')}}
            @else
            <?php
            $output = nl2br(str_replace("&nbsp;", " ", $conference->ar_text));
            ?>
            {{str_limit(strip_tags($output),100,'...')}}

            @endif

                 </p>
                 <!-- <a href="{{ url('conferenceDetails/'.$conference->id) }}" style="width: 30% !important" class="btn btn-primary">{{ __('titles.more') }}</a> -->
             </div>
         </div>



@endif

         @endforeach
     </div>
 </div>

 <!-- =============show All ========================= -->
 <div class="row">
     <div class="clearfix"></div>
     <div id="categoryConference" class="blog-pagination justify-content-center" style="width:10% ; margin:auto ;margin_bottom:20px">

         {!! $conferences->links() !!}

     </div>
 </div>