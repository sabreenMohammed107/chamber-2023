@extends('Customer.webLayout.web')

@section('content')

<!--========== Start Banner ==========-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webasset/images/slider2.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">{{ __('titles.chamberNews') }}


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
            @include('Customer.news.indexNews')



        </div>

    </div>
</section>
<!--========== End News ==========-->



@endsection
@section('scripts')
<script>


    $(document).ready(function() {



        //pagination
        $(document).on('click', '#category .pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_data(page);
        });


        function fetch_data(page) {

            $.ajax({

                url: "{{ URL::to('fetch_data') }}?page=" + page,


                success: function(data) {
                    $('#newsContent').html(data);
                }
            });
        }

     


    });

    
</script>
@endsection