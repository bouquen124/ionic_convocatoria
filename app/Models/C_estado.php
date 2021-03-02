<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class C_estado
 * @package App\Models
 * @version February 5, 2021, 5:06 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class C_estado extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'c_estados';
    

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

    public function t_casos()
    {
        
        return $this->hasMany(T_casos::class,'c_estado_id','id');

    }
    
    
}
