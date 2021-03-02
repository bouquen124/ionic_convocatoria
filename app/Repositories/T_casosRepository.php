<?php

namespace App\Repositories;

use App\Models\T_casos;
use App\Repositories\BaseRepository;

/**
 * Class T_casosRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:28 pm UTC
*/

class T_casosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'fecha',
        'c_profesional_id',
        't_usuario_id',
        'c_estado_id'
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
        return T_casos::class;
    }
}
