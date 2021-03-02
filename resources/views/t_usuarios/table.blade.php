<div class="table-responsive">
    <table class="table" id="tUsuarios-table">
        <thead>
            <tr>
                <th>C Tipo Id</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Localidad</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tUsuarios as $tUsuario)
            <tr>
                <td>{{ $tUsuario->c_tipo->nombre }}</td>
            <td>{{ $tUsuario->nombre }}</td>
            <td>{{ $tUsuario->edad }}</td>
            <td>{{ $tUsuario->localidad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tUsuarios.destroy', $tUsuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tUsuarios.show', [$tUsuario->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tUsuarios.edit', [$tUsuario->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
