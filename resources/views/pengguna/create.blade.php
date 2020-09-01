@extends('layouts.app')

@section('title-page')Form User

@endsection

@section('status-user') active-menu

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
    <div class="panel-heading">Silahkan Isi Form User</div>
    <div class="panel-body">
        <div class="col-md-12">
            <form role="form" action="/pengguna/tambah/save" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        placeholder="Masukan Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password <small>(Default)</small></label>
                    <input type="text" name="password" value="12345678" readonly
                        placeholder="Masukan Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" id="level" required name="level" onchange="tampilkan()">
                        <option value="">=== Silahkan Pilih Level ===</option>
                        <option value="Pimpinan">Pimpinan</option>
                        <option value="Pegawai">Pegawai</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" required placeholder="Masukan NIK"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required placeholder="Masukan Email"
                        class="form-control">
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/pengguna" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
</div>

@endsection
