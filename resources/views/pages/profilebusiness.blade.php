@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE CSS -->
<link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE CSS -->
<!-- BEGIN ADDITIONAL JS -->
<script src="{{asset('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
<!-- END ADDITIONAL JS -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>BIP Admin | Profile Business
            <small>statistics, charts and reports</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">BIP</span>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Profile Business</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
      <a href="{{url('bip/profiles/create')}}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
      <a href="{{route('business.export')}}" class="btn btn-primary btn-flat"><i class="fa fa-download"></i> Export Data Bisnis</a>
      
      <p></p>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Profile Business</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama Bisnis</th>
                            <th>Lokasi Bisnis</th>
                            <th>Pendapatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Pendapatan</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
<script type="text/javascript">
var t = $('#myTable').DataTable({
  'processing'  : true,
  'serverSide'  : true,
  'ajax'        : "{{ route('api.bisni') }}",
  'dataType'    : 'json',
  'paging'      : true,
  'lengthChange': true,
  'columns'     : [

    {data:'nama', name: 'nama'},
    {data:'lokasi', name: 'lokasi'},
    {data:'pendapatan', name: 'pendapatan'},
    {data:'aksi', name: 'aksi', orderable: false, searchable: false},
  ],
  'buttons': [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'copy', className: 'btn red btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'excel', className: 'btn yellow btn-outline ' },
                { extend: 'csv', className: 'btn purple btn-outline ' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],
  'info'        : true,
  'autoWidth'   : false
});

function info(id){
  url = "{{url('bip/profiles/detail/')}}"+"/"+id
  window.location.replace(url);
}

</script>
<script type="text/javascript">
function deleteData(id) {
  var popup = confirm("Apakah ingin hapus data?");
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  if(popup == true) {
    $.ajax({
      url: "{{ url('bip/profiles') }}" + '/' + id,
      type: "POST",
      data: {'_method': 'DELETE','_token': csrf_token},
      success: function(data) {
        alert('data deleted');
        t.ajax.reload();
      },
      error: function(){
        alert("something went wrong!");
      }
    });
  }
}
</script>
@endsection
