<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class keldes extends Model
{
    //
    protected $table = 'keldes';
    protected $primaryKey = 'id_keldes';
    protected $fillable = ['id_kecamatan_keldes','kode_keldes','keldes'];

    public $timestamps = false;
}
