<?php

namespace App\Repositories;

use App\Models\C_boletin;
use App\Repositories\BaseRepository;

/**
 * Class C_boletinRepository
 * @package App\Repositories
 * @version February 5, 2021, 5:31 pm UTC
*/

class C_boletinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'c_profesional_id',
        'titulo',
        'subtitulo',
        'contenido',
        'autor'
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
        return C_boletin::class;
    }
}
