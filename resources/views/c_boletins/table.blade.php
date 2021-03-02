<div class="table-responsive">
    <table class="table" id="cBoletins-table">
        <thead>
            <tr>
                <th>C Profesional Id</th>
        <th>Titulo</th>
        <th>Subtitulo</th>
        <th>Contenido</th>
        <th>Autor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cBoletins as $cBoletin)
            <tr>
                <td>{{ $cBoletin->profesional->nombre }}</td>
            <td>{{ $cBoletin->titulo }}</td>
            <td>{{ $cBoletin->subtitulo }}</td>
            <td>{{ $cBoletin->contenido }}</td>
            <td>{{ $cBoletin->autor }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cBoletins.destroy', $cBoletin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cBoletins.show', [$cBoletin->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cBoletins.edit', [$cBoletin->id]) }}" class='btn btn-default btn-xs'>
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
