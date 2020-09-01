<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\{kabkota, kecamatan, keldes};

class DaerahController extends Controller
{

  public function getkabupaten($id)
  {
    $kabupaten = kabkota::where('id_kabkota_provinsi', $id)->pluck('id_kabkota', 'kabkota');
    return json_encode($kabupaten);
  }

  public function getkecamatan($id)
  {
    $kecamatan = kecamatan::where('id_kabkota_kecamatan', $id)->pluck('id_kecamatan', 'kecamatan');
    return json_encode($kecamatan);
  }

  public function getkelurahan($id)
  {
    $kelurahan = Keldes::where('id_kecamatan_keldes', $id)->pluck('id_keldes', 'keldes');
    return json_encode($kelurahan);
  }
}
