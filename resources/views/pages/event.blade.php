@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Events
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
        <span class="active">Events</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row widget-row">
    <div class="col-md-12">
      <button onclick="tambahData()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Event</button>
    </div>
    <hr>
    @foreach($event as $data)
    <div onclick="close()" class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
          <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
              <h4 class="widget-thumb-heading">{{$data->kategori}}</h4>
              <div class="widget-thumb-wrap">
                  @if($data->kategori == 'entre')
                  <i class="widget-thumb-icon bg-green icon-bulb"></i>
                  @else
                  <i class="widget-thumb-icon bg-blue icon-notebook"></i>
                  @endif
                  <div class="widget-thumb-body">
                      <span class="widget-thumb-subtitle">{{$data->name}}</span>
                      <!-- <p></p> -->
                      <div class="">
                        <a onclick="editData({{$data->id}})" href="javascript:;" class="widget-thumb-action font-blue">Edit</a> |
                        <a onclick="deleteData({{$data->id}})" href="javascript:;" class="widget-thumb-action font-red-mint">Delete
                        </a>
                      </div>
                      <!-- <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">0</span> -->
                  </div>
              </div>
          </div>
        <!-- END WIDGET THUMB -->
    </div>
    @endforeach
</div>
<div class="row">

</div>
<!-- MODAL -->
<div class="modal fade" id="myModal-form" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <!-- <button type="button" onclick="close()" name="button">x</button> -->
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
              <form class="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}} {{method_field('POST')}}
                <input type="hidden" name="id" value="" id="id">
                <div class="form-body">
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="name" type="text" class="form-control" name="name" required autocomplete="off">
                          <label for="form_control_1">Nama Event</label>
                          <i class="fa fa-calendar"></i>
                      </div>
                  </div>
                   <div class="form-group form-md-line-input has-success form-md-floating-label">
                    <label for="form_control_1">Kategori Event</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">-Pilih-</option>
                        <option value="entre">Entre</option>
                        <option value="riset">Riset</option>
                    </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" id="submit" class="btn btn-default">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn dark btn-outline" data-dismiss="modal">Close
                </button>
                <!-- <button type="button" class="btn green">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL -->
<!-- END PAGE BASE CONTENT -->
<script type="text/javascript">
function tambahData(){
  $('#myModal-form').modal('show');
  save_method = 'add';
  $('input[name=_method]').val('POST');
  // $('.modal').removeClass('fade');
  // $('.modal').addClass('show');
  $('#myModal-form form')[0].reset();
  $('.modal-title').text('Tambah data');
}

function editData(id){
  save_method = 'edit';
  $('input[name=_method]').val('PATCH');
  $('#myModal-form form')[0].reset();

  $.ajax({
    url: "{{ url('pengaturan/event') }}" + '/' + id + "/edit",
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('#myModal-form').modal('show');
      $('.modal-title').text('Edit Data');

      $('#id').val(data.id);
      $('#name').val(data.name);
      $('#kategori').val(data.kategori);
    },

    error :  function() {
      alert("Tidak Ada Data");
    }
  });
}

$('#submit').click(function(e){
    e.preventDefault();
    var id = $('#id').val();
    if (save_method=='add') url ="{{route('event.store') }}";
    else url = "{{ url('pengaturan/event') . '/' }}" + id;

    $.ajax({
      url : url,
      type : "POST",
      data : $('#myModal-form form').serialize(),
      success : function(data) {
        $('#myModal-form').modal('hide');
        location.reload();
      },

      error : function(){
        alert('Mohon Maaf Terjadi Kesalahan!')
     }
    });
});

function deleteData(id){
  var popup = confirm("Apakah Anda yakin untuk menghapus data ini?");
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  if (popup  == true){
    $.ajax({
      url : "{{ url('pengaturan/event') }}" + '/' + id,
      type : "POST",
      data : {'_method' : 'DELETE', '_token' : csrf_token},
      success: function(data){
        // $('#myModal-form').modal('hide');
        location.reload();
        // console.log(data);
      },
      error : function() {
        alert("Maaf Terjadi Kesalahan!");
      }
    })
  }
}
</script>
@endsection
