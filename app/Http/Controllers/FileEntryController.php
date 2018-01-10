<?php

namespace App\Http\Controllers;

use App\Archivos;
use App\Fileentry;
use App\PerfilesBiblioteca;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Request;

class FileEntryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authEmp:ADMIN;EDITOR');

    }

    public function index()
    {
        $entries = Archivos::all();
        $permi = PerfilesBiblioteca::all();

        return view('fileentries.index', compact('entries','permi'));
    }

    public function add() {

        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;

        $entry->save();
        //////////////////////////////
        $a = new Archivos();
        $a->nuevo=1;
        $a->revicion='1.0';
        $a->fecha_revicion=Carbon::now()->format('Y-m-d');
        $a->mensaje="Nuevo archivo";
        $a->nombre=$file->getClientOriginalName();
        $a->filedate=Carbon::now();
        $a->file_deleteURL='http://borrame/';
        $a->email=Auth::user()->email;
        $a->log_forma=$file->getFilename().'.'.$extension;
        $a->filename = $file->getFilename().'.'.$extension;
        $a->filetype= $file->getClientOriginalExtension();
        $a->filename_url = Storage::url($file->getFilename().'.'.$extension);
        $a->filesize = Storage::size($file->getFilename().'.'.$extension);
        $a->filemtime = Storage::lastModified($file->getFilename().'.'.$extension);
        $a->save();

        return redirect('fileentry');

    }

    public function get($filename){

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

}
