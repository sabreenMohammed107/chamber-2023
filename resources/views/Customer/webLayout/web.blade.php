@include('Customer.webLayout.head')

<body>

    @include('Customer.webLayout.header')
    @include('Customer.webLayout.navSide')

    <!-- container -->
   
    @yield('content')





    @include('Customer.webLayout.footer')

    @include('Customer.webLayout.footerScripts')