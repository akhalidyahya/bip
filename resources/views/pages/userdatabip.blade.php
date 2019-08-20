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
        <h1>BIP Admin | BIP & Makeit User Data
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
        <span class="active">User Data BIP + Makeit</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
      <a href="javascript:;" onclick="tambah()" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Anggota BIP</a>
      <a href="javascript:;" onclick="tambahMakeit()" class="btn btn-primary btn-flat"><i class="fa fa-smile-o"></i> Tambah Data Makeit</a>
      <a href="{{route('anggota.export')}}" class="btn btn-primary btn-flat"><i class="fa fa-download"></i> Export Data Semua Anggota</a>
      <p></p>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">User Data Anggota BIP dan Makeit</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis kelamin</th>
                            <!-- <th>Umur</th> -->
                            <th>Angkatan</th>
                            <th>Jurusan</th>
                            <!-- <th>Kelas</th> -->
                            <th>No Telpon</th>
                            <!-- <th>Email</th> -->
                            <th>Instansi</th>
                            <th>Bisnis</th>
                            <th>Tag</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
<div class="modal fade" id="myModal-form" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
              <form class="" method="post" enctype="multipart/form-data">
                {{csrf_field()}} {{method_field('POST')}}
                <input type="hidden" name="id" value="" id="id">
                <div class="form-body">
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="nama" type="text" class="form-control" name="nama">
                          <label for="form_control_1">Nama</label>
                          <i class="fa fa-user"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="kelamin" type="text" class="form-control" name="kelamin">
                          <label for="form_control_1">Jenis Kelamin</label>
                          <i class="fa fa-plus"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="umur" type="text" class="form-control" name="umur">
                          <label for="form_control_1">Umur</label>
                          <i class="fa fa-plus"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="angkatan" type="text" class="form-control" name="angkatan">
                          <label for="form_control_1">Angkatan</label>
                          <i class="fa fa-plus"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <!--<input id="jurusan" type="text" class="form-control" name="jurusan">-->
                          <!--<label for="form_control_1">Jurusan</label>-->
                          <i class="fa fa-newspaper-o"></i>
                          <select class="form-control" id="jurusan" name="jurusan">
                           <option value="" disabled="" selected=""> --Pilih Jurusan-- </option>
                           <option value="teknik sipil">Teknik Sipil</option>
                           <option value="teknik elektro">Teknik Elektro</option>
                           <option value="teknik grafika dan penerbitan">Teknik Grafika dan Penerbitan</option>
                           <option value="teknik informatika dan komputer">Teknik Informatika dan Komputer</option>
                           <option value="akuntansi">Akuntansi</option>
                           <option value="administrasi niaga">Administrasi Niaga</option>
                           <option value="lainnya">Lainnya</option>
													 <!--<option value="administrasi niaga">Cevest</option>-->
                         </select>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="kelas" type="text" class="form-control" name="kelas">
                          <label for="form_control_1">Kelas</label>
                          <i class="fa fa-newspaper-o"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="email" type="text" class="form-control" name="email">
                          <label for="form_control_1">Email</label>
                          <i class="fa fa-envelope"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="instansi" type="text" class="form-control" name="instansi">
                          <label for="form_control_1">Instansi</label>
                          <i class="fa fa-briefcase"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <input id="no_telp" type="text" class="form-control" name="no_telp">
                          <label for="form_control_1">No Telpon</label>
                          <i class="fa fa-phone"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success ">
                      <div class="input-icon">
                          <!--<input id="jurusan" type="text" class="form-control" name="jurusan">-->
                          <!--<label for="form_control_1">Jurusan</label>-->
                          <i class="fa fa-newspaper-o"></i>
                          <select class="form-control" id="kelompok" name="kelompok">
                           <option value="">Belum ada Kelompok</option>
                           @foreach($bisnis as $data)
                           <option value="{{$data->id}}">{{$data->nama}}</option>
                           @endforeach
                         </select>
                      </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-md-3">Multi value</label>
                        <div class="col-md-6">
                            <select multiple data-role="tagsinput">
                                <option value="Amsterdam">Amsterdam</option>
                                <option value="Washington">Washington</option>
                                <option value="Sydney">Sydney</option>
                                <option value="Beijing">Beijing</option>
                                <option value="Cairo">Cairo</option>
                            </select>
                        </div>
                    </div>
                    <a href="#" class="btn btn-default" id="submit">Submit</a>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button onclick="close()" type="close" class="btn dark btn-outline" data-dismiss="modal">Close
                </button>
                <!-- <button type="button" class="btn green">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
    // {data:'umur', name: 'umur'},
    {data:'angkatan', name: 'angkatan'},
    {data:'jurusan', name: 'jurusan'},
    // {data:'kelas', name: 'kelas'},
    {data:'no_telp', name: 'no_telp'},
    // {data:'email', name: 'email'},
    {data:'instansi', name: 'instansi'},
    {data:'nama_bisnis', name: 'nama_bisnis'},
    {data:'tag', name: 'tag'},
    {data:'edit_bip', name: 'edit_bip', orderable: false, searchable: false},
    {data:'delete_bip', name: 'delete_bip', orderable: false, searchable: false},
  ],
  'info'        : true,
  'autoWidth'   : false
});

function tambah() {
    $('#myModal-form').modal('show');
    save_method = 'add bip';
    $('input[name=_method]').val('POST');
    $('#myModal-form form')[0].reset();
    $('.modal-title').text('Tambah Anggota');
}

function tambahMakeit() {
    $('#myModal-form').modal('show');
    save_method = 'add makeit';
    $('input[name=_method]').val('POST');
    $('#myModal-form form')[0].reset();
    $('.modal-title').text('Tambah Data Makeit');
}

function edit(id){
  save_method = 'edit';
  $('input[name=_method]').val('PATCH');
  $('#myModal-form form')[0].reset();

  $.ajax({
    url: "{{ url('pembinaan') }}" + '/' + id + "/edit",
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('#myModal-form').modal('show');
      $('.modal-title').text('Edit Data');

      $('#id').val(data.id);
      $('#nama').val(data.nama);
      $('#kelamin').val(data.kelamin);
      $('#umur').val(data.umur);
      $('#angkatan').val(data.angkatan);
      $('#jurusan').val(data.jurusan);
      $('#kelas').val(data.kelas);
      $('#email').val(data.email);
      $('#instansi').val(data.instansi);
      $('#no_telp').val(data.no_telp);
      $('#kelompok').val(data.kelompok);
    },

    error :  function() {
      alert("Tidak Ada Data");
    }
  });
}

$('#submit').click(function(e){
      e.preventDefault();
      var id = $('#id').val();
      if (save_method=='add bip') url ="{{route('userdata.bip.store')}}";
      else if(save_method == 'add makeit') url = "{{route('userdata.makeit.store')}}";
      else url = "{{ url('bip/userdata/update') . '/' }}" + id;

      $.ajax({
        url : url,
        type : "POST",
        data : $('#myModal-form form').serialize(),
        success : function(data) {
          $('#myModal-form').modal('hide');
          t.ajax.reload();
        },

        error : function(){
          alert('Mohon Maaf Terjadi Kesalahan!')
       }
      });

  });
</script>
@endsection