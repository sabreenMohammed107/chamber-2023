<!--========== Start Navbar ==========-->

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

  <div class="container">

    <div class="row  navMobile">
    <div class="col-2"></div>
      <div class="col-6">
      <p><a href="{{url('/')}}" class="font-weight-bold">{{ __('links.home') }}</a></p>
      </div>

      <div class="col-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars" style="color: brown;"></span>
        </button>
      </div>
    </div>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class=" navbar-nav ">

        <li class="nav-item  "><a href="{{url('/')}}" class="nav-link">{{ __('links.home') }}</a></li>

        <li class="nav-item dropdown show ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('links.aboutChamber') }}
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{url('/aboutDirector')}}"> {{ __('links.aboutDirector') }}</a>
            <?php
            $current = now()->year;
            $prev = $current - 1;
            $next = $current + 3;
            ?>
            <a class="dropdown-item" href="{{url('/board')}}"> {{ __('links.bords') }} {{$prev}} - {{$next}}</a>
            <a class="dropdown-item" href="{{url('/history')}}"> {{ __('links.history') }}</a>
            <a class="dropdown-item" href="{{url('/messageVision')}}"> {{ __('links.messageVision') }}</a>

            <a class="dropdown-item" href="{{url('/section')}}"> {{ __('links.dept') }} </a>
            <a class="dropdown-item" href="{{url('/socialres')}}"> {{ __('links.cocialResponsibility') }}</a>
          </div>
        </li>


        <li class="nav-item dropdown show ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('links.mediacenter') }}
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{url('/news')}}"> {{ __('links.chamberNews') }}</a>
            <a class="dropdown-item" href="{{url('/album')}}"> {{ __('links.chamberAlbum') }}</a>
            <a class="dropdown-item" href="{{url('/announce')}}"> {{ __('links.announce') }}</a>
            <a class="dropdown-item" href="{{url('/chahbander')}}"> {{ __('links.shahbander') }}</a>

          </div>
        </li>

        <li class="nav-item dropdown show ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('links.retailAcademy') }}
          </a>
          <?php
          $articleAcademy = 9;
          $academytraining = 10;
          ?>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('academy/'.$articleAcademy) }}">{{ __('links.aboutAcademy') }}</a>
            <a class="dropdown-item" href="{{url('/course')}}">{{ __('links.courses') }}</a>
            <a class="dropdown-item" href="{{ url('academytraining/'.$academytraining) }}">{{ __('links.training') }}</a>





          </div>
        </li>


        <li class="nav-item dropdown show">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('links.chamberServices') }}
          </a>
          <?php
          $articleId = 1;
          $medicalId = 2;
          $insuranceId = 3;
          $ershadId = 4;
          $clubId = 5;
          $chamberConferanceId = 6;
          $tawfeekId = 7;
          $ladiesId = 8;

          ?>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('article/'.$articleId) }}">{{ __('links.excellence') }}</a>
            <a class="dropdown-item" href="{{ url('article/'.$medicalId) }}">{{ __('links.healthCare') }} </a>
            <a class="dropdown-item" href="{{ url('article/'.$insuranceId) }}">{{ __('links.lifeInsurance') }}</a>
            <a class="dropdown-item" href="{{ url('article/'.$ershadId) }}">{{ __('links.commerExtention') }} </a>
            <a class="dropdown-item" href="{{ url('article/'.$clubId) }}">{{ __('links.tradersClub') }}</a>
            <a class="dropdown-item" href="{{ url('article/'.$chamberConferanceId) }}">{{ __('links.conferenceRoom') }}</a>
            <a class="dropdown-item" href="{{ url('article/'.$tawfeekId) }}">{{ __('links.arbitration') }}</a>
          </div>
        </li>

        <li class="nav-item dropdown show ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ __('links.division') }}
          </a>


          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{url('/devision')}}">{{ __('links.devisionPages') }}</a>
            <a class="dropdown-item" href="{{url('/schedule')}}">{{ __('links.ScheduleDevision') }}</a>

          </div>
        </li>

        <li class="nav-item"><a href="{{url('/conference')}}" class="dropdown-item nav-link ">{{ __('links.conferences') }}</a></li>


        <li class="nav-item dropdown show ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ __('links.opportunities') }}
          </a>
          <?php
          $importId = 1;
          $exportId = 2;
          $investmentId = 3;
          $tendersId = 4;


          ?>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('chance/'.$importId) }}">{{ __('links.import') }} </a>
            <a class="dropdown-item" href="{{ url('chance/'.$exportId) }}">{{ __('links.export') }} </a>
            <a class="dropdown-item" href="{{ url('chance/'.$investmentId) }}"> {{ __('links.investment') }}</a>
            <a class="dropdown-item" href="{{ url('chance/'.$tendersId) }}"> {{ __('links.tenderAuction') }}</a>

          </div>
        </li>

        <li class="nav-item dropdown show ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ __('links.electronicService') }}
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{url('/online-payment')}}"> {{ __('links.online-payment') }}</a>
            <a class="dropdown-item" href="{{url('/qr-code')}}"> {{ __('links.qr-code') }}</a>
            <a class="dropdown-item" href="{{url('/blockchain')}}"> {{ __('links.blockchain') }}</a>

          </div>
        </li>
        <li class="nav-item dropdown show  ">
          <a class="dropdown-toggle nav-link"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ __('links.woman') }}
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('article/'.$ladiesId) }}">  {{ __('links.aboutCommittee') }}</a>
            <a class="dropdown-item" href="{{url('/activity')}}">  {{ __('links.committeeActivities') }}</a>

          </div>
        </li>

        <li class="nav-item"><a href="{{url('/encyclo')}}" class=" dropdown-item nav-link  ">{{ __('links.encyclo') }}</a></li>
        <!-- <li class="nav-item"><a href="depts.html" class="nav-link  mr-2">إدارات الغرفة</a></li> -->
        <li class="nav-item "><a href="{{url('/contact')}}" class="nav-link mr-1">{{ __('links.contact') }}</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--========== End Navbar ==========-->