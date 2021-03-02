<?php

namespace App\Repositories;

use App\Models\C_clinica;
use App\Repositories\BaseRepository;

/**
 * Class C_clinicaRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:08 pm UTC
*/

class C_clinicaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'direccion',
        'telefono',
        'correo'
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
        return C_clinica::class;
    }
}
