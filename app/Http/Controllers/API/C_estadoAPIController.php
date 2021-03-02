<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateC_estadoAPIRequest;
use App\Http\Requests\API\UpdateC_estadoAPIRequest;
use App\Models\C_estado;
use App\Repositories\C_estadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class C_estadoController
 * @package App\Http\Controllers\API
 */

class C_estadoAPIController extends AppBaseController
{
    /** @var  C_estadoRepository */
    private $cEstadoRepository;

    public function __construct(C_estadoRepository $cEstadoRepo)
    {
        $this->cEstadoRepository = $cEstadoRepo;
    }

    /**
     * Display a listing of the C_estado.
     * GET|HEAD /cEstados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cEstados = $this->cEstadoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cEstados->toArray(), 'C Estados retrieved successfully');
    }

    /**
     * Store a newly created C_estado in storage.
     * POST /cEstados
     *
     * @param CreateC_estadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateC_estadoAPIRequest $request)
    {
        $input = $request->all();

        $cEstado = $this->cEstadoRepository->create($input);

        return $this->sendResponse($cEstado->toArray(), 'C Estado saved successfully');
    }

    /**
     * Display the specified C_estado.
     * GET|HEAD /cEstados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var C_estado $cEstado */
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            return $this->sendError('C Estado not found');
        }

        return $this->sendResponse($cEstado->toArray(), 'C Estado retrieved successfully');
    }

    /**
     * Update the specified C_estado in storage.
     * PUT/PATCH /cEstados/{id}
     *
     * @param int $id
     * @param UpdateC_estadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_estadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var C_estado $cEstado */
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            return $this->sendError('C Estado not found');
        }

        $cEstado = $this->cEstadoRepository->update($input, $id);

        return $this->sendResponse($cEstado->toArray(), 'C_estado updated successfully');
    }

    /**
     * Remove the specified C_estado from storage.
     * DELETE /cEstados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var C_estado $cEstado */
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            return $this->sendError('C Estado not found');
        }

        $cEstado->delete();

        return $this->sendSuccess('C Estado deleted successfully');
    }
}
