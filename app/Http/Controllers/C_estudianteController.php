<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateC_estudianteRequest;
use App\Http\Requests\UpdateC_estudianteRequest;
use App\Repositories\C_estudianteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\C_clinica;
use App\Models\C_profesional;

class C_estudianteController extends AppBaseController
{
    /** @var  C_estudianteRepository */
    private $cEstudianteRepository;

    public function __construct(C_estudianteRepository $cEstudianteRepo)
    {
        $this->cEstudianteRepository = $cEstudianteRepo;
    }

    /**
     * Display a listing of the C_estudiante.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cEstudiantes = $this->cEstudianteRepository->all();

        return view('c_estudiantes.index')
            ->with('cEstudiantes', $cEstudiantes);
    }

    /**
     * Show the form for creating a new C_estudiante.
     *
     * @return Response
     */
    public function create()
    {
        $clinica =C_clinica::pluck('nombre','id');
        $c_profesional=C_profesional::pluck('nombre','id');
         return view('c_estudiantes.create',compact('clinica','c_profesional'));
    }

    /**
     * Store a newly created C_estudiante in storage.
     *
     * @param CreateC_estudianteRequest $request
     *
     * @return Response
     */
    public function store(CreateC_estudianteRequest $request)
    {
        $input = $request->all();

        $cEstudiante = $this->cEstudianteRepository->create($input);

        Flash::success('C Estudiante saved successfully.');

        return redirect(route('cEstudiantes.index'));
    }

    /**
     * Display the specified C_estudiante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cEstudiante = $this->cEstudianteRepository->find($id);

        if (empty($cEstudiante)) {
            Flash::error('C Estudiante not found');

            return redirect(route('cEstudiantes.index'));
        }

        return view('c_estudiantes.show')->with('cEstudiante', $cEstudiante);
    }

    /**
     * Show the form for editing the specified C_estudiante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cEstudiante = $this->cEstudianteRepository->find($id);
        $clinica =C_clinica::pluck('nombre','id');
        $c_profesional=C_profesional::pluck('nombre','id');
        if (empty($cEstudiante)) {
            Flash::error('C Estudiante not found');

            return redirect(route('cEstudiantes.index'));
        }

        return view('c_estudiantes.edit',compact('cEstudiante','clinica','c_profesional'));
    }

    /**
     * Update the specified C_estudiante in storage.
     *
     * @param int $id
     * @param UpdateC_estudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_estudianteRequest $request)
    {
        $cEstudiante = $this->cEstudianteRepository->find($id);

        if (empty($cEstudiante)) {
            Flash::error('C Estudiante not found');

            return redirect(route('cEstudiantes.index'));
        }

        $cEstudiante = $this->cEstudianteRepository->update($request->all(), $id);

        Flash::success('C Estudiante updated successfully.');

        return redirect(route('cEstudiantes.index'));
    }

    /**
     * Remove the specified C_estudiante from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cEstudiante = $this->cEstudianteRepository->find($id);

        if (empty($cEstudiante)) {
            Flash::error('C Estudiante not found');

            return redirect(route('cEstudiantes.index'));
        }

        $this->cEstudianteRepository->delete($id);

        Flash::success('C Estudiante deleted successfully.');

        return redirect(route('cEstudiantes.index'));
    }
}
