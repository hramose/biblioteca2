<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
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
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var  array
     */
    protected $fillable = ['name','email','password','tipo_usuario','Empresa'];

    public function perfiles()
    {
        return $this->belongsToMany('App\PerfilesBiblioteca','perfiles_usuario_biblioteca','user_id', 'perfiles_biblioteca_id');
    }

    public static function getENUM($tabla)
    {
        $type = DB::select( DB::raw("SHOW COLUMNS FROM users WHERE Field = '".$tabla."'") )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }

    public function perfileshm()
    {
        return $this->hasMany('App\UsuariosPerfiles', 'user_id', 'id');
    }

}
