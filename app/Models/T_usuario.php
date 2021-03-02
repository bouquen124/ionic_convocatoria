<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class T_usuario
 * @package App\Models
 * @version February 5, 2021, 5:13 pm UTC
 *
 * @property integer $c_tipo_id
 * @property string $nombre
 * @property integer $edad
 * @property string $localidad
 */
class T_usuario extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 't_usuarios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'c_tipo_id',
        'nombre',
        'edad',
        'localidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'c_tipo_id' => 'integer',
        'nombre' => 'string',
        'edad' => 'integer',
        'localidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'c_tipo_id' => 'required',
        'nombre' => 'required',
        'edad' => 'required',
        'localidad' => 'required'
    ];


    public function c_tipo(){
        
        return $this->hasOne(C_tipo::class,'id','c_tipo_id');
        
    }


    public function t_casos()
    {
        
        return $this->hasMany(T_casos::class,'c_usuario_id','id');

    }

}
