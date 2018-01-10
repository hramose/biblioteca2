<?php

namespace App\Http\Controllers;


use App\ArchivosPerfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArchivosPerfilesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authEmp:ADMIN;EDITOR');

    }
    public function index()
    {
        return ArchivosPerfiles::all();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
        $input = Input::json();
        $accommodation = new ArchivosPerfiles();
        $accommodation->archivos_biblioteca_id = $input->get('archivos_biblioteca_id');
        $accommodation->perfiles_biblioteca_id = $input->get('perfiles_biblioteca_id');
        $accommodation->save();
        return response($accommodation, 201)
            ;
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return ArchivosPerfiles::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::json();
        $accommodation = ArchivosPerfiles::findOrFail($id);
        $accommodation->archivos_biblioteca_id = $input->get('archivos_biblioteca_id');
        $accommodation->perfiles_biblioteca_id = $input->get('perfiles_biblioteca_id');

        $accommodation->save();
        return response($accommodation, 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $accommodation = ArchivosPerfiles::find($id);
        $accommodation->delete();
        return response('Deleted.', 200);
    }

    public function search(Request $request, ArchivosPerfiles $accommodation)
    {
        return $accommodation
            ->where('archivos_biblioteca_id',
                'like',
                '%'.$request->get('perfil_nombre').'%')
            ->get();
    }
}
