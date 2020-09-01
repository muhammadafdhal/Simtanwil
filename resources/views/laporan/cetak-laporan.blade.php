<html>

<head>
    <title>Rekapitulasi Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h4>Rekapitulasi Laporan Surat Tanah Wilayah</h4>
    </center>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="order_table" width="100%" cellspacing="0">
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
                        @foreach ($date as $t)


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
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
