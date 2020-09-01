<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\{Kecamatan, Kabkota, Provinsi, Keldes};

class KeldesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kel = Keldes::join('kecamatan','id_kecamatan','id_kecamatan_keldes')->join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->get();
        return view('wilayah.keldes.index', compact('kel'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinsi   = Provinsi::all();
        $kabkota    = Kabkota::all();
        $kec        = Kecamatan::all();
        return view('wilayah.keldes.create', compact('kec','kabkota','provinsi'));
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
        $kel = new Keldes;
        $kel->id_kecamatan_keldes = $request['id_kecamatan'];
        $kel->kode_keldes = $request['kode_keldes'];
        $kel->keldes = $request['keldes'];
        $kel->save();
        return redirect('/keldes');
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
    public function edit($id_keldes)
    {
        //
        $kel        = Keldes::join('kecamatan','id_kecamatan','id_kecamatan_keldes')->join('kabkota','id_kabkota','id_kabkota_kecamatan')->join('provinsi','id_provinsi','id_kabkota_provinsi')->find($id_keldes);
        $kec        = Kecamatan::all();
        $kabkota    = Kabkota::all();
        $provinsi   = Provinsi::all();
        return view('wilayah.keldes.edit', compact('kel','kec','kabkota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_keldes)
    {
        //
        $kel = Keldes::find($id_keldes);
        $kel->id_kecamatan_keldes = $request['id_kecamatan'];
        $kel->kode_keldes = $request['kode_keldes'];
        $kel->keldes = $request['keldes'];
        $kel->save();
        return redirect('/keldes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_keldes)
    {
        //
        $kel = Keldes::find($id_keldes);
        $kel->delete();
        return redirect('/keldes');
    }
}
