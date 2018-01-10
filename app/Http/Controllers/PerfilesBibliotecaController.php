<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PerfilesBiblioteca;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PerfilesBibliotecaController extends Controller
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
        $perfiles_biblioteca = PerfilesBiblioteca::paginate(15);

        return view('directory.perfiles_biblioteca.index', compact('perfiles_biblioteca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Response
     */
    public function create()
    {
        return view('directory.perfiles_biblioteca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return  Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['perfil_nombre']);

        PerfilesBiblioteca::create($request->all());

        \Flash::success('PerfilesBiblioteca added!');

        return redirect('admin/perfiles_biblioteca');
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
        $perfiles_biblioteca = PerfilesBiblioteca::findOrFail($id);

        return view('directory.perfiles_biblioteca.show', compact('perfiles_biblioteca'));
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
        $perfiles_biblioteca = PerfilesBiblioteca::findOrFail($id);

        return view('directory.perfiles_biblioteca.edit', compact('perfiles_biblioteca'));
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
        $this->validate($request, ['perfil_nombre']);

        $perfiles_biblioteca = PerfilesBiblioteca::findOrFail($id);
        $perfiles_biblioteca->update($request->all());

        \Flash::success('PerfilesBiblioteca updated!');

        return redirect('admin/perfiles_biblioteca');
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
        $perfiles_biblioteca = PerfilesBiblioteca::findOrFail($id);

        return view('directory.perfiles_biblioteca.predelete', compact('perfiles_biblioteca'));
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
        PerfilesBiblioteca::destroy($id);

        \Flash::success('PerfilesBiblioteca deleted!');

        return redirect('admin/perfiles_biblioteca');
    }
}
