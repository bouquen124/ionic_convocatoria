<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateC_clinicaRequest;
use App\Http\Requests\UpdateC_clinicaRequest;
use App\Repositories\C_clinicaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class C_clinicaController extends AppBaseController
{
    /** @var  C_clinicaRepository */
    private $cClinicaRepository;

    public function __construct(C_clinicaRepository $cClinicaRepo)
    {
        $this->cClinicaRepository = $cClinicaRepo;
    }

    /**
     * Display a listing of the C_clinica.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cClinicas = $this->cClinicaRepository->all();

        return view('c_clinicas.index')
            ->with('cClinicas', $cClinicas);
    }

    /**
     * Show the form for creating a new C_clinica.
     *
     * @return Response
     */
    public function create()
    {
        return view('c_clinicas.create');
    }

    /**
     * Store a newly created C_clinica in storage.
     *
     * @param CreateC_clinicaRequest $request
     *
     * @return Response
     */
    public function store(CreateC_clinicaRequest $request)
    {
        $input = $request->all();

        $cClinica = $this->cClinicaRepository->create($input);

        Flash::success('C Clinica saved successfully.');

        return redirect(route('cClinicas.index'));
    }

    /**
     * Display the specified C_clinica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            Flash::error('C Clinica not found');

            return redirect(route('cClinicas.index'));
        }

        return view('c_clinicas.show')->with('cClinica', $cClinica);
    }

    /**
     * Show the form for editing the specified C_clinica.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            Flash::error('C Clinica not found');

            return redirect(route('cClinicas.index'));
        }

        return view('c_clinicas.edit')->with('cClinica', $cClinica);
    }

    /**
     * Update the specified C_clinica in storage.
     *
     * @param int $id
     * @param UpdateC_clinicaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_clinicaRequest $request)
    {
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            Flash::error('C Clinica not found');

            return redirect(route('cClinicas.index'));
        }

        $cClinica = $this->cClinicaRepository->update($request->all(), $id);

        Flash::success('C Clinica updated successfully.');

        return redirect(route('cClinicas.index'));
    }

    /**
     * Remove the specified C_clinica from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cClinica = $this->cClinicaRepository->find($id);

        if (empty($cClinica)) {
            Flash::error('C Clinica not found');

            return redirect(route('cClinicas.index'));
        }

        $this->cClinicaRepository->delete($id);

        Flash::success('C Clinica deleted successfully.');

        return redirect(route('cClinicas.index'));
    }
}
