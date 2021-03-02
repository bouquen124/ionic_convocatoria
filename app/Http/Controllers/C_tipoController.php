<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateC_tipoRequest;
use App\Http\Requests\UpdateC_tipoRequest;
use App\Repositories\C_tipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class C_tipoController extends AppBaseController
{
    /** @var  C_tipoRepository */
    private $cTipoRepository;

    public function __construct(C_tipoRepository $cTipoRepo)
    {
        $this->cTipoRepository = $cTipoRepo;
    }

    /**
     * Display a listing of the C_tipo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cTipos = $this->cTipoRepository->all();

        return view('c_tipos.index')
            ->with('cTipos', $cTipos);
    }

    /**
     * Show the form for creating a new C_tipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('c_tipos.create');
    }

    /**
     * Store a newly created C_tipo in storage.
     *
     * @param CreateC_tipoRequest $request
     *
     * @return Response
     */
    public function store(CreateC_tipoRequest $request)
    {
        $input = $request->all();

        $cTipo = $this->cTipoRepository->create($input);

        Flash::success('C Tipo saved successfully.');

        return redirect(route('cTipos.index'));
    }

    /**
     * Display the specified C_tipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            Flash::error('C Tipo not found');

            return redirect(route('cTipos.index'));
        }

        return view('c_tipos.show')->with('cTipo', $cTipo);
    }

    /**
     * Show the form for editing the specified C_tipo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            Flash::error('C Tipo not found');

            return redirect(route('cTipos.index'));
        }

        return view('c_tipos.edit')->with('cTipo', $cTipo);
    }

    /**
     * Update the specified C_tipo in storage.
     *
     * @param int $id
     * @param UpdateC_tipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_tipoRequest $request)
    {
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            Flash::error('C Tipo not found');

            return redirect(route('cTipos.index'));
        }

        $cTipo = $this->cTipoRepository->update($request->all(), $id);

        Flash::success('C Tipo updated successfully.');

        return redirect(route('cTipos.index'));
    }

    /**
     * Remove the specified C_tipo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cTipo = $this->cTipoRepository->find($id);

        if (empty($cTipo)) {
            Flash::error('C Tipo not found');

            return redirect(route('cTipos.index'));
        }

        $this->cTipoRepository->delete($id);

        Flash::success('C Tipo deleted successfully.');

        return redirect(route('cTipos.index'));
    }
}
