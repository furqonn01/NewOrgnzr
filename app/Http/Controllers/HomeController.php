<?php

namespace App\Http\Controllers;

use App\Models\Sertif;
use App\Models\User;
use Illuminate\Http\Request;

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
        $jml_user = User::whereLevel('user')->count();
        $jml_sertif = Sertif::whereKodeUser(auth()->user()->id)->count();
        return view('home', compact('jml_user', 'jml_sertif'));
    }
}
