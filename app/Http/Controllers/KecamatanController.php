<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\{kecamatan, kabkota, provinsi};

class KecamatanController extends Controller
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
        $kec = kecamatan::join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->get();
        return view('wilayah.kecamatan.index', compact('kec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kabkota = Kabkota::all();
        $provinsi = Provinsi::all();
        return view('wilayah.kecamatan.create', ['kabkota' => $kabkota, 'provinsi' => $provinsi]);
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
        $kec = new Kecamatan;
        $kec->id_kabkota_kecamatan = $request['id_kabkota'];
        $kec->kode_kecamatan = $request['kode_kecamatan'];
        $kec->kecamatan = $request['kecamatan'];
        $kec->save();
        return redirect('/kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kecamatan)
    {
        //
        $kec = Kecamatan::join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->find($id_kecamatan);
        $provinsi = Provinsi::all();
        $kabkota = Kabkota::all();
        return view('wilayah.kecamatan.edit', compact('kabkota','kec','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kecamatan)
    {
        //
        $kec = Kecamatan::find($id_kecamatan);
        $kec->id_kabkota_kecamatan = $request['id_kabkota'];
        $kec->kode_kecamatan = $request['kode_kecamatan'];
        $kec->kecamatan = $request['kecamatan'];
        $kec->save();
        return redirect('/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kecamatan)
    {
        //
        $kec = Kecamatan::find($id_kecamatan);
        $kec->delete();
        return redirect('/kecamatan');
    }
}
