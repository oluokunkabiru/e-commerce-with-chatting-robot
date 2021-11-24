@php
        $setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}} {{ ucwords($setting->company) }}</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed By OLUOKUN KABIRU ADESINA
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{--  <script src="{{ asset('asset/plugins/chart.js/Chart.min.js') }}"></script>  --}}
<!-- Sparkline -->
{{--  <script src="{{ asset('asset/plugins/sparklines/sparkline.js') }}"></script>  --}}
<!-- JQVMap -->
{{--  <script src="{{ asset('asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>  --}}
{{--  <script src="{{ asset('asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>  --}}
<!-- jQuery Knob Chart -->
{{--  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>  --}}
<!-- daterangepicker -->
{{-- <script src="{{ asset('asset/plugins/moment/moment.min.js') }}"></script> --}}
{{--  <script src="{{ asset('asset/plugins/daterangepicker/daterangepicker.js') }}"></script>  --}}
<!-- Tempusdominus Bootstrap 4 -->
 {{-- <script src="{{ asset('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<!-- Summernote -->
 {{-- <script src="{{ asset('asset/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
<!-- overlayScrollbars -->
<script src="{{ asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>


<script src="{{ asset('asset/plugins/dist/js/adminlte.min.js') }}"></script>
@yield('script')
