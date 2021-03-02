<?php

namespace App\Repositories;

use App\Models\C_tipo;
use App\Repositories\BaseRepository;

/**
 * Class C_tipoRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:05 pm UTC
*/

class C_tipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
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
        return C_tipo::class;
    }
}
