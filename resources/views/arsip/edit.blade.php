@extends('layouts.app')

@section('title-page')Form Surat Tanah Wilayah

@endsection

@section('status-arsip') active-menu

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            @yield('title-page')
        </h1>
    </div>
</div>

<!--/.row-->
<div class="panel panel-default">
    <div class="panel-heading">Silahkan Isi Form Surat Tanah</div>
    <div class="panel-body">
        <div class="col-md-12">
            <form role="form" action="/arsip/edit/{{$ap->ap_id}}/save" method="POST" enctype="multipart/form-data">
                @csrf {{ method_field('patch')}}
                <div class="form-group">
                    <label>No Surat</label>
                    <input class="form-control" type="text" value="{{$ap->ap_no_surat}}" name="ap_no_surat"
                        placeholder="Masukan Nomor Surat." required>
                </div>
                <div class="form-group">
                    <label>Nama Pemohon</label>
                    <input class="form-control" type="text" value="{{$ap->ap_nama_pemohon}}" name="ap_nama_pemohon"
                        placeholder="Masukan Nama Pemohon." required>
                </div>
                <div class="form-group">
                    <label>Alamat Pemohon</label>
                    <input class="form-control" type="text" value="{{$ap->ap_alamat_pemohon}}" name="ap_alamat_pemohon"
                        placeholder="Masukan Alamat Pemohon." required>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik Tanah</label>
                    <input class="form-control" type="text" value="{{$ap->ap_nama_pemilik_tanah}}"
                        name="ap_nama_pemilik_tanah" placeholder="Masukan Nama Pemilik Tanah." required>
                </div>
                <div class="form-group">
                    <label>Alamat tanah</label>
                    <input class="form-control" type="text" value="{{$ap->ap_alamat_tanah}}" name="ap_alamat_tanah"
                        placeholder="Masukan Alamat Tanah." required>
                </div>
                <div class="form-group">
                    <label>Provinsi</label>
                    <select id="e1" class="form-control" name="id_provinsi" required>
                        <option class="pilih_provinsi">Pilih Provinsi</option>
                        @foreach ($prov as $key)
                        <option value="{{ $key->id_provinsi }}" <?php if ($key->id_provinsi == $ap->id_kabkota_provinsi) {
                            echo "selected";
                        } ?>>{{ $key->provinsi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select id="e2" class="form-control" value="{{$ap->kabkota}}" name="id_kabkota" required>
                        @foreach ($kabkota as $value)
                        <option value="{{ $value->id_kabkota }}" @if($ap->id_kabkota ==
                            $value->id_kabkota) selected @endif>{{ $value->kabkota }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select id="e3" class="form-control" value="{{$ap->kecamatan}}" name="id_kecamatan" required>
                        @foreach ($kec as $value)
                        <option value="{{ $value->id_kecamatan }}" @if($ap->id_kecamatan ==
                            $value->id_kecamatan) selected @endif>{{ $value->kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelurahan</label>
                    <select id="e3" class="form-control" value="{{$ap->keldes}}" name="id_keldes" required>
                        @foreach ($kel as $value)
                        <option value="{{ $value->id_keldes }}" @if($ap->id_keldes ==
                            $value->id_keldes) selected @endif>{{ $value->keldes }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Lampiran Bukti Tanah <small>(Silahkan Masukan Lampiran)</small></label>
                    <input type="file" name="ap_lampiran_bukti_tanah" required>
                </div>
                <div class="form-group">
                    <label>Lampiran Surat Pemohonan <small>(Silahkan Masukan Lampiran)</small></label>
                    <input type="file" name="ap_lampiran_surat_pemohonan" required>
                </div>
                <div class="form-group">
                    <label>Lampiran KTP Pemohon <small>(Silahkan Masukan Lampiran)</small></label>
                    <input type="file" name="ap_lampiran_ktp_pemohon" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/arsip" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
</div>

@endsection
