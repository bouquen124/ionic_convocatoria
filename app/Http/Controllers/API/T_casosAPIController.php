<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateT_casosAPIRequest;
use App\Http\Requests\API\UpdateT_casosAPIRequest;
use App\Models\T_casos;
use App\Repositories\T_casosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class T_casosController
 * @package App\Http\Controllers\API
 */

class T_casosAPIController extends AppBaseController
{
    /** @var  T_casosRepository */
    private $tCasosRepository;

    public function __construct(T_casosRepository $tCasosRepo)
    {
        $this->tCasosRepository = $tCasosRepo;
    }

    /**
     * Display a listing of the T_casos.
     * GET|HEAD /tCasos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tCasos = $this->tCasosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tCasos->toArray(), 'T Casos retrieved successfully');
    }

    /**
     * Store a newly created T_casos in storage.
     * POST /tCasos
     *
     * @param CreateT_casosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateT_casosAPIRequest $request)
    {
        $input = $request->all();

        $tCasos = $this->tCasosRepository->create($input);

        return $this->sendResponse($tCasos->toArray(), 'T Casos saved successfully');
    }

    /**
     * Display the specified T_casos.
     * GET|HEAD /tCasos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var T_casos $tCasos */
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            return $this->sendError('T Casos not found');
        }

        return $this->sendResponse($tCasos->toArray(), 'T Casos retrieved successfully');
    }

    /**
     * Update the specified T_casos in storage.
     * PUT/PATCH /tCasos/{id}
     *
     * @param int $id
     * @param UpdateT_casosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateT_casosAPIRequest $request)
    {
        $input = $request->all();

        /** @var T_casos $tCasos */
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            return $this->sendError('T Casos not found');
        }

        $tCasos = $this->tCasosRepository->update($input, $id);

        return $this->sendResponse($tCasos->toArray(), 'T_casos updated successfully');
    }

    /**
     * Remove the specified T_casos from storage.
     * DELETE /tCasos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var T_casos $tCasos */
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            return $this->sendError('T Casos not found');
        }

        $tCasos->delete();

        return $this->sendSuccess('T Casos deleted successfully');
    }
}
