<div class="table-responsive">
    <table class="table" id="cEstados-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cEstados as $cEstado)
            <tr>
                <td>{{ $cEstado->nombre }}</td>
            <td>{{ $cEstado->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cEstados.destroy', $cEstado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cEstados.show', [$cEstado->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cEstados.edit', [$cEstado->id]) }}" class='btn btn-default btn-xs'>
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
