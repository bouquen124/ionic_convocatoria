<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateC_boletinAPIRequest;
use App\Http\Requests\API\UpdateC_boletinAPIRequest;
use App\Models\C_boletin;
use App\Repositories\C_boletinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class C_boletinController
 * @package App\Http\Controllers\API
 */

class C_boletinAPIController extends AppBaseController
{
    /** @var  C_boletinRepository */
    private $cBoletinRepository;

    public function __construct(C_boletinRepository $cBoletinRepo)
    {
        $this->cBoletinRepository = $cBoletinRepo;
    }

    /**
     * Display a listing of the C_boletin.
     * GET|HEAD /cBoletins
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cBoletins = $this->cBoletinRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cBoletins->toArray(), 'C Boletins retrieved successfully');
    }

    /**
     * Store a newly created C_boletin in storage.
     * POST /cBoletins
     *
     * @param CreateC_boletinAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateC_boletinAPIRequest $request)
    {
        $input = $request->all();

        $cBoletin = $this->cBoletinRepository->create($input);

        return $this->sendResponse($cBoletin->toArray(), 'C Boletin saved successfully');
    }

    /**
     * Display the specified C_boletin.
     * GET|HEAD /cBoletins/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var C_boletin $cBoletin */
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            return $this->sendError('C Boletin not found');
        }

        return $this->sendResponse($cBoletin->toArray(), 'C Boletin retrieved successfully');
    }

    /**
     * Update the specified C_boletin in storage.
     * PUT/PATCH /cBoletins/{id}
     *
     * @param int $id
     * @param UpdateC_boletinAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateC_boletinAPIRequest $request)
    {
        $input = $request->all();

        /** @var C_boletin $cBoletin */
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            return $this->sendError('C Boletin not found');
        }

        $cBoletin = $this->cBoletinRepository->update($input, $id);

        return $this->sendResponse($cBoletin->toArray(), 'C_boletin updated successfully');
    }

    /**
     * Remove the specified C_boletin from storage.
     * DELETE /cBoletins/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var C_boletin $cBoletin */
        $cBoletin = $this->cBoletinRepository->find($id);

        if (empty($cBoletin)) {
            return $this->sendError('C Boletin not found');
        }

        $cBoletin->delete();

        return $this->sendSuccess('C Boletin deleted successfully');
    }
}
