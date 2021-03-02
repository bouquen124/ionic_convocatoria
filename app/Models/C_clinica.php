<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class C_clinica
 * @package App\Models
 * @version February 5, 2021, 5:08 pm UTC
 *
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 */
class C_clinica extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'c_clinicas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'correo' => 'required'
    ];

    public function c_profesionales()
    {
        return $this->hasMany(C_profesional::class,'c_clinica_id','id');
    }

    
}
