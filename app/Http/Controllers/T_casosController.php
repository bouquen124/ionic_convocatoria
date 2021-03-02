<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateT_casosRequest;
use App\Http\Requests\UpdateT_casosRequest;
use App\Repositories\T_casosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\T_usuario;
use App\Models\C_estado;
use App\Models\C_profesional;

class T_casosController extends AppBaseController
{
    /** @var  T_casosRepository */
    private $tCasosRepository;

    public function __construct(T_casosRepository $tCasosRepo)
    {
        $this->tCasosRepository = $tCasosRepo;
    }

    /**
     * Display a listing of the T_casos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tCasos = $this->tCasosRepository->all();

        return view('t_casos.index')
            ->with('tCasos', $tCasos);
    }

    /**
     * Show the form for creating a new T_casos.
     *
     * @return Response
     */
    public function create()
    {

        $t_usuario =T_usuario::pluck('nombre','id');
        $c_estado= C_estado::pluck('nombre','id');
        $c_profesional=C_profesional::pluck('nombre','id');
        return view('t_casos.create',compact('t_usuario','c_estado','c_profesional'));
    }

    /**
     * Store a newly created T_casos in storage.
     *
     * @param CreateT_casosRequest $request
     *
     * @return Response
     */
    public function store(CreateT_casosRequest $request)
    {
        $input = $request->all();

        $tCasos = $this->tCasosRepository->create($input);

        Flash::success('T Casos saved successfully.');

        return redirect(route('tCasos.index'));
    }

    /**
     * Display the specified T_casos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            Flash::error('T Casos not found');

            return redirect(route('tCasos.index'));
        }

        return view('t_casos.show')->with('tCasos', $tCasos);
    }

    /**
     * Show the form for editing the specified T_casos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $t_usuario =T_usuario::pluck('nombre','id');
        $c_estado= C_estado::pluck('nombre','id');
        $c_profesional=C_profesional::pluck('nombre','id');
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            Flash::error('T Casos not found');

            return redirect(route('tCasos.index'));
        }

        return view('t_casos.edit',compact('t_usuario','c_estado','c_profesional','tCasos'));
    }

    /**
     * Update the specified T_casos in storage.
     *
     * @param int $id
     * @param UpdateT_casosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateT_casosRequest $request)
    {
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            Flash::error('T Casos not found');

            return redirect(route('tCasos.index'));
        }

        $tCasos = $this->tCasosRepository->update($request->all(), $id);

        Flash::success('T Casos updated successfully.');

        return redirect(route('tCasos.index'));
    }

    /**
     * Remove the specified T_casos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tCasos = $this->tCasosRepository->find($id);

        if (empty($tCasos)) {
            Flash::error('T Casos not found');

            return redirect(route('tCasos.index'));
        }

        $this->tCasosRepository->delete($id);

        Flash::success('T Casos deleted successfully.');

        return redirect(route('tCasos.index'));
    }
}
