@extends('Customer.webLayout.web')

@section('content')

<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">{{ __('titles.boards') }} </h1>
      </div>
    </div>
  </div>
</section>
<!--========== End Banner ==========-->




<!--========== مجلس الإدارة ==========-->
<section class=" ftco-wrap-about">
  <div class="container">
    <div class="row">

      <div class="col-md-12 ftco-animate">
      <div class="heading-section mb-4 my-5 my-md-0">
                                <!-- <h2 class="mb-4">مجلس الإدارة</h2>
    <hr class="TitlesHr"> -->
                            </div>


                            <div class="row justify-content-center mt-5">

                                <div class="col-md-12 mt-4" style="margin-bottom: 30px;">

                                    <h5 class="mb-4">
                                        @if($currentBoard!=null)
                                        <a class=" heading-section font-weight-bold mb-4">

                                            <?php

                                            $datemaster = date_create($currentBoard->from_date);

                                            $toDatemaster = date_create($currentBoard->to_date);

                                            ?>

                                            {{ __('titles.boards_from') }} {{ date_format($datemaster,"Y") }} {{ __('titles.boards_to') }} {{ date_format($toDatemaster,"Y") }}

                                        </a>
                                        @endif
                                    </h5>
                                </div>



                                <div class="card card-body col-md-9" style="box-shadow: 2px 2px 2px 2px #CCC; border-radius: 10px;">

                                    <div class="row">
                                        @foreach($mastrBoard as $mastr)


                                        <div class="col-md-4">

                                            <a href="{{ url('boardPeople/'.$mastr->id) }}">
                                                <img src="{{ asset('uploads/people/'.$mastr->image) }}" class="img-fluid" ةstyle="height:100px !important">

                                            </a>

                                            <h6> @if(app()->getLocale()=='en')
                                                {{$mastr->en_name}}
                                                @else
                                                {{$mastr->ar_name}}
                                                @endif</h6>

                                            <p style="text-align: center !important">
                                                @if(app()->getLocale()=='en')
                                                {{$mastr->en_position}}
                                                @else
                                                {{$mastr->ar_position}}
                                                @endif
                                            </p>

                                        </div>
                                        @endforeach





                                    </div>

                                </div>

                            </div>


                            <div class="row justify-content-center" style="margin-top: 50px; margin-bottom: 50px;
">
                                <div class="col-md-12 mt-4" style="margin-bottom: 30px;">

                                    <h5 class="mb-4">
                                        @if($prevBoard!=null)
                                        <a class=" heading-section font-weight-bold mb-4">
                                            <?php $date = date_create($prevBoard->from_date);
                                            $toDate = date_create($prevBoard->to_date);
                                            ?>
                                            {{ __('titles.boards_from') }} {{ date_format($date,"Y") }} {{ __('titles.boards_to') }} {{ date_format($toDate,"Y") }}
                                        </a>
                                        @endif
                                    </h5>
                                </div>


                                <div class="card card-body col-md-9" style="box-shadow: 2px 2px 2px 2px #CCC; border-radius: 10px;">

                                    <div class="row">
                                        @foreach($subBoard as $mastr)
                                        <div class="col-md-4">

                                            <a href="{{ url('boardPeople/'.$mastr->id) }}">
                                                <img src="{{ asset('uploads/people/'.$mastr->image) }}" class="img-fluid" ةstyle="height:100px !important">

                                            </a>

                                            <h6> @if(app()->getLocale()=='en')
                                                {{$mastr->en_name}}
                                                @else
                                                {{$mastr->ar_name}}
                                                @endif</h6>
                                            <p style="text-align: center !important">
                                                @if(app()->getLocale()=='en')
                                                {{$mastr->en_position}}
                                                @else
                                                {{$mastr->ar_position}}
                                                @endif</p>

                                        </div>

                                        @endforeach



                                    </div>

                                </div>
                            </div>
                            <!--=================bullets  End====================-->


                            <div class="row justify-content-center" style="margin-top: 50px; margin-bottom: 50px;
">
                                <div class="col-md-12 mt-4" style="margin-bottom: 30px;">

                                    <h5 class="mb-4">
                                        <a class=" heading-section font-weight-bold mb-4">
                                            {{ __('titles.prev_board') }}
                                        </a>
                                    </h5>
                                </div>

                                <div class="card card-body col-md-9" style=" border:none;">

                                    <div class="row ">

                                        <table class="rwd-table " style="box-shadow: 2px 2px 2px 2px #CCC;">
                                            <tr>
                                                <th> {{ __('titles.manger') }} </th>
                                                <th> {{ __('titles.from') }} </th>
                                                <th> {{ __('titles.to') }}</th>

                                            </tr>
                                            @foreach($oldestList as $sub)
                                            <tr>
                                                <?php $from = date_create($sub->from_date);
                                                $to = date_create($sub->to_date);
                                                ?>
                                                <td>{{$sub->manager_en_name}}</td>
                                                <td>{{ date_format($from,"d-m-Y") }}</td>


                                                <td>{{ date_format($to,"d-m-Y") }}</td>

                                            </tr>
                                            @endforeach


                                        </table>


                                    </div>

                                    <!--=================bullets  End====================-->






                                </div>


                            </div>
      </div>
    </div>
</section>




@endsection

@section('scripts')
@endsection