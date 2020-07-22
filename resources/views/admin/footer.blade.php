
@section('footer')  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <strong>Copyright &copy; 2020-2030 <a href="http://adminlte.io">Huzaifa Ahmed</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('public/dist/js/adminlte.js')}}"></script>


<script src="{{asset('public/dist/js/select2.min.js')}}"></script>

 <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparklinepubl-->
<script src="{{asset('/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('public/script/jsPDF/dist/jspdf.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->


<script src="{{asset('public/dist/js/bootstrap-select.min.js')}}"></script>

<script src="{{asset('public/dist/js/jquery.tablednd.js')}}"></script>
<script src="{{asset('public/dist/js/jquery-sortable.js')}}"></script>
<!-- Bootstrap 4 -->


<script src="{{asset('public/dist/js/jQuery.print.min.js')}}"></script>

 <script src="{{asset('public/dist/js/jquery.paginate.min.js')}}"></script>

<script src="{{asset('public/dist/js/table-sortable.js')}}"></script>

<script src="{{asset('public/dist/js/jquery.table2excel.js')}}"></script>

<script src="{{asset('public/dist/js/choices.min.js')}}"></script>
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{asset('public/dist/css/datatables.min.css')}}"/>
 
<script type="text/javascript" src="{{asset('public/dist/js/datatables.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<!-- jQuery -->


<!-- AdminLTE -->

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script>


<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,

   dom: 'Bfrtip',
    buttons: [
     'copyHtml5', 'excelHtml5', 'pdf','csv','print'
 ],
 destroy:true
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,

   dom: 'Bfrtip',
    buttons: [
     'copyHtml5', 'excelHtml5', 'pdf','csv','print'
 ],destroy:true
    });

        $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,

   dom: 'Bfrtip',
    buttons: [
     'copyHtml5', 'excelHtml5', 'pdf','csv','print'
 ],
    });
  $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,

   dom: 'Bfrtip',
    buttons: [
     'copyHtml5', 'excelHtml5', 'pdf','csv','print'
 ],
    });
  });



</script>
</body>
</html>
@endsection('footer')