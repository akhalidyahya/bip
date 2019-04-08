@extends('layouts.main')
@section('content')
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
        <span class="active">Add Profile Business</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->

<!-- BEGIN PAGE BASE CONTENT -->
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <span class="caption-subject bold uppercase">Add Data Profile Business</span>
        </div>
    </div>
    <div class="portlet-body form">
        <form role="form" enctype="multipart/form-data" method="post" action="{{route('profiles.store')}}">
          @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success form-md-floating-label">
                            <div class="input-icon">
                                <input type="text" class="form-control" name="nama">
                                <label for="form_control_1">Nama Bisnis</label>
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input has-success form-md-floating-label">
                          <div class="input-icon">
                              <input type="text" class="form-control" name="lokasi">
                              <label for="form_control_1">Lokasi</label>
                              <i class="fa fa-location-arrow"></i>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input has-success form-md-floating-label">
                          <div class="input-icon">
                              <input type="text" class="form-control" name="pendapatan">
                              <label for="form_control_1">Pendapatan bulan terakhir</label>
                              <i class="fa fa-money"></i>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input has-success form-md-floating-label">
                  <div class="form-group form-md-line-input form-md-floating-label">
                      <textarea class="form-control" rows="5" name="penjelasan"></textarea>
                      <label for="form_control_1">Penjelasan Bisnis</label>
                  </div>
                </div>
                <div class="form-group form-md-line-input has-success form-md-floating-label">
                  <div class="form-group form-md-line-input form-md-floating-label">
                      <input type="file" name="" value="fotobisnis">
                      <label for="form_control_1">Foto</label>
                  </div>
                </div>
                <div class="form-group form-md-line-input has-success form-md-floating-label mt-repeater">
                    <div data-repeater-list="anggota">
                      <div data-repeater-item class="mt-repeater-item">
                        <div class="row mt-repeater-row">
                            <div class="col-md-3">
                                <label class="control-label">Nama Anggota</label>
                                <input type="text" placeholder="Nama Lengkap Anggota" class="form-control" name="anggota" autocomplete="off"/> </div>
                            <div class="col-md-3">
                                <label class="control-label">Jenis Kelamin</label>
                                <input type="text" placeholder="Jenis Kelamin" class="form-control" name="kelamin" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Angkatan</label>
                                <input type="text" placeholder="Angkatan" class="form-control" name="angkatan" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Instansi</label>
                                <input type="text" placeholder="Instansi" class="form-control" name="instansi" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Email</label>
                                <input type="text" placeholder="Email" class="form-control" name="email" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Phone</label>
                                <input type="text" placeholder="Phone" class="form-control" name="phone" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Instagram</label>
                                <input type="text" placeholder="Instagram" class="form-control" name="instagram" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Facebook</label>
                                <input type="text" placeholder="Facebook" class="form-control" name="facebook" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Twitter</label>
                                <input type="text" placeholder="Twitter" class="form-control" name="twitter" autocomplete="off"/>
                            </div>
                            <div class="col-md-1">
                                <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                    <i class="fa fa-close"></i>
                                </a>
                            </div>
                        </div>
                      </div>
                    </div>
                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                        <i class="fa fa-plus"></i> Add Anggota</a>
                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->
<!-- END PAGE BASE CONTENT -->

@endsection
