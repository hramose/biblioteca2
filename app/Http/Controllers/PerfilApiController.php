<?php

namespace App\Http\Controllers;

use App\Archivos;
use App\PerfilesBiblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PerfilApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('authEmp:ADMIN;EDITOR');

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return PerfilesBiblioteca::all();
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
        $accommodation = new PerfilesBiblioteca();
        $accommodation->perfil_nombre = $input->get('perfil_nombre');
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
        return PerfilesBiblioteca::findOrFail($id);
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
        $accommodation = PerfilesBiblioteca::findOrFail($id);
        $accommodation->perfil_nombre = $input->get('perfil_nombre');
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
        $accommodation = PerfilesBiblioteca::find($id);
        $accommodation->delete();
        return response('Deleted.', 200);
    }

    public function search(Request $request, PerfilesBiblioteca $accommodation)
    {
        return $accommodation
            ->where('perfil_nombre',
                'like',
                '%'.$request->get('perfil_nombre').'%')
            ->get();
    }
}
