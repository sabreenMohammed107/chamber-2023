 <!--========== Back To Top Button ==========-->
 <a href="#" id="scroll" style="display: none;"><span></span></a>


<!--========== Jquery ==========-->
<script src="{{ asset('webasset/js/jquery.min.js')}}"></script>

<!--========== Jquery Migrate ==========-->
<script src="{{ asset('webasset/js/jquery-migrate-3.0.1.min.js')}}"></script>

<!--========== Popper JS ==========-->
<script src="{{ asset('webasset/js/popper.min.js')}}"></script>

<!--========== Bootstrap JS ==========-->
<script src="{{ asset('webasset/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('webasset/js/zabuto_calendar.min.js')}}"></script>
<!--========== Waypoints JS ==========-->
<script src="{{ asset('webasset/js/jquery.waypoints.min.js')}}"></script>

<!--========== Stellar JS ==========-->
<script src="{{ asset('webasset/js/jquery.stellar.min.js')}}"></script>

<!--========== Carousel JS ==========-->
<script src="{{ asset('webasset/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('webasset/js/wow.min.js')}}"></script>
<!--========== Aos CSS ==========-->
<script src="{{ asset('webasset/js/aos.js')}}"></script>

<!--========== Scrollax JS ==========-->
<script src="{{ asset('webasset/js/scrollax.min.js')}}"></script>
<!--========== Data Table ==========-->
<script src="{{ asset('webasset/js/jquery.dataTable.js')}}"></script>

<!--========== counter ==========-->
<script src="{{ asset('webasset/js/jquery.animateNumber.min.js')}}"></script>
<!--========== Main JS ==========-->
<script src="{{ asset('webasset/js/main.js')}}"></script>

<!--========== fancy JS ==========-->
<script src="{{ asset('webasset/js/jquery.fancybox.js')}}"></script>
<!--========== lightbox JS ==========-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script>
  function on() {
    document.getElementById("overlay").style.display = "block";
  }
  
  function off() {
    document.getElementById("overlay").style.display = "none";
   
  }
  </script>
  
<script>
  $(window).load(function () {

    $(".loader_inner").fadeOut();
    $(".loader").delay(400).fadeOut("slow");
    

  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });




  });
</script>
<script>
  new WOW().init();
</script>
<script>
  var eventData = [
    { "date": "2019-12-01", "badge": true, "title": "ُEvent now 1" },
    { "date": "2019-12-02", "badge": true, "title": "Example 2" },
    { "date": "2019-12-10", "badge": false, "title": "Event Expire 2" }
  ];
  $(document).ready(function () {

    $('#calendar').zabuto_calendar({
      cell_border: true,
      today: true,
      show_days: true,


      nav_icon: {
        prev: '<i class="fa fa-chevron-circle-left"></i>',
        next: '<i class="fa fa-chevron-circle-right"></i>'

      },

      data: eventData
    }
    );
  });
</script>

@yield('scripts')
</body>

</html>