@extends('layouts.app')

@section('dropdown-wilayah') active
@endsection

@section('status-provinsi') active
@endsection

@section('title-page') Provinsi
@endsection

@section('content')

<section class="section">

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Data Provinsi</h4>
                    </div>
                    <form action="/provinsi/tambah/save" id="form2" method="POST">
                        @csrf
                        <div class="card-body">
                            

                            <div class="form-group">
                                <label>Masukan Nama provinsi</label>
                                <input type="text" name="provinsi" required placeholder="Masukan Nama Provinsi."
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Masukan Kode Provinsi</label>
                                <input type="number" name="kode_provinsi" required placeholder="Masukan Kode Provinsi."
                                    class="form-control">
                            </div>
                            
                            <div class="button">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/provinsi" class="btn btn-danger">Kembali</a>
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
