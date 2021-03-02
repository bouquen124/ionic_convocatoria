<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateC_profesionalRequest;
use App\Http\Requests\UpdateC_profesionalRequest;
use App\Repositories\C_profesionalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\C_clinica;
class C_profesionalController extends AppBaseController
{
    /** @var  C_profesionalRepository */
    private $cProfesionalRepository;

    public function __construct(C_profesionalRepository $cProfesionalRepo)
    {
        $this->cProfesionalRepository = $cProfesionalRepo;
    }

    /**
     * Display a listing of the C_profesional.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cProfesionals = $this->cProfesionalRepository->all();

        return view('c_profesionals.index')
            ->with('cProfesionals', $cProfesionals);
    }

    /**
     * Show the form for creating a new C_profesional.
     *
     * @return Response
     */
    public function create()
    {
        $clinica =C_clinica::pluck('nombre','id');
        return view('c_profesionals.create',compact('clinica'));
    }

    /**
     * Store a newly created C_profesional in storage.
     *
     * @param CreateC_profesionalRequest $request
     *
     * @return Response
     */
    public function store(CreateC_profesionalRequest $request)
    {
        $input = $request->all();

        $cProfesional = $this->cProfesionalRepository->create($input);

        Flash::success('C Profesional saved successfully.');

        return redirect(route('cProfesionals.index'));
    }

    /**
     * Display the specified C_profesional.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cProfesional = $this->cProfesionalRepository->find($id);

        if (empty($cProfesional)) {
            Flash::error('C Profesional not found');

            return redirect(route('cProfesionals.index'));
        }

        return view('c_profesionals.show')->with('cProfesional', $cProfesional);
    }

    /**
     * Show the form for editing the specified C_profesional.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cProfesional = $this->cProfesionalRepository->find($id);
        $clinica =C_clinica::pluck('nombre','id');
        if (empty($cProfesional)) {
            Flash::error('C Profesional not found');

            return redirect(route('cProfesionals.index'));
        }

        return view('c_profesionals.edit',compact('cProfesional','clinica'));
    }

    /**
     * Update the specified C_profesional in storage.
     *
     * @param int $id
     * @param UpdateC_profesionalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_profesionalRequest $request)
    {
        $cProfesional = $this->cProfesionalRepository->find($id);

        if (empty($cProfesional)) {
            Flash::error('C Profesional not found');

            return redirect(route('cProfesionals.index'));
        }

        $cProfesional = $this->cProfesionalRepository->update($request->all(), $id);

        Flash::success('C Profesional updated successfully.');

        return redirect(route('cProfesionals.index'));
    }

    /**
     * Remove the specified C_profesional from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cProfesional = $this->cProfesionalRepository->find($id);

        if (empty($cProfesional)) {
            Flash::error('C Profesional not found');

            return redirect(route('cProfesionals.index'));
        }

        $this->cProfesionalRepository->delete($id);

        Flash::success('C Profesional deleted successfully.');

        return redirect(route('cProfesionals.index'));
    }
}
