<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class kabkota extends Model
{
    //
    protected $table = 'kabkota';
    protected $primaryKey = 'id_kabkota';
    protected $fillable = ['id_kabkota_provinsi','kode_kabkota','kabkota'];

    public $timestamps = false;
}
