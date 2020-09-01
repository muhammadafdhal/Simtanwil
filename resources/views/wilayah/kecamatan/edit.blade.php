@extends('layouts.app')

@section('dropdown-wilayah') active
@endsection

@section('status-kecamatan') active
@endsection

@section('title-page') Kecamatan
@endsection

@section('content')

<section class="section">

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Data Kecamatan</h4>
                    </div>
                    <form action="/kecamatan/edit/{{$kec->id_kecamatan}}/save" method="POST">
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
                                            <option value="{{ $key->id_provinsi }}" @if($kec->id_provinsi ==
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
                                            <option value="{{ $value->id_kabkota }}" @if($kec->id_kabkota ==
                                                $value->id_kabkota) selected @endif>{{ $value->kabkota }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Masukan Nama Kecamatan</label>
                                <input type="text" name="kecamatan" value="{{$kec->kecamatan}}" required
                                    placeholder="Masukan Nama Kecamatan." class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Masukan Kode Kecamatan</label>
                                <input type="number" value="{{$kec->kode_kecamatan}}" name="kode_kecamatan" required
                                    placeholder="Masukan Kode Kecamatan." class="form-control">
                            </div>

                            <div class="button">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/kecamatan" class="btn btn-danger">Kembali</a>
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
