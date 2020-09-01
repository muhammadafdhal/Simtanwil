@extends('layouts.app')

@section('title-page')Tabel Data Surat Tanah Wilayah

@endsection

@section('status-arsip')active-menu
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
                Data Tabel
            </div>
            <div class="panel-body">
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
                                <th>Aksi</th>
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
                                {{-- @if (Auth::user()->level == "admin") --}}

                                <td class="datatable-ct" align="center">

                                    <form method="POST" action="/arsip/delete/{{ $t->ap_id }}">
                                        {{csrf_field()}} {{method_field('DELETE')}}

                                        <a href="/arsip/detail/{{ $t->ap_id }}" class="btn btn-info">Detail</a>
                                        
                                        <a href="/arsip/edit/{{ $t->ap_id }}" class="btn btn-primary"
                                            data-toggle="tooltip" data-placement="top" title="Kelola User"><i
                                                class="fa fa-edit"></i></a>

                                        <button type="submit"
                                            onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                            class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="Hapus User"><i class="fa fa-trash-o"></i></button>


                                    </form>
                                </td>

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
