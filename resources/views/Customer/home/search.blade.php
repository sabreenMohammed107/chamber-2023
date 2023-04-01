@extends('Customer.webLayout.web')

@section('content')

 <!--========== Start Banner ==========-->
 <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">{{ __('titles.searchResult') }}
                  
                   
                  </h1>
                </div>
            </div>
        </div>
    </section>
    <!--========== End Banner ==========-->


    <!--========== Start تنويهات و إعلانات ==========-->
    <section class="about-Adv">
        <!-- Sidebar -->
        <div class="container">
            <div id="newsContent" class="row ">

            <div class="category-desc col-md-8 col-xs-12">
                    <div class="category-desc-pan  panel panel-default">
                        <div class="test panel-heading">
                            <p id="newTitle mr-5">  {{ __('titles.searchResult') }}
                  
                            </p>
                        </div>
                        <div class="fees panel-body" style="display: flex;flex-wrap: wrap;">
                           @foreach($itemsCollection as $item)
                                    <div class="card" style=" flex-grow: 1;width: 31%;margin:0 5px 5px">
                                    @if($item['searchType']==0)
                                    @if($item['gallery']!=null && $item['gallery'][0]['image']!=null)
                                        <img src="{{ asset('uploads/news/'.$item['gallery'][0]['image']) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{$item['gallery'][0]['vedio']}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                 
                                             @endif
                                             @if($item['searchType']==1)
                                    @if($item['gallery']!=null && $item['gallery'][0]['image']!=null)
                                        <img src="{{ asset('uploads/announce/'.$item['gallery'][0]['image']) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{$item['gallery'][0]['vedio']}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                 
                                             @endif
                                             @if($item['searchType']==2)
                                    @if($item['gallery']!=null && $item['gallery'][0]['image']!=null)
                                        <img src="{{ asset('uploads/conference/'.$item['gallery'][0]['image']) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{$item['gallery'][0]['vedio']}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                 
                                             @endif
                                    @if($item['searchType']==3)
                                    @if($item['gallery']!=null && $item['gallery'][0]['image']!=null)
                                        <img src="{{ asset('uploads/news/'.$item['gallery'][0]['image']) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{$item['gallery'][0]['vedio']}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                 
                                             @endif
                                             @if($item['searchType']==4)
                                    @if($item['gallery']!=null && $item['gallery'][0]['image']!=null)
                                        <img src="{{ asset('uploads/meeting/'.$item['gallery'][0]['image']) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{$item['gallery'][0]['vedio']}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                 
                                             @endif
                                             @if($item['searchType']==5)
                                    @if($item['gallery']!=null && $item['gallery'][0]['image']!=null)
                                        <img src="{{ asset('uploads/news/'.$item['gallery'][0]['image']) }}" alt="...">
                                  @else
                                  <iframe id="popup-youtube-player" width="100%" height="200"
                                            src="{$item['gallery'][0]['vedio']}}" frameborder="0"
                                            allowfullscreen="true" allowscriptaccess="always"></iframe>
                                  @endif
                                 
                                             @endif
                                        <div class="card-body">
                                       <h5> @if(app()->getLocale()=='en')
                                            {{$item['en_title']}}
					@else
                    {{$item['ar_title']}}
					@endif
                                            </h5>
                                            <p> 

                                            @if(app()->getLocale()=='en')
                                <?php
                                $output = nl2br(str_replace("&nbsp;", " ",$item['en_text']));
                                ?>
                                {{str_limit(strip_tags($output),100,'...')}}
                                @else
                                <?php
                                $output = nl2br(str_replace("&nbsp;", " ", $item['ar_text']));
                                ?>
                                {{str_limit(strip_tags($output),100,'...')}}

                                @endif
                                            
                                                </p>
                                                @if($item['searchType']==0)
                                            <a href="{{ url('newsDetails/'.$item['id']) }}" class="btn btn-primary">{{ __('titles.more') }}</a>
                                      @endif
                                      @if($item['searchType']==1)
                                            <a href="{{ url('announceDetails/'.$item['id']) }}" class="btn btn-primary">{{ __('titles.more') }}</a>
                                      @endif
                                      @if($item['searchType']==2)
                                            <a href="{{ url('conferenceDetails/'.$item['id']) }}" class="btn btn-primary">{{ __('titles.more') }}</a>
                                      @endif
                                      @if($item['searchType']==3)
                                            <a href="{{ url('newsDivisionDetails/'.$item['id']) }}" class="btn btn-primary">{{ __('titles.more') }}</a>
                                      @endif
                                      @if($item['searchType']==4)
                                            <a href="{{ url('meetingDivisionDetails/'.$item['id']) }}" class="btn btn-primary">{{ __('titles.more') }}</a>
                                      @endif
                                      @if($item['searchType']==5)
                                            <a href="{{ url('activityDetails/'.$item['id']) }}" class="btn btn-primary">{{ __('titles.more') }}</a>
                                      @endif
                                        </div>
                                    </div>
                              
                                   
@endforeach


                               
                                  
                        
                     

                         



                        </div>
                        <div class="clearfix"></div>
                       

                        </div>
                </div>
       
                  

                
            </div>

        </div>
    </section>
    <!--========== End News ==========-->



@endsection
@section('scripts')

@endsection