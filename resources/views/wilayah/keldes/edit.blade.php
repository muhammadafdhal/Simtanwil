@extends('layouts.app')

@section('dropdown-wilayah') active
@endsection

@section('status-kecamatan') active
@endsection

@section('title-page') Kelurahan
@endsection

@section('content')

<section class="section">

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Data Kelurahan</h4>
                    </div>
                    <form action="/keldes/edit/{{$kel->id_keldes}}/save" method="POST">
                        @csrf {{ method_field('patch')}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control form-control-sm select2" name="id_provinsi"
                                            required>
                                            <option class="pilih_provinsi">Pilih Provinsi</option>
                                            @foreach ($provinsi as $key)
                                            <option value="{{ $key->id_provinsi }}" @if($kel->id_provinsi ==
                                                $key->id_provinsi) selected @endif>{{ $key->provinsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label id="labelkab">Kabupaten</label>
                                        <select class="form-control form-control-sm select2" name="id_kabkota" required>
                                            {{-- <option class="pilih">Pilih kabupaten</option> --}}
                                            @foreach ($kabkota as $value)
                                            <option value="{{ $value->id_kabkota }}" @if($kel->id_kabkota ==
                                                $value->id_kabkota) selected @endif>{{ $value->kabkota }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label id="labelkab">Kecamatan</label>
                                        <select class="form-control form-control-sm select2" name="id_kecamatan" required>
                                            {{-- <option class="pilih">Pilih kabupaten</option> --}}
                                            @foreach ($kec as $value)
                                            <option value="{{ $value->id_kecamatan }}" @if($kel->id_kecamatan ==
                                                $value->id_kecamatan) selected @endif>{{ $value->kecamatan }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Masukan Nama Kelurahan/Desa</label>
                                <input type="text" name="keldes" value="{{$kel->keldes}}" required
                                    placeholder="Masukan Nama Kelurahan/Desa." class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Masukan Kode Kelurahan/Desa</label>
                                <input type="number" value="{{$kel->kode_keldes}}" name="kode_keldes" required
                                    placeholder="Masukan Kode Kelurahan/Desa." class="form-control">
                            </div>

                            <div class="button">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/keldes" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@endsection
