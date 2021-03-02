<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateC_clinicaAPIRequest;
use App\Http\Requests\API\UpdateC_clinicaAPIRequest;
use App\Models\C_clinica;
use App\Repositories\C_clinicaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class C_clinicaController
 * @package App\Http\Controllers\API
 */

class C_clinicaAPIController extends AppBaseController
{
    /** @var  C_clinicaRepository */
    private $cClinicaRepository;

    public function __construct(C_clinicaRepository $cClinicaRepo)
    {
        $this->cClinicaRepository = $cClinicaRepo;
    }

    /**
     * Display a listing of the C_clinica.
     * GET|HEAD /cClinicas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cClinicas = $this->cClinicaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cClinicas->toArray(), 'C Clinicas retrieved successfully');
    }

    /**
     * Store a newly created C_clinica in storage.
     * POST /cClinicas
     *
     * @param CreateC_clinicaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateC_clinicaAPIRequest $request)
    {
        $input = $request->all();

        $cClinica = $this->cClinicaRepository->create($input);

        return $this->sendResponse($cClinica->toArray(), 'C Clinica saved successfully');
    }

    /**
     * Display the specified C_clinica.
     * GET|HEAD /cClinicas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var C_clinica $cClinica */
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            return $this->sendError('C Clinica not found');
        }

        return $this->sendResponse($cClinica->toArray(), 'C Clinica retrieved successfully');
    }

    /**
     * Update the specified C_clinica in storage.
     * PUT/PATCH /cClinicas/{id}
     *
     * @param int $id
     * @param UpdateC_clinicaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_clinicaAPIRequest $request)
    {
        $input = $request->all();

        /** @var C_clinica $cClinica */
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            return $this->sendError('C Clinica not found');
        }

        $cClinica = $this->cClinicaRepository->update($input, $id);

        return $this->sendResponse($cClinica->toArray(), 'C_clinica updated successfully');
    }

    /**
     * Remove the specified C_clinica from storage.
     * DELETE /cClinicas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var C_clinica $cClinica */
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            return $this->sendError('C Clinica not found');
        }

        $cClinica->delete();

        return $this->sendSuccess('C Clinica deleted successfully');
    }
}
