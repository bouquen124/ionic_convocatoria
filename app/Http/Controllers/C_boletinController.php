<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateC_boletinRequest;
use App\Http\Requests\UpdateC_boletinRequest;
use App\Repositories\C_boletinRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\C_profesional;

class C_boletinController extends AppBaseController
{
    /** @var  C_boletinRepository */
    private $cBoletinRepository;

    public function __construct(C_boletinRepository $cBoletinRepo)
    {
        $this->cBoletinRepository = $cBoletinRepo;
    }

    /**
     * Display a listing of the C_boletin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cBoletins = $this->cBoletinRepository->all();

        return view('c_boletins.index')
            ->with('cBoletins', $cBoletins);
    }

    /**
     * Show the form for creating a new C_boletin.
     *
     * @return Response
     */
    public function create()
    {
        $profesional=C_profesional::pluck('nombre','id');
        return view('c_boletins.create',compact('profesional'));
    }

    /**
     * Store a newly created C_boletin in storage.
     *
     * @param CreateC_boletinRequest $request
     *
     * @return Response
     */
    public function store(CreateC_boletinRequest $request)
    {
        $input = $request->all();

        $cBoletin = $this->cBoletinRepository->create($input);

        Flash::success('C Boletin saved successfully.');

        return redirect(route('cBoletins.index'));
    }

    /**
     * Display the specified C_boletin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            Flash::error('C Boletin not found');

            return redirect(route('cBoletins.index'));
        }

        return view('c_boletins.show')->with('cBoletin', $cBoletin);
    }

    /**
     * Show the form for editing the specified C_boletin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    { $profesional=C_profesional::pluck('nombre','id');
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            Flash::error('C Boletin not found');

            return redirect(route('cBoletins.index'));
        }

        return view('c_boletins.edit',compact('cBoletin','profesional')) ;
    }

    /**
     * Update the specified C_boletin in storage.
     *
     * @param int $id
     * @param UpdateC_boletinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_boletinRequest $request)
    {
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            Flash::error('C Boletin not found');

            return redirect(route('cBoletins.index'));
        }

        $cBoletin = $this->cBoletinRepository->update($request->all(), $id);

        Flash::success('C Boletin updated successfully.');

        return redirect(route('cBoletins.index'));
    }

    /**
     * Remove the specified C_boletin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            Flash::error('C Boletin not found');

            return redirect(route('cBoletins.index'));
        }

        $this->cBoletinRepository->delete($id);

        Flash::success('C Boletin deleted successfully.');

        return redirect(route('cBoletins.index'));
    }
}
