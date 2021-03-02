<!-- C Profesional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_profesional_id', 'C Profesional Id:') !!}
    {!! Form::select('c_profesional_id', $profesional, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtitulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtitulo', 'Subtitulo:') !!}
    {!! Form::text('subtitulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contenido', 'Contenido:') !!}
    {!! Form::text('contenido', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor', 'Autor:') !!}
    {!! Form::text('autor', null, ['class' => 'form-control']) !!}
</div>