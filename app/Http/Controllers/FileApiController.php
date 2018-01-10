<?php

namespace App\Http\Controllers;

use App\Archivos;
use Illuminate\Http\Request;

class FileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('authEmp:USUARIO;ADMIN;EDITOR');

    }
    public function index()
    {
        return Archivos::all();
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
        $input = \Input::json();
        $accommodation = new Archivos();
        $accommodation->name = $input->get('name');
        $accommodation->description = $input->get('description');
        $accommodation->location_id = $input->get('location_id');
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
        return Archivos::findOrFail($id);
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
        $input = \Input::json();
        $accommodation = Archivos::findOrFail($id);
        $accommodation->name = $input->get('name');
        $accommodation->description = $input->get('description');
        $accommodation->location_id = $input->get('location_id');
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
        $accommodation = Archivos::find($id);
        $accommodation->delete();
        return response('Deleted.', 200);
    }

    public function search(Request $request, Archivos $accommodation)
    {
        return $accommodation
            ->where('name',
                'like',
                '%'.$request->get('name').'%')
            ->get();
    }
}
