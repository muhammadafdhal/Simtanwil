<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id('ap_id');
            $table->integer('ap_kec_id');
            $table->string('ap_no_surat');
            $table->date('ap_tgl_pengajuan');
            $table->string('ap_nama_pemohon');
            $table->string('ap_alamat_pemohon');
            $table->string('ap_nama_pemilik_tanah');
            $table->string('ap_alamat_tanah');
            $table->string('ap_lampiran_bukti_tanah');
            $table->string('ap_lampiran_surat_pemohonan');
            $table->string('ap_lampiran_ktp_pemohon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsips');
    }
}
