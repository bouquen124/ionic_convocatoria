<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateC_profesionalAPIRequest;
use App\Http\Requests\API\UpdateC_profesionalAPIRequest;
use App\Models\C_profesional;
use App\Repositories\C_profesionalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class C_profesionalController
 * @package App\Http\Controllers\API
 */

class C_profesionalAPIController extends AppBaseController
{
    /** @var  C_profesionalRepository */
    private $cProfesionalRepository;

    public function __construct(C_profesionalRepository $cProfesionalRepo)
    {
        $this->cProfesionalRepository = $cProfesionalRepo;
    }

    /**
     * Display a listing of the C_profesional.
     * GET|HEAD /cProfesionals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cProfesionals = $this->cProfesionalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cProfesionals->toArray(), 'C Profesionals retrieved successfully');
    }

    /**
     * Store a newly created C_profesional in storage.
     * POST /cProfesionals
     *
     * @param CreateC_profesionalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateC_profesionalAPIRequest $request)
    {
        $input = $request->all();

        $cProfesional = $this->cProfesionalRepository->create($input);

        return $this->sendResponse($cProfesional->toArray(), 'C Profesional saved successfully');
    }

    /**
     * Display the specified C_profesional.
     * GET|HEAD /cProfesionals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var C_profesional $cProfesional */
        $cProfesional = $this->cProfesionalRepository->find($id);

        if (empty($cProfesional)) {
            return $this->sendError('C Profesional not found');
        }

        return $this->sendResponse($cProfesional->toArray(), 'C Profesional retrieved successfully');
    }

    /**
     * Update the specified C_profesional in storage.
     * PUT/PATCH /cProfesionals/{id}
     *
     * @param int $id
     * @param UpdateC_profesionalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_profesionalAPIRequest $request)
    {
        $input = $request->all();

        /** @var C_profesional $cProfesional */
        $cProfesional = $this->cProfesionalRepository->find($id);

        if (empty($cProfesional)) {
            return $this->sendError('C Profesional not found');
        }

        $cProfesional = $this->cProfesionalRepository->update($input, $id);

        return $this->sendResponse($cProfesional->toArray(), 'C_profesional updated successfully');
    }

    /**
     * Remove the specified C_profesional from storage.
     * DELETE /cProfesionals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var C_profesional $cProfesional */
        $cProfesional = $this->cProfesionalRepository->find($id);

        if (empty($cProfesional)) {
            return $this->sendError('C Profesional not found');
        }

        $cProfesional->delete();

        return $this->sendSuccess('C Profesional deleted successfully');
    }
}
