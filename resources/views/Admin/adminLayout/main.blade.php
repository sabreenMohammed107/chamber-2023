@include('Admin.adminLayout.head')


<body class="ms-body   ms-primary-theme ms-has-quickbar">
<!-- Pre LOADER -->
<div id="LoaderWrapper">
    <div class="spinner spinner-4">
        <div class="cube1"></div>
        <div class="cube2"></div>
      </div>
</div>
<!-- /Pre LOADER -->

 <!-- Overlays -->
 <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
 <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
 
@include('Admin.adminLayout.aside')

<main class="body-content">

    @include('Admin.adminLayout.header')
     <!-- Page Content   -->
     <div class="ms-content-wrapper">
            
            @yield('crumb')
            
            @if(Session::has('flash_success'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        <strong><i class="fas fa-check-circle"></i> {!! session('flash_success') !!}</strong>
                    </div>
                </div>
            @endif
            @if(Session::has('flash_danger'))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <strong><i class="fas fa-info-circle"></i> {!! session('flash_danger') !!}</strong>
                    </div>
                </div>
            @endif
            @if(Session::has('flash_delete'))
                @section('script')
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                @endsection
            @endif

            @yield('content')
        </div>
   <!-- Page Content   -->
   
 </main>

 @yield('modal')
 


 @include('Admin.adminLayout.footer')