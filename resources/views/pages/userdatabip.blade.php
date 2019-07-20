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
        <h1>BIP Admin | BIP User Data
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
        <span class="active">User Data Anggota BIP</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
      <!-- <a href="{{url('bip/profiles/create')}}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data</a> -->
      <a href="{{route('anggota.export')}}" class="btn btn-primary btn-flat"><i class="fa fa-download"></i> Export Data Anggota</a>
      <p></p>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">User Data Anggota BIP</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis kelamin</th>
                            <th>Umur</th>
                            <th>Angkatan</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Instansi</th>
                            <th>Bisnis</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
  'ajax'        : "{{ route('apipembinaan') }}",
  'dataType'    : 'json',
  'paging'      : true,
  'lengthChange': true,
  'columns'     : [
    {data:'nama', name: 'nama'},
    {data:'kelamin', name: 'kelamin'},
    {data:'umur', name: 'umur'},
    {data:'angkatan', name: 'angkatan'},
    {data:'jurusan', name: 'jurusan'},
    {data:'kelas', name: 'kelas'},
    {data:'no_telp', name: 'no_telp'},
    {data:'email', name: 'email'},
    {data:'instansi', name: 'instansi'},
    {data:'businesses_id', name: 'businesses_id'},
    // {data:'aksi', name: 'aksi', orderable: false, searchable: false},
  ],
  'info'        : true,
  'autoWidth'   : false
});
</script>
@endsection
