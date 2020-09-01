@extends('layouts.app')

@section('title-page')Form Surat Tanah Wilayah

@endsection

@section('status-arsip') active-menu

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Detail Surat Tanah Wilayah
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a href="/arsip" class="btn btn-danger"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No Surat :</th>
                                <td>{{ $ap->ap_no_surat }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan :</th>
                                <td>{{ $ap->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pemohon :</th>
                                <td>{{ $ap->ap_nama_pemohon }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Pemohon :</th>
                                <td>{{ $ap->ap_alamat_pemohon }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik Tanah :</th>
                                <td>{{ $ap->ap_nama_pemilik_tanah }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Tanah :</th>
                                <td>{{ $ap->ap_alamat_tanah }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi :</th>
                                <td>{{ $ap->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten :</th>
                                <td>{{ $ap->kabkota }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan :</th>
                                <td>{{ $ap->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Kelurahan :</th>
                                <td>{{ $ap->keldes }}</td>
                            </tr>
                            <tr align="center">
                                <th>Lampiran Surat Bukti Tanah :</th>
                                <td><img src="/gambar/lampiranBuktiTanah/{{$ap->ap_lampiran_bukti_tanah }}"
                                    class="img-responsive" alt="Surat Bukti Tanah" width="307" height="240"></td>
                            </tr>
                            <tr align="center">
                                <th>Lampiran Surat Bukti Tanah :</th>
                                <td><img src="/gambar/lampiranSuratPemohonan/{{$ap->ap_lampiran_surat_pemohonan }}"
                                    class="img-responsive" alt="Surat Pemohon" width="307" height="240"></td>
                            </tr>
                            <tr align="center">
                                <th>Lampiran Surat Bukti Tanah :</th>
                                <td><img src="/gambar/lampiranKtpPemohon/{{$ap->ap_lampiran_ktp_pemohon }}"
                                    class="img-responsive" alt="KTP Pemohon" width="307" height="240"></td>
                            </tr>
                    </table>
                    
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
@endsection
