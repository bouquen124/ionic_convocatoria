<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class C_estudiante
 * @package App\Models
 * @version February 5, 2021, 5:23 pm UTC
 *
 * @property integer $c_clinica_id
 * @property integer $c_profesional_id
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 * @property string $localidad
 */
class C_estudiante extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'c_estudiantes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'c_clinica_id',
        'c_profesional_id',
        'nombre',
        'telefono',
        'correo',
        'localidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'c_clinica_id' => 'integer',
        'c_profesional_id' => 'integer',
        'nombre' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'localidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'c_clinica_id' => 'required',
        'c_profesional_id' => 'required',
        'nombre' => 'required',
        'telefono' => 'required',
        'correo' => 'required',
        'localidad' => 'required'
    ];

    public function profesional()
    {
        return $this->hasOne(C_profesional::class, 'id', 'c_profesional_id');
    }

    public function clinica()
    {
        return $this->hasOne(C_clinica::class, 'id', 'c_clinica_id');
    }
    
}
