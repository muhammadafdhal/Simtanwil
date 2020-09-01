@extends('layouts.app')

@section('title-page')Tabel Data User

@endsection

@section('status-user')active-menu
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
                <a href="/pengguna/tambah" class="btn btn-icon btn-primary"><i class="fa fa-plus"></i>
                    Tambah Data</a>
                    <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nik</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $t)
                                
                            
                            <tr>
                                <td>{{$no++}}.</td>
                                <td>{{$t->name}}</td>
                                <td>{{$t->email}}</td>
                                <td>{{$t->nik}}</td>
                                <td>{{$t->level}}</td>
                                <td><form method="POST" action="/pengguna/delete/{{ $t->id }}">
                                    {{csrf_field()}} {{method_field('DELETE')}}

                                    <a href="/pengguna/edit/{{ $t->id }}" class="btn btn-primary" data-toggle="tooltip"
                                        data-placement="top" title="Kelola User"><i class="fa fa-edit"></i></a>

                                    <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                        class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="Hapus User"><i class="fa fa-trash-o"></i></button>
                                </form></td>
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
