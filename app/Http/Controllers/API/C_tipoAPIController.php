<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateC_tipoAPIRequest;
use App\Http\Requests\API\UpdateC_tipoAPIRequest;
use App\Models\C_tipo;
use App\Repositories\C_tipoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class C_tipoController
 * @package App\Http\Controllers\API
 */

class C_tipoAPIController extends AppBaseController
{
    /** @var  C_tipoRepository */
    private $cTipoRepository;

    public function __construct(C_tipoRepository $cTipoRepo)
    {
        $this->cTipoRepository = $cTipoRepo;
    }

    /**
     * Display a listing of the C_tipo.
     * GET|HEAD /cTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cTipos = $this->cTipoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cTipos->toArray(), 'C Tipos retrieved successfully');
    }

    /**
     * Store a newly created C_tipo in storage.
     * POST /cTipos
     *
     * @param CreateC_tipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateC_tipoAPIRequest $request)
    {
        $input = $request->all();

        $cTipo = $this->cTipoRepository->create($input);

        return $this->sendResponse($cTipo->toArray(), 'C Tipo saved successfully');
    }

    /**
     * Display the specified C_tipo.
     * GET|HEAD /cTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var C_tipo $cTipo */
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            return $this->sendError('C Tipo not found');
        }

        return $this->sendResponse($cTipo->toArray(), 'C Tipo retrieved successfully');
    }

    /**
     * Update the specified C_tipo in storage.
     * PUT/PATCH /cTipos/{id}
     *
     * @param int $id
     * @param UpdateC_tipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_tipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var C_tipo $cTipo */
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            return $this->sendError('C Tipo not found');
        }

        $cTipo = $this->cTipoRepository->update($input, $id);

        return $this->sendResponse($cTipo->toArray(), 'C_tipo updated successfully');
    }

    /**
     * Remove the specified C_tipo from storage.
     * DELETE /cTipos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var C_tipo $cTipo */
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            return $this->sendError('C Tipo not found');
        }

        $cTipo->delete();

        return $this->sendSuccess('C Tipo deleted successfully');
    }
}
