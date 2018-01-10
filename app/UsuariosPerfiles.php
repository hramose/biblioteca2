<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuariosPerfiles extends Model
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
    protected $table = 'perfiles_usuario_biblioteca';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var  array
     */
    protected $fillable = ['user_id','perfiles_biblioteca_id'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario','user_id');
    }

    public function perfil()
    {
        return $this->belongsTo('App\PerfilesBiblioteca','perfiles_biblioteca_id');
    }
    public function perfilxc()
    {
        return $this->hasOne('App\PerfilesBiblioteca', 'id', 'perfiles_biblioteca_id');
    }

    public function scopeFindUsuario($query, $id)
    {
        return $query->where('user_id','=',$id);
    }

}
