<?php

namespace App\Http\Controllers;

use App\Archivos;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileuploadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authEmp:ADMIN;EDITOR');

    }
    // create function for our upload page
    public function index(){
        return view('directory.uploadfile');
    }
    // create new function for show uploaded page
    /*
     * Home page of email sending
     */
    public function imageUploadPost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|max:2048',
        ]);
        $a = new Archivos();
        $a->nuevo=1;
        $a->revicion='1.0';
        $a->fecha_revicion='hoy';
        $a->mensaje="Nuevo archivo ";
        $a->nombre=$request->image->getClientOriginalName();
        $a->filedate='hoy';
        $a->file_deleteURL='borrame';
        $a->email=Auth::user()->email;
        $a->log_forma=$request->image->getClientOriginalName();
        $a->filename = $imageName = mt_rand(999,999999)."_".time()."_".$request->image->getClientOriginalExtension();
        Storage::disk('local')->put($imageName, 'Contents');
        $a->filetype= $request->image->guessClientExtension();
        $a->filename_url = Storage::url($imageName);
        $a->filesize = Storage::size($imageName);
        $a->filemtime = Storage::lastModified($imageName);
        $a->save();

        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path', asset('storage/'.$imageName));
    }

}