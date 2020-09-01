<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\arsip;
use App\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ap = arsip::all();
        $total = count($ap);

        $user = user::all();
        $total_user = count($user);
        return view('home', compact('ap','total','total_user'));
    }
}
