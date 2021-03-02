<div class="table-responsive">
    <table class="table" id="cTipos-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cTipos as $cTipo)
            <tr>
                <td>{{ $cTipo->nombre }}</td>
            <td>{{ $cTipo->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cTipos.destroy', $cTipo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cTipos.show', [$cTipo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cTipos.edit', [$cTipo->id]) }}" class='btn btn-default btn-xs'>
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
