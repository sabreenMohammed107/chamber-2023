    
    <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="{{ asset('adminasset/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('adminasset/js/popper.min.js')}}"></script>
  <script src="{{ asset('adminasset/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('adminasset/js/perfect-scrollbar.js')}}"> </script>
  <script src="{{ asset('adminasset/js/jquery-ui.min.js')}}"> </script>
  <!-- Global Required Scripts End -->

  <!-- Page Specific Scripts Start -->
  <script src="{{ asset('adminasset/js/slick.min.js')}}"> </script>
  <script src="{{ asset('adminasset/js/moment.js')}}"> </script>
  <script src="{{ asset('adminasset/js/jquery.webticker.min.js')}}"></script>
  <script src="{{ asset('adminasset/js/Chart.bundle.min.js')}}"> </script>
  <script src="{{ asset('adminasset/js/Chart.Financial.js')}}"> </script>
  <!-- <script src="js/cryptocurrency.js"> </script> -->
  <!-- Page Specific Scripts Finish -->
 <!-- Date picker -->
 <script src="{{ asset('adminasset/js/datepicker.min.js')}}"></script>
    <script src="{{ asset('adminasset/js/select2.min.js')}}"></script>

  
  <!-- Page Specific Scripts Start -->
  <script src="{{ asset('adminasset/js/datatables.min.js')}}"> </script>
  <script src="{{ asset('adminasset/js/data-tables.js')}}"> </script>
  <!-- Page Specific Scripts End -->
<!-- Circular Progress Bar -->
<script src="{{ asset('adminasset/vendors/jquery-circle-progress/dist/circle-progress.min.js')}}"></script>
  <!-- Mystic core JavaScript -->
  <script src="{{ asset('adminasset/js/framework.js')}}"></script>
<!--sweeter-->
<script src="{{ asset('adminasset/js/sweetalert2.min.js')}}"></script>

  <!-- Settings -->
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <!-- <script src="https://cdn.tiny.cloud/1/njcj23xt8ekr7ctt6pngh2qrfmh6j98s8yly5xoh3txgpdh4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script src="{{ asset('adminasset/js/main.js')}}"></script>

   <!---Autocomplete------------------------------------------------>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--  bootstrap  Selector  -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

  <!---/Autocomplete------------------------------------------------>

  
  <!-- <script src="js/settings.js"></script> -->
  <script>
// delete alert


 function destroy(thing, id) {
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to restore  "+thing+" back !",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
  	$('#delete_'+id).submit();
  }
})
}

</script>
  @yield('scripts')
</body>
</html>