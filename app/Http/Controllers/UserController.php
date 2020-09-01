<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = user::where('users.id','!=', Auth::user()->id)->where('users.level','!=', 'Admin')->get();
        return view('pengguna.index', compact('user'));
    }

    public function create()
    {
        $user = user::all();
        return view('pengguna.create', compact('user'));
    }

    public function store(Request $request)
    {
        $user = new user;
        $user->level = $request['level'];
        $user->nik = $request['nik'];
        $user->name = $request['name'];
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];
        $user->save();

        return redirect('/pengguna')->with('sukses','Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('pengguna.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = user::find($id);
        $user->level = $request['level'];
        $user->nik = $request['nik'];
        $user->name = $request['name'];
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];
        $user->save();

        return redirect('/pengguna')->with('update','Data Barhasil Di Update');
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();

        return redirect('/pengguna')->with('delete','Data Berhasil Di Hapus');
    }
}
