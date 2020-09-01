<?php

namespace App\Http\Controllers;

use App\Http\Model\{arsip, provinsi, kabkota, kecamatan, keldes};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $ap = arsip::join('keldes','id_keldes','ap_kec_id')->join('kecamatan','id_kecamatan','id_kecamatan_keldes')->join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->get();

        

        return view('arsip.index', compact('ap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prov = provinsi::all();
        return view('arsip.create', compact('prov'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ap = new arsip;
        $ap->ap_kec_id = $request['id_keldes'];
        $ap->ap_no_surat = $request['ap_no_surat'];
        $ap->ap_nama_pemohon = $request['ap_nama_pemohon'];
        $ap->ap_alamat_pemohon = $request['ap_alamat_pemohon'];
        $ap->ap_nama_pemilik_tanah = $request['ap_nama_pemilik_tanah'];
        $ap->ap_alamat_tanah = $request['ap_alamat_tanah'];

        $berkas1 = $request->file('ap_lampiran_bukti_tanah');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('ap_lampiran_bukti_tanah')->move('gambar/lampiranBuktiTanah/', $namaFile1);
        $ap->ap_lampiran_bukti_tanah=$namaFile1;

        $berkas2 = $request->file('ap_lampiran_surat_pemohonan');
        $namaFile2 = $berkas2->getClientOriginalName();
        $request->file('ap_lampiran_surat_pemohonan')->move('gambar/lampiranSuratPemohonan/', $namaFile2);
        $ap->ap_lampiran_surat_pemohonan=$namaFile2;
        
        $berkas3 = $request->file('ap_lampiran_ktp_pemohon');
        $namaFile3 = $berkas3->getClientOriginalName();
        $request->file('ap_lampiran_ktp_pemohon')->move('gambar/lampiranKtpPemohon/', $namaFile3);
        $ap->ap_lampiran_ktp_pemohon=$namaFile3;

        $ap->save();
        return redirect('/arsip')->with('sukses','Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show($ap_id)
    {
        //
        $ap = arsip::join('keldes','id_keldes','ap_kec_id')->join('kecamatan','id_kecamatan','id_kecamatan_keldes')->join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->find($ap_id);
        return view('arsip.modal', compact('ap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit($ap_id)
    {
        //
        $ap  = arsip::join('keldes','id_keldes','ap_kec_id')->join('kecamatan','id_kecamatan','id_kecamatan_keldes')->join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->find($ap_id);
        $prov = provinsi::all();
        $kabkota = kabkota::all();
        $kec = kecamatan::all();
        $kel = keldes::all();

        return view('arsip.edit', compact('ap','prov','kabkota','kec','kel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ap_id)
    {
        //
        $ap = arsip::findOrFail($ap_id);
        $ap->ap_kec_id = $request['id_keldes'];
        $ap->ap_no_surat = $request['ap_no_surat'];
        $ap->ap_nama_pemohon = $request['ap_nama_pemohon'];
        $ap->ap_alamat_pemohon = $request['ap_alamat_pemohon'];
        $ap->ap_nama_pemilik_tanah = $request['ap_nama_pemilik_tanah'];
        $ap->ap_alamat_tanah = $request['ap_alamat_tanah'];

        $hps = $ap->ap_lampiran_bukti_tanah;
        File::delete('gambar/lampiranBuktiTanah/'. $hps);
        $berkas1 = $request->file('ap_lampiran_bukti_tanah');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('ap_lampiran_bukti_tanah')->move('gambar/lampiranBuktiTanah/', $namaFile1);
        $ap->ap_lampiran_bukti_tanah=$namaFile1;

        $hps2 = $ap->ap_lampiran_surat_pemohonan;
        File::delete('gambar/lampiranSuratPemohonan/'. $hps2);
        $berkas2 = $request->file('ap_lampiran_surat_pemohonan');
        $namaFile2 = $berkas2->getClientOriginalName();
        $request->file('ap_lampiran_surat_pemohonan')->move('gambar/lampiranSuratPemohonan/', $namaFile2);
        $ap->ap_lampiran_surat_pemohonan=$namaFile2;
        
        $hps3 = $ap->ap_lampiran_ktp_pemohon;
        File::delete('gambar/lampiranKtpPemohon/'. $hps3);
        $berkas3 = $request->file('ap_lampiran_ktp_pemohon');
        $namaFile3 = $berkas3->getClientOriginalName();
        $request->file('ap_lampiran_ktp_pemohon')->move('gambar/lampiranKtpPemohon/', $namaFile3);
        $ap->ap_lampiran_ktp_pemohon=$namaFile3;

        $ap->save();
        return redirect('/arsip')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy( $ap_id)
    {
        //
        $ap = arsip::findOrFail($ap_id);
        $ap->delete();
        return redirect('/arsip');
    }
}
