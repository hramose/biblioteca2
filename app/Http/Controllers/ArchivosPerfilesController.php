<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ArchivosPerfiles;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ArchivosPerfilesController extends Controller
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
        $archivos_perfiles = ArchivosPerfiles::paginate(15);

        return view('directory.archivos_perfiles.index', compact('archivos_perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Response
     */
    public function create()
    {
        return view('directory.archivos_perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return  Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['archivos_biblioteca_id','perfiles_biblioteca_id']);

        ArchivosPerfiles::create($request->all());

        \Flash::success('ArchivosPerfiles added!');

        return redirect('admin/archivos_perfiles');
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
        $archivos_perfile = ArchivosPerfiles::findOrFail($id);

        return view('directory.archivos_perfiles.show', compact('archivos_perfile'));
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
        $archivos_perfile = ArchivosPerfiles::findOrFail($id);

        return view('directory.archivos_perfiles.edit', compact('archivos_perfile'));
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
        $this->validate($request, ['archivos_biblioteca_id','perfiles_biblioteca_id']);

        $archivos_perfile = ArchivosPerfiles::findOrFail($id);
        $archivos_perfile->update($request->all());

        \Flash::success('ArchivosPerfiles updated!');

        return redirect('admin/archivos_perfiles');
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
        $archivos_perfile = ArchivosPerfiles::findOrFail($id);

        return view('directory.archivos_perfiles.predelete', compact('archivos_perfile'));
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
        ArchivosPerfiles::destroy($id);

        \Flash::success('ArchivosPerfiles deleted!');

        return redirect('admin/archivos_perfiles');
    }
}
