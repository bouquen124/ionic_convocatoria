<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class C_boletin
 * @package App\Models
 * @version February 5, 2021, 5:31 pm UTC
 *
 * @property integer $c_profesional_id
 * @property string $titulo
 * @property string $subtitulo
 * @property string $contenido
 * @property string $autor
 */
class C_boletin extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'c_boletins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'c_profesional_id',
        'titulo',
        'subtitulo',
        'contenido',
        'autor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'c_profesional_id' => 'integer',
        'titulo' => 'string',
        'subtitulo' => 'string',
        'contenido' => 'string',
        'autor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'c_profesional_id' => 'required',
        'titulo' => 'required',
        'subtitulo' => 'required',
        'contenido' => 'required',
        'autor' => 'required'
    ];


    public function profesional()
    {
        return $this->hasOne(C_profesional::class, 'id', 'c_profesional_id');
    }
    
}
