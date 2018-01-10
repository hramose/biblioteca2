<?php

namespace App\Http\Controllers;

use App\ArchivosPerfiles;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Archivos;
use App\PerfilesBiblioteca;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;

class ArchivosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return  Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authEmp:ADMIN;EDITOR');

    }
    public function index()
    {
        $archivos = Archivos::paginate(15);

        return view('directory.archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Response
     */
    public function create()
    {
        return view('directory.archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return  Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre','filename']);

        Archivos::create($request->all());

        \Flash::success('Archivos added!');

        return redirect('admin/archivos');
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
        $archivo = Archivos::findOrFail($id);

        return view('directory.archivos.show', compact('archivo'));
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
        $archivo = Archivos::findOrFail($id);

        return view('directory.archivos.edit', compact('archivo'));
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
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'nuevo' => 'required|max:255',
            'revicion' => 'required|max:255',
            'fecha_revicion' => 'required|date',
            'mensaje' => 'max:255',
        ]);
        $this->validate($request, ['nombre','filename']);

        $archivo = Archivos::findOrFail($id);
        $archivo->update($request->all());

        \Flash::success('Archivos updated!');

        return redirect('fileentry');
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
        $archivo = Archivos::findOrFail($id);

        return view('directory.archivos.predelete', compact('archivo'));
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
        Archivos::destroy($id);

        \Flash::success('Archivos deleted!');

        return redirect('fileentry');
    }
    public function archivo_permisos(Request $request){

        $archivos_biblioteca_id = $request->input('archivos_biblioteca_id');

        $user = Archivos::find($archivos_biblioteca_id);

        foreach ($user->archivoperfileshm as $role) {
            $role->delete();
        }
        try{
            DB::beginTransaction();

            $equipos = Input::get('perfiles_biblioteca');
            if(is_array($equipos))
            {
                foreach ($equipos as $equipo){
                    $perfil=array();
                    $perfil['archivos_biblioteca_id']=$archivos_biblioteca_id;

                    $perfil['perfiles_biblioteca_id']=$equipo;

                    ArchivosPerfiles::create($perfil);
                }
                // do stuff with checked friends
                Session::flash('flash_message', 'RepoNovedades added!');
            }else{
                Session::flash('flash_message', 'Error RepoNovedades added!');

                DB::rollback();
                return "No se añadio nada";
            }

            DB::commit();
            return "Actualizado con exito";

        }catch (Exception $e){
            DB::rollback();
            return "Error: ".$e;
        }
    }
}
