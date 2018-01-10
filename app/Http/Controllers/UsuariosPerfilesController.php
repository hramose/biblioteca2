<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UsuariosPerfiles;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UsuariosPerfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authEmp:ADMIN;EDITOR');

    }
    /**
     * Display a listing of the resource.
     *
     * @return  Response
     */
    public function index()
    {
        Session::forget('user_id');
        Session::forget('dir34df5');
        $usuario_perfiles = UsuariosPerfiles::paginate(15);

        return view('directory.usuario_perfiles.index', compact('usuario_perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Response
     */
    public function create()
    {
        $user_id=Session::has('user_id')?Session::get('user_id'):-1;
        $dir=Session::has('dir34df5')?Session::get('dir34df5'):'usuario_perfiles';
        return view('directory.usuario_perfiles.create', compact('user_id','dir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return  Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['user_id','perfiles_biblioteca_id']);

        UsuariosPerfiles::create($request->all());

        \Flash::success('UsuariosPerfiles added!');

        $dir=Session::has('dir34df5')?Session::get('dir34df5'):'admin/usuario_perfiles';
        Session::forget('user_id');
        Session::forget('dir34df5');
        return redirect($dir);
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     *
     * @return  Response
     */
    public function show($id)
    {
        $usuario_perfile = UsuariosPerfiles::findOrFail($id);

        return view('directory.usuario_perfiles.show', compact('usuario_perfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     *
     * @return  Response
     */
    public function edit($id)
    {
        $usuario_perfile = UsuariosPerfiles::findOrFail($id);

        return view('directory.usuario_perfiles.edit', compact('usuario_perfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    int  $id
     *
     * @return  Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['user_id','perfiles_biblioteca_id']);

        $usuario_perfile = UsuariosPerfiles::findOrFail($id);
        $usuario_perfile->update($request->all());

        \Flash::success('UsuariosPerfiles updated!');
        $dir=Session::has('dir34df5')?Session::get('dir34df5'):'admin/usuario_perfiles';
        Session::forget('user_id');
        Session::forget('dir34df5');
        return redirect($dir);
    }

    /**
     * Ask before we remove the specified resource from storage.
     *
     * @param    int  $id
     *
     * @return  Response
     */
    public function predelete($id)
    {        
        $usuario_perfile = UsuariosPerfiles::findOrFail($id);

        return view('directory.usuario_perfiles.predelete', compact('usuario_perfile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     *
     * @return  Response
     */
    public function destroy($id)
    {
        UsuariosPerfiles::destroy($id);

        \Flash::success('UsuariosPerfiles deleted!');
        $dir=Session::has('dir34df5')?Session::get('dir34df5'):'admin/usuario_perfiles';
        Session::forget('user_id');
        Session::forget('dir34df5');
        return redirect($dir);
    }
}
