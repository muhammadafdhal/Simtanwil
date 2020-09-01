<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class arsip extends Model
{
    //
    protected $table = 'arsips';
    protected $primaryKey = 'ap_id';
    protected $fillable = ['ap_kec_id','ap_no_surat','ap_nama_pemohon','ap_alamat_pemohon','ap_nama_pemilik_tanah','ap_alamat_tanah','ap_lampiran_bukti_tanah','ap_lampiran_surat_pemohonan','ap_lampiran_ktp_pemohon'];
}
