<div class="table-responsive">
    <table class="table" id="cProfesionals-table">
        <thead>
            <tr>
                <th>C Clinica Id</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Localidad</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cProfesionals as $cProfesional)
            <tr>
                <td>{{ $cProfesional->c_clinica->nombre }}</td>
            <td>{{ $cProfesional->nombre }}</td>
            <td>{{ $cProfesional->telefono }}</td>
            <td>{{ $cProfesional->correo }}</td>
            <td>{{ $cProfesional->localidad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cProfesionals.destroy', $cProfesional->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cProfesionals.show', [$cProfesional->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cProfesionals.edit', [$cProfesional->id]) }}" class='btn btn-default btn-xs'>
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
