<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateC_estadoRequest;
use App\Http\Requests\UpdateC_estadoRequest;
use App\Repositories\C_estadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class C_estadoController extends AppBaseController
{
    /** @var  C_estadoRepository */
    private $cEstadoRepository;

    public function __construct(C_estadoRepository $cEstadoRepo)
    {
        $this->cEstadoRepository = $cEstadoRepo;
    }

    /**
     * Display a listing of the C_estado.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cEstados = $this->cEstadoRepository->all();

        return view('c_estados.index')
            ->with('cEstados', $cEstados);
    }

    /**
     * Show the form for creating a new C_estado.
     *
     * @return Response
     */
    public function create()
    {
        return view('c_estados.create');
    }

    /**
     * Store a newly created C_estado in storage.
     *
     * @param CreateC_estadoRequest $request
     *
     * @return Response
     */
    public function store(CreateC_estadoRequest $request)
    {
        $input = $request->all();

        $cEstado = $this->cEstadoRepository->create($input);

        Flash::success('C Estado saved successfully.');

        return redirect(route('cEstados.index'));
    }

    /**
     * Display the specified C_estado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            Flash::error('C Estado not found');

            return redirect(route('cEstados.index'));
        }

        return view('c_estados.show')->with('cEstado', $cEstado);
    }

    /**
     * Show the form for editing the specified C_estado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            Flash::error('C Estado not found');

            return redirect(route('cEstados.index'));
        }

        return view('c_estados.edit')->with('cEstado', $cEstado);
    }

    /**
     * Update the specified C_estado in storage.
     *
     * @param int $id
     * @param UpdateC_estadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_estadoRequest $request)
    {
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            Flash::error('C Estado not found');

            return redirect(route('cEstados.index'));
        }

        $cEstado = $this->cEstadoRepository->update($request->all(), $id);

        Flash::success('C Estado updated successfully.');

        return redirect(route('cEstados.index'));
    }

    /**
     * Remove the specified C_estado from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cEstado = $this->cEstadoRepository->find($id);

        if (empty($cEstado)) {
            Flash::error('C Estado not found');

            return redirect(route('cEstados.index'));
        }

        $this->cEstadoRepository->delete($id);

        Flash::success('C Estado deleted successfully.');

        return redirect(route('cEstados.index'));
    }
}
