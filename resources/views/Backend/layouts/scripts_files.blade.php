 <!-- JAVASCRIPT -->
 <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
 <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>


 <!-- apexcharts -->
 {{-- <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

 <!-- jquery.vectormap map -->
 <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
 <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

 <!-- Required datatable js -->
 <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

 <!-- Responsive examples -->
 <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

 {{-- <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script> --}}

 <!-- App js -->
 <script src="{{asset('assets/js/app.js')}}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @if(Session::has('message'))
 <script>

     var type = "{{ Session::get('alert-type','info') }}"
     switch(type) {
         case 'info':
             toastr.info("{{ Session::get('message') }}", "", { positionClass: 'toast-top-center' });
             break;
         case 'success':
             toastr.success("{{ Session::get('message') }}", "", { positionClass: 'toast-top-center' });
             break;
         case 'warning':
             toastr.warning("{{ Session::get('message') }}", "", { positionClass: 'toast-top-center' });
             break;
         case 'error':
             toastr.error("{{ Session::get('message') }}", "", { positionClass: 'toast-top-center' });
             break;
     }

 </script>
@endif
