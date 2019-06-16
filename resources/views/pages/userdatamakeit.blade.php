@extends('layouts.main')
@section('content')

<meta name="csrf_token" content="{{ csrf_token() }}">
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- END ADDITIONAL JS -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>BIP Admin | Make it User Data
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
        <span class="active">Make it</span>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">User Data</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
      <a onclick="tambahData();" class="btn btn-primary btn-flat">
        <i class="fa fa-plus"></i> Tambah Data
      </a>
      <p></p>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">User Data Make it</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="t">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Instansi</th>
                            <th>Phone</th>
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
<!-- modal -->
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
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="nama" type="text" class="form-control" name="nama">
                          <label for="form_control_1">Nama</label>
                          <i class="fa fa-calendar"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="kelamin" type="text" class="form-control" name="kelamin">
                          <label for="form_control_1">Jenis Kelamin</label>
                          <i class="fa fa-plus"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="umur" type="text" class="form-control" name="umur">
                          <label for="form_control_1">Umur</label>
                          <i class="fa fa-plus"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="email" type="text" class="form-control" name="email">
                          <label for="form_control_1">Email</label>
                          <i class="fa fa-newspaper-o"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="instansi" type="text" class="form-control" name="instansi">
                          <label for="form_control_1">Instansi</label>
                          <i class="fa fa-briefcase"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="no_telp" type="text" class="form-control" name="no_telp">
                          <label for="form_control_1">No Telpon</label>
                          <i class="fa fa-money"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="instagram" type="text" class="form-control" name="instagram">
                          <label for="form_control_1">Instagram</label>
                          <i class="fa fa-circle"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="facebook" type="text" class="form-control" name="facebook">
                          <label for="form_control_1">Facebook</label>
                          <i class="fa fa-circle"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="twitter" type="text" class="form-control" name="twitter">
                          <label for="form_control_1">Twitter</label>
                          <i class="fa fa-circle"></i>
                      </div>
                  </div>
                    <button id="submit" class="btn btn-default">Submit</button>
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
<!-- /.modal -->
<!-- END PAGE BASE CONTENT -->

<script type="text/javascript">
  var table = $('#t').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax' : "{{route('apimakeit') }}",
            'dataType' : 'JSON',
            'paging' : true,
            'lengthChange': true, 
            'columns': [
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'instansi', name: 'instansi'},
            {data: 'no_telp', name: 'no_telp'},
            {data: 'aksi', name: 'aksi', orderable: false, searchable: false}
            ],
            'info': true,
            'autoWidth': false
  });

  function tambahData(){
    save_method = 'add';
    $('input[name=_method]').val('POST');
    $('.modal').removeClass('fade');
    $('.modal').addClass('show');
    $('#myModal-form form')[0].reset();
    $('.modal-title').text('Tambah data');

  }

  function editData(id){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#myModal-form form')[0].reset();

    $.ajax({
      url: "{{ url('makeit') }}" + '/' + id + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('#myModal-form').modal('show');
        $('.modal-title').text('Edit Data');
      
        $('#id').val(data.id);
        $('#nama').val(data.nama);
        $('#kelamin').val(data.kelamin);
        $('#umur').val(data.umur);
        $('#email').val(data.email);
        $('#instansi').val(data.instansi);
        $('#no_telp').val(data.no_telp);
        $('#instagram').val(data.instagram);
        $('#facebook').val(data.facebook);
        $('#twitter').val(data.twitter);
      },

      error :  function() {
        alert("Tidak Ada Data");
      }
    });
  }

  function deleteData(id){
    var popup = confirm("Apakah Anda yakin untuk menghapus data ini?");
    var csrf_token = $('meta[name="csrf_token"]').attr('content');
    if (popup  == true){
      $.ajax({
        url : "{{ url('makeit') }}" + '/' + id,
        type : "POST",
        data : {'_method' : 'DELETE', '_token' : csrf_token},
        success: function(data){
          table.ajax.reload();
          console.log(data);
        },
        error : function() {
          alert("Maaf Terjadi Kesalahan!");
        }
      })
    }
  }

  $('#submit').click(function(e){
      e.preventDefault();
      var id = $('#id').val();
      if (save_method=='add') url ="{{url('makeit') }}";
      else url = "{{ url('makeit') . '/' }}" + id;

      $.ajax({
        url : url,
        type : "POST",
        data : $('#myModal-form form').serialize(),
        success : function(data) {
          $('#myModal-form').modal('hide');
          table.ajax.reload();
        },

        error : function(){
          alert('Mohon Maaf Terjadi Kesalahan!')
       }
      });
    
  });

  var mywindow;
  function close(){
    mywindow.close();
  }
</script>
@endsection