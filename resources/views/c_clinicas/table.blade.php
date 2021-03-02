<div class="table-responsive">
    <table class="table" id="cClinicas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Correo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cClinicas as $cClinica)
            <tr>
                <td>{{ $cClinica->nombre }}</td>
            <td>{{ $cClinica->direccion }}</td>
            <td>{{ $cClinica->telefono }}</td>
            <td>{{ $cClinica->correo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cClinicas.destroy', $cClinica->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cClinicas.show', [$cClinica->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cClinicas.edit', [$cClinica->id]) }}" class='btn btn-default btn-xs'>
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
