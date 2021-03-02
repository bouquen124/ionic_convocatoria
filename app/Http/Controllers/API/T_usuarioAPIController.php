<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateT_usuarioAPIRequest;
use App\Http\Requests\API\UpdateT_usuarioAPIRequest;
use App\Models\T_usuario;
use App\Repositories\T_usuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class T_usuarioController
 * @package App\Http\Controllers\API
 */

class T_usuarioAPIController extends AppBaseController
{
    /** @var  T_usuarioRepository */
    private $tUsuarioRepository;

    public function __construct(T_usuarioRepository $tUsuarioRepo)
    {
        $this->tUsuarioRepository = $tUsuarioRepo;
    }

    /**
     * Display a listing of the T_usuario.
     * GET|HEAD /tUsuarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tUsuarios = $this->tUsuarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tUsuarios->toArray(), 'T Usuarios retrieved successfully');
    }

    /**
     * Store a newly created T_usuario in storage.
     * POST /tUsuarios
     *
     * @param CreateT_usuarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateT_usuarioAPIRequest $request)
    {
        $input = $request->all();

        $tUsuario = $this->tUsuarioRepository->create($input);

        return $this->sendResponse($tUsuario->toArray(), 'T Usuario saved successfully');
    }

    /**
     * Display the specified T_usuario.
     * GET|HEAD /tUsuarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var T_usuario $tUsuario */
        $tUsuario = $this->tUsuarioRepository->find($id);

        if (empty($tUsuario)) {
            return $this->sendError('T Usuario not found');
        }

        return $this->sendResponse($tUsuario->toArray(), 'T Usuario retrieved successfully');
    }

    /**
     * Update the specified T_usuario in storage.
     * PUT/PATCH /tUsuarios/{id}
     *
     * @param int $id
     * @param UpdateT_usuarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateT_usuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var T_usuario $tUsuario */
        $tUsuario = $this->tUsuarioRepository->find($id);

        if (empty($tUsuario)) {
            return $this->sendError('T Usuario not found');
        }

        $tUsuario = $this->tUsuarioRepository->update($input, $id);

        return $this->sendResponse($tUsuario->toArray(), 'T_usuario updated successfully');
    }

    /**
     * Remove the specified T_usuario from storage.
     * DELETE /tUsuarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var T_usuario $tUsuario */
        $tUsuario = $this->tUsuarioRepository->find($id);

        if (empty($tUsuario)) {
            return $this->sendError('T Usuario not found');
        }

        $tUsuario->delete();

        return $this->sendSuccess('T Usuario deleted successfully');
    }
}
