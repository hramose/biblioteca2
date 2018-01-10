<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerfilesBiblioteca extends Model
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
    protected $table = 'perfiles_biblioteca';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var  array
     */
    protected $fillable = ['perfil_nombre'];

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario','perfiles_usuario_biblioteca', 'perfiles_biblioteca_id' ,'user_id');
    }

    public function archivos()
    {
        return $this->belongsToMany('App\Archivos','archivos_perfiles_biblioteca', 'perfiles_biblioteca_id' ,'archivos_biblioteca_id');
    }
    public function perfilarchivosshm()
    {
        return $this->hasMany('App\ArchivosPerfiles', 'perfiles_biblioteca_id', 'id');
    }


}
