@extends('layouts.main')
@section('content')
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        @if(Auth::user()->role == 'bip')
        <h1>BIP Admin Dashboard
            <small>statistics, charts and reports</small>
        </h1>
        @else
        <h1>ADP Admin Dashboard
            <small>statistics, charts and reports</small>
        </h1>
        @endif
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
        <span class="active">Dashboard</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
@if(Auth::user()->role=='bip')
<div class="row widget-row">
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">Kelompok Bisnis</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green icon-bulb"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Jumlah</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$jml_bisnis}}">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">Jumlah Anggota</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-red icon-layers"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Jumlah</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$jml_anggota}}">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">Lorem Ipsum</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Jumlah</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="60">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">Dolor sit</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Jumlah</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="50">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
</div>
@else
<style media="screen">
  a {
    text-decoration: none !important;
  }
</style>
<div class="row widget-row">
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <a href="{{url('pembinaan/datamentah')}}">
          <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
              <h4 class="widget-thumb-heading">Pendataan</h4>
              <div class="widget-thumb-wrap">
                  <i class="widget-thumb-icon bg-green icon-bulb"></i>
                  <div class="widget-thumb-body">
                      <span class="widget-thumb-subtitle">Jumlah</span>
                      <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$jml_pendataan}}">0</span>
                  </div>
              </div>
          </div>
        </a>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <a href="{{url('pembinaan/draft')}}">
          <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
              <h4 class="widget-thumb-heading">Draft</h4>
              <div class="widget-thumb-wrap">
                  <i class="widget-thumb-icon bg-red icon-layers"></i>
                  <div class="widget-thumb-body">
                      <span class="widget-thumb-subtitle">Jumlah</span>
                      <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$jml_draft}}">0</span>
                  </div>
              </div>
          </div>
        </a>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <a href="{{url('pembinaan/karantina')}}">
          <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
              <h4 class="widget-thumb-heading">Karantina</h4>
              <div class="widget-thumb-wrap">
                  <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                  <div class="widget-thumb-body">
                      <span class="widget-thumb-subtitle">Jumlah</span>
                      <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$jml_karantina}}">0</span>
                  </div>
              </div>
          </div>
        </a>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <a href="{{url('pembinaan/aktif')}}">
          <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
              <h4 class="widget-thumb-heading">Aktif</h4>
              <div class="widget-thumb-wrap">
                  <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                  <div class="widget-thumb-body">
                      <span class="widget-thumb-subtitle">Jumlah</span>
                      <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$jml_aktif}}">0</span>
                  </div>
              </div>
          </div>
        </a>
        <!-- END WIDGET THUMB -->
    </div>
</div>
@endif
<div class="row">

</div>
<!-- END PAGE BASE CONTENT -->

@endsection
