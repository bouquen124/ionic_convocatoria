<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateC_estudianteAPIRequest;
use App\Http\Requests\API\UpdateC_estudianteAPIRequest;
use App\Models\C_estudiante;
use App\Repositories\C_estudianteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class C_estudianteController
 * @package App\Http\Controllers\API
 */

class C_estudianteAPIController extends AppBaseController
{
    /** @var  C_estudianteRepository */
    private $cEstudianteRepository;

    public function __construct(C_estudianteRepository $cEstudianteRepo)
    {
        $this->cEstudianteRepository = $cEstudianteRepo;
    }

    /**
     * Display a listing of the C_estudiante.
     * GET|HEAD /cEstudiantes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cEstudiantes = $this->cEstudianteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cEstudiantes->toArray(), 'C Estudiantes retrieved successfully');
    }

    /**
     * Store a newly created C_estudiante in storage.
     * POST /cEstudiantes
     *
     * @param CreateC_estudianteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateC_estudianteAPIRequest $request)
    {
        $input = $request->all();

        $cEstudiante = $this->cEstudianteRepository->create($input);

        return $this->sendResponse($cEstudiante->toArray(), 'C Estudiante saved successfully');
    }

    /**
     * Display the specified C_estudiante.
     * GET|HEAD /cEstudiantes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var C_estudiante $cEstudiante */
        $cEstudiante = $this->cEstudianteRepository->find($id);

        if (empty($cEstudiante)) {
            return $this->sendError('C Estudiante not found');
        }

        return $this->sendResponse($cEstudiante->toArray(), 'C Estudiante retrieved successfully');
    }

    /**
     * Update the specified C_estudiante in storage.
     * PUT/PATCH /cEstudiantes/{id}
     *
     * @param int $id
     * @param UpdateC_estudianteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_estudianteAPIRequest $request)
    {
        $input = $request->all();

        /** @var C_estudiante $cEstudiante */
        $cEstudiante = $this->cEstudianteRepository->find($id);

        if (empty($cEstudiante)) {
            return $this->sendError('C Estudiante not found');
        }

        $cEstudiante = $this->cEstudianteRepository->update($input, $id);

        return $this->sendResponse($cEstudiante->toArray(), 'C_estudiante updated successfully');
    }

    /**
     * Remove the specified C_estudiante from storage.
     * DELETE /cEstudiantes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var C_estudiante $cEstudiante */
        $cEstudiante = $this->cEstudianteRepository->find($id);

        if (empty($cEstudiante)) {
            return $this->sendError('C Estudiante not found');
        }

        $cEstudiante->delete();

        return $this->sendSuccess('C Estudiante deleted successfully');
    }
}
