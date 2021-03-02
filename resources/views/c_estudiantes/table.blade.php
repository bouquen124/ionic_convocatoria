<div class="table-responsive">
    <table class="table" id="cEstudiantes-table">
        <thead>
            <tr>
                <th>C Clinica Id</th>
        <th>C Profesional Id</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Localidad</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cEstudiantes as $cEstudiante)
            <tr>
                <td>{{ $cEstudiante->clinica->nombre }}</td>
            <td>{{ $cEstudiante->profesional->nombre }}</td>
            <td>{{ $cEstudiante->nombre }}</td>
            <td>{{ $cEstudiante->telefono }}</td>
            <td>{{ $cEstudiante->correo }}</td>
            <td>{{ $cEstudiante->localidad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cEstudiantes.destroy', $cEstudiante->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cEstudiantes.show', [$cEstudiante->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cEstudiantes.edit', [$cEstudiante->id]) }}" class='btn btn-default btn-xs'>
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
