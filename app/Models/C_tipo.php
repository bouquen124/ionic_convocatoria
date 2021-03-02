<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class C_tipo
 * @package App\Models
 * @version February 5, 2021, 5:05 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class C_tipo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'c_tipos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];


    public function t_usuario()
    {
        
        return $this->hasMany(T_usuario::class,'c_tipo_id','id');

    }
    
    
}
