<?php

namespace App\Repositories;

use App\Models\T_usuario;
use App\Repositories\BaseRepository;

/**
 * Class T_usuarioRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:13 pm UTC
*/

class T_usuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'c_tipo_id',
        'nombre',
        'edad',
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
        return T_usuario::class;
    }
}
