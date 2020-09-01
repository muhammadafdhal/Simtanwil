<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    //
    protected $table = 'provinsi';
    protected $primaryKey = 'id_provinsi';
    protected $fillable = ['kode_provinsi','provinsi'];

    public $timestamps = false;
}
