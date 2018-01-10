<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use App\UsuariosPerfiles;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authEmp:ADMIN;EDITOR;USUARIO');

    }
    /**
     * Display a listing of the resource.
     *
     * @return  Response
     */
    public function index()
    {
        if(Auth::getUser()->tipo_usuario=="USUARIO"){return redirect('home');}
        $usuario = Usuario::paginate(15);
        return view('directory.usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Response
     */
    public function create()
    {
        if(Auth::getUser()->tipo_usuario=="USUARIO"){return redirect('home');}
        return view('directory.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return  Response
     */
    public function store(Request $request)
    {
        if(Auth::getUser()->tipo_usuario=="USUARIO"){return redirect('home');}
        $this->validate($request, ['name','email','password','tipo_usuario','Empresa']);
        $custorm=$request->all();
        $custorm['password']=bcrypt(Input::get('password'));
        Usuario::create($custorm);

        \Flash::success('Usuario added!');

        return redirect('admin/usuario');
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
        if(Auth::getUser()->tipo_usuario=="USUARIO"){return redirect('home');}
        $usuario = Usuario::findOrFail($id);
        $usuario_perfiles = UsuariosPerfiles::FindUsuario($usuario->id)->get();
       // dd($usuario_perfiles);
        return view('directory.usuario.show', compact('usuario','usuario_perfiles'));
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

        $usuario = Usuario::findOrFail($id);

        return view('directory.usuario.edit', compact('usuario'));
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
        $this->validate($request, ['name','email','password','tipo_usuario','Empresa']);

        $custorm=$request->all();
        $custorm['password']=bcrypt(Input::get('password'));

        $usuario = Usuario::findOrFail($id);
        $usuario->update($custorm);

        \Flash::success('Usuario updated!');

        return redirect('admin/usuario');
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
        if(Auth::getUser()->tipo_usuario=="USUARIO"){return redirect('home');}
        $usuario = Usuario::findOrFail($id);

        return view('directory.usuario.predelete', compact('usuario'));
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
        if(Auth::getUser()->tipo_usuario=="USUARIO"){return redirect('home');}
        Usuario::destroy($id);

        \Flash::success('Usuario deleted!');

        return redirect('admin/usuario');
    }
}
