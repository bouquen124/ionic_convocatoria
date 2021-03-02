<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateT_usuarioRequest;
use App\Http\Requests\UpdateT_usuarioRequest;
use App\Repositories\T_usuarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\C_tipo;

class T_usuarioController extends AppBaseController
{
    /** @var  T_usuarioRepository */
    private $tUsuarioRepository;

    public function __construct(T_usuarioRepository $tUsuarioRepo)
    {
        $this->tUsuarioRepository = $tUsuarioRepo;
    }

    /**
     * Display a listing of the T_usuario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tUsuarios = $this->tUsuarioRepository->all();

        return view('t_usuarios.index')
            ->with('tUsuarios', $tUsuarios);
    }

    /**
     * Show the form for creating a new T_usuario.
     *
     * @return Response
     */
    public function create()
    {
        $c_tipo =C_tipo::pluck('nombre','id');
        return view('t_usuarios.create',compact('c_tipo'));
    }

    /**
     * Store a newly created T_usuario in storage.
     *
     * @param CreateT_usuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateT_usuarioRequest $request)
    {
        $input = $request->all();

        $tUsuario = $this->tUsuarioRepository->create($input);

        Flash::success('T Usuario saved successfully.');

        return redirect(route('tUsuarios.index'));
    }

    /**
     * Display the specified T_usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tUsuario = $this->tUsuarioRepository->find($id);

        if (empty($tUsuario)) {
            Flash::error('T Usuario not found');

            return redirect(route('tUsuarios.index'));
        }

        return view('t_usuarios.show')->with('tUsuario', $tUsuario);
    }

    /**
     * Show the form for editing the specified T_usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tUsuario = $this->tUsuarioRepository->find($id);
        $c_tipo =C_tipo::pluck('nombre','id');
        if (empty($tUsuario)) {
            Flash::error('T Usuario not found');

            return redirect(route('tUsuarios.index'));
        }

        return view('t_usuarios.edit',compact('tUsuario','c_tipo'));
    }

    /**
     * Update the specified T_usuario in storage.
     *
     * @param int $id
     * @param UpdateT_usuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateT_usuarioRequest $request)
    {
        $tUsuario = $this->tUsuarioRepository->find($id);

        if (empty($tUsuario)) {
            Flash::error('T Usuario not found');

            return redirect(route('tUsuarios.index'));
        }

        $tUsuario = $this->tUsuarioRepository->update($request->all(), $id);

        Flash::success('T Usuario updated successfully.');

        return redirect(route('tUsuarios.index'));
    }

    /**
     * Remove the specified T_usuario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tUsuario = $this->tUsuarioRepository->find($id);

        if (empty($tUsuario)) {
            Flash::error('T Usuario not found');

            return redirect(route('tUsuarios.index'));
        }

        $this->tUsuarioRepository->delete($id);

        Flash::success('T Usuario deleted successfully.');

        return redirect(route('tUsuarios.index'));
    }
}
