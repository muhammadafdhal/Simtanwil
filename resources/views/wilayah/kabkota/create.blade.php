@extends('layouts.app')

@section('dropdown-wilayah') active
@endsection

@section('status-kabkota') active
@endsection

@section('title-page') Kabupaten/Kota
@endsection

@section('content')

<section class="section">

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Data Kabupaten/Kota</h4>
                    </div>
                    <form action="/kabkota/tambah/save" id="form2" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Provinsi</label>
                                <select class="form-control form-control-sm select2" required name="id_kabkota_provinsi">
                                    <option value="">=== Silahkan Pilih Provinsi ===</option>
                                    @foreach ($provinsi as $t)
                                <option value="{{$t->id_provinsi}}">{{$t->provinsi}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Masukan Nama Kabupaten</label>
                                <input type="text" name="kabkota" required placeholder="Masukan Nama Kabupaten."
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Masukan Kode Kabupaten</label>
                                <input type="number" name="kode_kabkota" required placeholder="Masukan Kode Kabupaten."
                                    class="form-control">
                            </div>

                            <div class="button">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/kabkota" class="btn btn-danger">Kembali</a>
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
