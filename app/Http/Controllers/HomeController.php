<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
       // $this->middleware('authEmp:ADMIN;EDITOR;USUARIO');

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $usuario = Usuario::findOrFail(Auth::user()->id);
        /*foreach ($usuario->perfileshm as $p){
            echo($p->perfilxc->perfil_nombre."<br>");
            foreach ($p->perfilxc->perfilarchivosshm as $a){
                echo($a->archivosxc->nombre."<br>");
                //echo("<pre>".print_r()."</pre>");
            }
        }*/

        return view('adminlte::home', compact('usuario'));

    }
}