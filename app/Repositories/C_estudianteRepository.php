<?php

namespace App\Repositories;

use App\Models\C_estudiante;
use App\Repositories\BaseRepository;

/**
 * Class C_estudianteRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:23 pm UTC
*/

class C_estudianteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'c_clinica_id',
        'c_profesional_id',
        'nombre',
        'telefono',
        'correo',
        'localidad'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return C_estudiante::class;
    }
}
