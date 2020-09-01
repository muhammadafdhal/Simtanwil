@extends('layouts.app')

@section('status-home')active-menu

@endsection

@section('content')




<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Dashboard
        </h1>
    </div>
</div>
<!-- /. ROW  -->

<div class="panel-body">
    <div class="alert alert-success">
        <strong>
            <h3>
                <center>Selamat Datang Di Sistem Informasi Surat Tanah Wilayah</center>
            </h3>
        </strong>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-green">
            <div class="panel-body">
                <i class="fa fa-bar-chart-o fa-5x"></i>
                <h3>{{$total}}</h3>
            </div>
            <div class="panel-footer back-footer-green">
                Total Data Surat Tanah Wilayah

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-blue">
            <div class="panel-body">
                <i class="fa fa-users fa-5x"></i>
                <h3>{{$total_user}} </h3>
            </div>
            <div class="panel-footer back-footer-blue">
                User

            </div>
        </div>
    </div>
</div>

<!-- /. ROW  -->



@endsection
