<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivos extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'archivos_biblioteca';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var  array
     */
    protected $fillable = ['nombre','filesize','filemtime','filedate','filetype','filename','filename_url','file_deleteURL','email','log_forma','nuevo','revicion','fecha_revicion','mensaje'];

    public function perfiles()
    {
        return $this->belongsToMany('App\PerfilesBiblioteca','archivos_perfiles_biblioteca','archivos_biblioteca_id', 'perfiles_biblioteca_id');
    }
    public function archivoperfileshm()
    {
        return $this->hasMany('App\ArchivosPerfiles', 'archivos_biblioteca_id', 'id');
    }


}
