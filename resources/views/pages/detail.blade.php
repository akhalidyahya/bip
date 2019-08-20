@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE CSS -->
<link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE CSS -->
<!-- BEGIN ADDITIONAL JS -->
<script src="{{asset('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
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
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Detail</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
      <a href="{{url('bip/profiles/').'/'.$info[0]->id.'/edit'}}" class="btn btn-primary btn-flat"><i class="fa fa-wrench"></i> Edit Kelompok Bisnis</a>
      <a href="{{url('bip/profiles/').'/'.$info[0]->id.'/anggota'}}" class="btn btn-primary btn-flat"><i class="fa fa-users"></i> Edit Anggota Kelompok</a>
      <a onclick="activity()" class="btn btn-primary btn-flat"><i class="fa fa-calendar"></i> Tambah Progress</a>
      <p></p>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Detail {{$info[0]->nama}}</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table id="myTable" class="table">
                    <tr>
                      <td>Nama Bisnis</td>
                      <td>:</td>
                      <td>{{$info[0]->nama}}</td>
                    </tr>
                    <tr>
                      <td>Batch</td>
                      <td>:</td>
                      <td>{{$info[0]->batch}}</td>
                    </tr>
                    <tr>
                      <td>Lokasi</td>
                      <td>:</td>
                      <td>{{$info[0]->lokasi}}</td>
                    </tr>
                    <tr>
                      <td>Pendapatan bulan terakhir</td>
                      <td>:</td>
                      <td>Rp. {{$info[0]->pendapatan}}</td>
                    </tr>
                    <tr>
                      <td>Penjelasan Bisnis</td>
                      <td>:</td>
                      <td>{{$info[0]->penjelasan}}</td>
                    </tr>
                    <!-- <tr>
                      <td>Foto</td>
                      <td>:</td>
                      <td><img src="{{$info[0]->foto}}" alt="{{$info[0]->foto}}"> </td>
                    </tr> -->
                    <tr>
                      <td>Anggota</td>
                      <td>:</td>
                      <td>
                        @foreach($anggota as $data)
                        {{$data->nama}} ({{$data->angkatan}})<br>
                        @endforeach
                      </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
<!-- <<<<<<< HEAD -->
        <div class="row">
          <div class="col-lg-12 col-xs-12 col-sm-12">
<!-- ======= -->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-directions font-green hide"></i>
                    <span class="caption-subject bold font-dark uppercase "> Konsultasi</span>
                    <span class="caption-helper">Progress bisnis</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="60">
                    <div class="timeline">
                        <div class="events-wrapper">
                            <div class="events">
<!-- >>>>>>> origin/aryo100 -->
                          @if($activities[0]->judul != NULL)
                                <ol>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($activities as $data)
                                    <li>
                                        <a href="#0" data-date="{{date('d/m/Y', strtotime($data->tanggal))}}" class="border-after-red bg-after-red @if( $i == 0 ) selected @endif">{{date('d F', strtotime($data->tanggal))}}</a>
                                    </li>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </ol>
                                @else
                                @endif
                                <span class="filling-line bg-red" aria-hidden="true"></span>
                            </div>
                            <!-- .events -->
                        </div>
                        <!-- .events-wrapper -->
                        <ul class="cd-timeline-navigation mt-ht-nav-icon">
                            <li>
                                <a href="#0" class="prev inactive btn btn-outline red md-skip">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0" class="next btn btn-outline red md-skip">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- .cd-timeline-navigation -->
                    </div>
                    <!-- .timeline -->
                    <div class="events-content">
                        <ol>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($activities as $data)
                            <li @if( $i == 0 ) class="selected" @endif data-date="{{date('d/m/Y', strtotime($data->tanggal))}}">
                                <div class="mt-title">
                                    <h2 class="mt-content-title">{{$data->judul}}</h2>
                                </div>
                                <div class="mt-author">
                                    <div class="mt-author-name">
                                        <a href="javascript:;" class="font-blue-madison">{{$data->penulis}}</a>
                                    </div>
                                    <div class="mt-author-datetime font-grey-mint">{{date('d M Y H:i:s', strtotime($data->tanggal))}}</div>
                                    <div class="mt-author-datetime font-grey-mint">Pendapatan: {{$data->pendapatan}}</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="mt-content border-grey-steel">
                                    <p>{{$data->isi}}</p>
                                    <a onclick="deleteActivity({{$data->id}})" href="javascript:;" class="btn btn-circle btn-icon-only red">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </li>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </ol>
                    </div>
                    <!-- .events-content -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
              <form class="" method="post">
                {{csrf_field()}} {{method_field('POST')}}
                <input type="hidden" name="id" value="" id="id">
                <input type="hidden" name="bisnisId" value="{{$info[0]->id}}" id="bisnisId">
                <div class="form-body">
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                        <i class="fa fa-calendar"></i>
                          <label for="form_control_1">Tanggal</label>
                          <div class="input-group date form_datetime">
                              <input id="tanggal" name="tanggal" type="text" size="16" readonly class="form-control" autocomplete="off">
                              <span class="input-group-btn">
                                  <button class="btn default date-set" type="button">
                                      <i class="fa fa-calendar"></i>
                                  </button>
                              </span>
                          </div>
                      </div>
                  </div>
                    <script type="text/javascript">
                        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
                    </script>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="judul" type="text" class="form-control" name="judul">
                          <label for="form_control_1">Judul</label>
                          <i class="fa fa-newspaper-o"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="judul" type="text" class="form-control" name="pendapatan">
                          <label for="form_control_1">Pendapatan</label>
                          <i class="fa fa-money"></i>
                      </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <textarea class="form-control" rows="5" name="isi" id="isi"></textarea>
                        <label for="form_control_1">Isi</label>
                    </div>
                  </div>
                  <div class="form-group form-md-line-input has-success form-md-floating-label">
                      <div class="input-icon">
                          <input id="penulis" type="text" class="form-control" name="penulis">
                          <label for="form_control_1">Penanggung Jawab</label>
                          <i class="fa fa-user"></i>
                      </div>
                  </div>
                    <div class="form-actions noborder text-center">
                        <button id="submit" class="btn blue">Submit</button>
                        <!-- <button type="button" class="btn default">Cancel</button> -->
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
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
function activity(){
  save_method = 'add';
  $('input[name=_method]').val('POST');
  $('#myModal').modal('show');
  $('#myModal form')[0].reset();
  $('.modal-title').text('Tambah Progress Bisnis');
}

function deleteActivity(id){
  var popup = confirm("Apakah ingin hapus data?");
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    if(popup == true) {
      $.ajax({
        url: "{{ url('delete/activity') }}" + '/' + id,
        type: "POST",
        data: {'_method': 'DELETE','_token': csrf_token},
        success: function(data) {
          // t.ajax.reload();
          location.reload();
        },
        error: function(){
          alert("something went wrong!");
        }
      });
    }
}

$('#submit').click(function(e){
  e.preventDefault();
  var id = $('#id').val();
  if(save_method == 'add') url = "{{url('bip/profiles/detail/activity/store')}}";
  else url = "" + id;

  $.ajax({
    url:url,
    type:'POST',
    // data: $('#myModal form').serialize(),
    data: new FormData($('#myModal form')[0]),
    contentType: false,
    processData: false,
    success: function($data){
      $('#myModal').modal('hide');
      if (save_method=='add') {
        alert('data added');
        location.reload();
      } else {
        alert('data updated');
      }
      t.ajax.reload();
    },
    error: function(){
      alert('something went wrong');
      // $('#error').removeClass('hide');
    }
  });
});
</script>
@endsection
