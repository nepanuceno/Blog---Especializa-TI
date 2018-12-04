<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artigo;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $migalhas = json_encode([
            ['titulo'=>'Home', 'url'=>""] 
        ]);

        $countUsuarios = User::count();
        $countAutores = User::where('autor','=','S')->count();
        $countArtigos = Artigo::count();
        return view('home',compact('migalhas','countUsuarios','countAutores','countArtigos'));
    }
}
