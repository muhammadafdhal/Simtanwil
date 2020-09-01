<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\{kabkota, provinsi};

class KabkotaController extends Controller
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
        $kabkota = kabkota::join('provinsi','id_provinsi','id_kabkota_provinsi')->get();
        return view('wilayah.kabkota.index', compact('kabkota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinsi = provinsi::all();
        return view('wilayah.kabkota.create', compact('provinsi'));
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
        $kabkota = new kabkota;
        $kabkota->id_kabkota_provinsi = $request['id_kabkota_provinsi'];
        $kabkota->kode_kabkota = $request['kode_kabkota'];
        $kabkota->kabkota = $request['kabkota'];
        $kabkota->save();
        return redirect('/kabkota');
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
    public function edit($id_kabkota)
    {
        //
        $kabkota = kabkota::find($id_kabkota);
        $provinsi = provinsi::all();
        return view('wilayah.kabkota.edit', compact('kabkota','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabkota)
    {
        //
        $kabkota = kabkota::find($id_kabkota);
        $kabkota->id_kabkota_provinsi = $request['id_kabkota_provinsi'];
        $kabkota->kode_kabkota = $request['kode_kabkota'];
        $kabkota->kabkota = $request['kabkota'];
        $kabkota->save();
        return redirect('/kabkota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabkota)
    {
        //
        $kabkota = kabkota::find($id_kabkota);
        $kabkota->delete();
        return redirect('/kabkota');
    }
}
