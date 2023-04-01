@extends('Customer.webLayout.web')

@section('content')
<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/slider2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread"> {{ __('titles.devisionDetails') }}</h1>
            </div>
        </div>
    </div>
</section>
<!--========== End Banner ==========-->


<!--==========تفاصيل الشعبة ==========-->
<section class="ftco-section ftco-wrap-about bg-light">
    <div class="container">
        <div class="col-md-4">


        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar2 ">

                    <a class="active " href="#home-dept" onclick="homedept()">{{ __('titles.devisionBord') }}</a>
                    <a href="#about-dept" onclick="aboutdept()">{{ __('titles.meeting') }}</a>
                    <a href="#news-dept" onclick="newsdept()">{{ __('titles.news') }}</a>
                    <a href="#contact-dept" onclick="contentdept()">{{ __('titles.devisionReg') }}</a>

                </div>
            </div>
            <div class="col-md-9">
                @if ($message =Session::get('message'))
                <div id="alertDiv" class="alert alert-info alert-block" style="background-color:#6c757d;">
                    <button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>
                    <strong style="color:#fff;font-weight:bold ;text-align: center">
                    {{ __('titles.devMessage') }}
                </strong>
                </div>


                @endif
                <div class="content-dept">
                    <h5 style="border-bottom: 1px solid #CCC;">{{ __('titles.register') }} </h5>
                    <form action="{{route('registerDevision')}}" method="post">
                        @csrf


                        <input type="hidden" id="department_id" name="department_id" value="{{$divisionObj->id}}">
                        <div class="form-group">
                            <label for="name">{{ __('titles.name') }} </label>
                            <input class="form-control" id="name" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('links.phone') }} </label>
                            <input class="form-control" id="mobile" type="text" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('links.email') }} </label>
                            <input class="form-control" id="email" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('titles.subject') }} </label>
                            <input class="form-control" id="subject" type="text" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="message">{{ __('titles.notes') }} </label>
                            <textarea class="form-control" id="message" name="messege"></textarea>
                        </div>
                        <input class="btn btn-primary " type="submit" value="{{ __('titles.save') }} " />
                        <!-- </div> -->
                    </form>
                </div>

                <!-- </div> -->
                <div class="about-dept">
                    <h5 style="border-bottom: 1px solid #CCC;">{{ __('titles.meeting') }} </h5>

                    <div class="  col-xs-12">
                        <div class="  panel panel-default">
                            <div class=" panel-heading mt-5">

                            </div>
                            <div id="meetingContent" class=" panel-body">

                                @include('Customer.division.meetingList')




                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-dept">
                    <h5 style="border-bottom: 1px solid #CCC;">{{ __('titles.devisionBord') }} </h5>
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

                                            <a href="{{ url('people/'.$mastr->id) }}">
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

                                            <a href="{{ url('people/'.$mastr->id) }}">
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
                </div>
                <div class="news-dept">
                    <h5 style="border-bottom: 1px solid #CCC;">{{ __('titles.news') }}</h5>
                    <div class="  col-xs-12">
                        <div class=" panel panel-default">
                            <div class=" panel-heading mt-5">
                                <!-- <p id="newTitle"> الاخبار</p> -->
                            </div>
                            <div id="newsdivisionContent" class=" panel-body">

                                @include('Customer.division.newsList')


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>


    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {



        //pagination
        $(document).on('click', '#meetingPagination .pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_data(page);
        });


        //pagination
        $(document).on('click', '#newsDataPagination .pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_newsData(page);
        });


        function fetch_data(page) {

            $.ajax({

                url: "{{ URL::to('fetch_meetingdevision') }}?page=" + page,
                data: {

                    id: $("#department_id").val(),


                },


                success: function(data) {

                    $('#meetingContent').html(data);
                }
            });
        }

        function fetch_newsData(page) {

            $.ajax({

                url: "{{ URL::to('fetch_meetingdevision') }}?page=" + page,
                data: {

                    id: $("#department_id").val(),
                    start: 10,


                },


                success: function(data) {

                    $('#newsdivisionContent').html(data);
                }
            });
        }

    });
</script>
@endsection