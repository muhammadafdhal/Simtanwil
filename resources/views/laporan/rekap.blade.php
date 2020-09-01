@extends('layouts.app')

@section('title-page')Tabel Data Laporan Arsip Tanah Wilayah

@endsection

@section('status-laporan')active-menu
@endsection

@section('content')

@if (session('sukses'))
<div class="alert bg-success" role="alert">
    {{ session('sukses') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            @yield('title-page')
        </h1>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Rekapitulasi Laporan
            </div>
            <div class="panel-body">
                <form method="post" action="/rekap-tanah/laporan">
                    @csrf
                    <div class="row">
    
                        <div class="range-dtp col-sm-11">
                            <label class="control-label"><small>Input Range Tanggal : </small></label>
                            <input type="text" id="range-tanggal" name="rekaplaporan" class="form-control"
                                placeholder="dd/mm/yyyy - dd/mm/yyyy" readonly>
                            <i class="glyphicon glyphicon-calendar fa fa-calendar" style="margin-right:10px"></i>
                        </div>
                        <div class="range-dtp col-sm-1" style="margin-top:23px;">
                            <button type="submit" class="btn btn-primary">Filter</button>
    
                        </div>
    
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nama Pemohon</th>
                                <th>Alamat Pemohon</th>
                                <th>Nama Pemilik Tanah</th>
                                <th>Alamat Tanah</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $no = 1;
                            @endphp
                            @foreach ($ap as $t)


                            <tr class="odd gradeX" align="center">
                                <td>{{$no++}}.</td>
                                <td>{{$t->ap_no_surat}}</td>
                                <td>{{ date('d M Y', strtotime($t->created_at)) }}</td>
                                <td>{{$t->ap_nama_pemohon}}</td>
                                <td>{{$t->ap_alamat_pemohon}}</td>
                                <td>{{$t->ap_nama_pemilik_tanah}}</td>
                                <td>{{$t->ap_alamat_tanah}}</td>
                                <td>{{$t->provinsi}}</td>
                                <td>{{$t->kabkota}}</td>
                                <td>{{$t->kecamatan}}</td>
                                {{-- @if (Auth::user()->level == "admin") --}}

                                {{-- @endif --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>

@endsection
