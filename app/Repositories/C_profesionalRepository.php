<?php

namespace App\Repositories;

use App\Models\C_profesional;
use App\Repositories\BaseRepository;

/**
 * Class C_profesionalRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:19 pm UTC
*/

class C_profesionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'c_clinica_id',
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
        return C_profesional::class;
    }
}
