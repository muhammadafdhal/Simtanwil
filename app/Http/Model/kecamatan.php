<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    //
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = ['id_kabkota_kecamatan','kode_kecamatan','kecamatan'];

    public $timestamps = false;
}
