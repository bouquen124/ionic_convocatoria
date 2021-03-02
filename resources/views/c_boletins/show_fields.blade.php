<!-- C Profesional Id Field -->
<div class="col-sm-12">
    {!! Form::label('c_profesional_id', 'C Profesional Id:') !!}
    <p>{{ $cBoletin->c_profesional_id }}</p>
</div>

<!-- Titulo Field -->
<div class="col-sm-12">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{{ $cBoletin->titulo }}</p>
</div>

<!-- Subtitulo Field -->
<div class="col-sm-12">
    {!! Form::label('subtitulo', 'Subtitulo:') !!}
    <p>{{ $cBoletin->subtitulo }}</p>
</div>

<!-- Contenido Field -->
<div class="col-sm-12">
    {!! Form::label('contenido', 'Contenido:') !!}
    <p>{{ $cBoletin->contenido }}</p>
</div>

<!-- Autor Field -->
<div class="col-sm-12">
    {!! Form::label('autor', 'Autor:') !!}
    <p>{{ $cBoletin->autor }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cBoletin->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cBoletin->updated_at }}</p>
</div>

