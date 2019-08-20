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
<script src="{{asset('assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/form-repeater.js')}}" type="text/javascript"></script>
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
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Edit Profile Business</span>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Edit Anggota Business</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->

<!-- BEGIN PAGE BASE CONTENT -->
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="row">
    <div class="col-md-7">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-black">
                    <span class="caption-subject bold uppercase">Anggota Kelompok <a href="{{url('bip/profiles/detail').'/'.$bisnis->id}}">{{$bisnis->nama}}</a></span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table table-responsive table-striped" id="table2">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Angkatan</th>
                            <th>Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <a class="btn btn-primary" href="{{url('bip/profiles/detail').'/'.$bisnis->id}}"><i class="fa fa-arrow-left"></i> Selesai</a>
        </div>
    </div>
    <div class="col-md-5">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-black">
                    <span class="caption-subject bold uppercase">Daftar Anggota BIP</span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table table-responsive table-striped" id="table">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Angkatan</th>
                        </tr>
                    </thead> 
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->
<!-- END PAGE BASE CONTENT -->
<script>
    var t = $('#table2').DataTable({
        'processing'  : true,
        'serverSide'  : true,
        'ajax'        : "{{ url('api/anggotakelompok').'/'.$bisnis->id }}",
        'dataType'    : 'json',
        'paging'      : true,
        'lengthChange': true,
        'columns'     : [
            {data:'nama', name:'nama'},
            {data:'instansi', name: 'instansi'},
            {data:'angkatan', name: 'angkatan'},
            {data:'aksi', name: 'aksi', orderable: false, searchable: false},
        ],
        'info'        : true,
    });
    var t2 = $('#table').DataTable({
        'processing'  : true,
        'serverSide'  : true,
        'ajax'        : "{{ url('api/anggotabip').'/'.$bisnis->id }}",
        'dataType'    : 'json',
        'paging'      : true,
        'lengthChange': true,
        'columns'     : [
            {data:'aksi', name: 'aksi', orderable: false, searchable: false},
            {data:'nama', name:'nama'},
            {data:'instansi', name: 'instansi'},
            {data:'angkatan', name: 'angkatan'},
        ],
        'info'        : true,
    });

    function tambah(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url:'{{url('bip/profiles/anggota/tambah/')}}'+'/'+id+'/'+{{$bisnis->id}},
        type:'POST',
        data: {'_method': 'PATCH','_token': csrf_token},
        success: function($data){
            // alert('data updated');
            t.ajax.reload();
            t2.ajax.reload();
        },
        error: function(){
            alert('something went wrong');
            // $('#error').removeClass('hide');
        }
        });
    }

    function hapus(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url:'{{url('bip/profiles/anggota/hapus/')}}'+'/'+id,
        type:'POST',
        data: {'_method': 'PATCH','_token': csrf_token},
        success: function($data){
            // alert('data updated');
            t.ajax.reload();
            t2.ajax.reload();
        },
        error: function(){
            alert('something went wrong');
            // $('#error').removeClass('hide');
        }
        });
    }
</script>
@endsection
