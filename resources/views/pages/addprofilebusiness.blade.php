@extends('layouts.main')
@section('content')
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
        <form role="form" enctype="multipart/form-data" method="post">
          @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success form-md-floating-label">
                            <div class="input-icon">
                                <input type="text" class="form-control">
                                <label for="form_control_1">Nama Bisnis</label>
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input has-success form-md-floating-label">
                          <div class="input-icon">
                              <input type="text" class="form-control">
                              <label for="form_control_1">Lokasi</label>
                              <i class="fa fa-location-arrow"></i>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-md-line-input has-success form-md-floating-label">
                          <div class="input-icon">
                              <input type="text" class="form-control">
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
