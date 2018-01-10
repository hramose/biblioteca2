<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArchivosPerfiles extends Model
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
    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'archivos_perfiles_biblioteca';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var  array
     */
    protected $fillable = ['archivos_biblioteca_id','perfiles_biblioteca_id'];

    public function archivo()
    {
        return $this->belongsTo('App\Archivos','archivos_biblioteca_id');
    }

    public function perfil()
    {
        return $this->belongsTo('App\PerfilesBiblioteca','perfiles_biblioteca_id');
    }


    public function archivosxc()
    {
        return $this->hasOne('App\Archivos', 'id', 'archivos_biblioteca_id');
    }
    public function perfilesxc()
    {
        return $this->hasOne('App\PerfilesBiblioteca', 'id', 'perfiles_biblioteca_id');
    }


}
