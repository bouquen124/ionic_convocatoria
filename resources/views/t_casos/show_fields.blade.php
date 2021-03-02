<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $tCasos->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $tCasos->descripcion }}</p>
</div>

<!-- Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $tCasos->fecha }}</p>
</div>

<!-- C Profesional Id Field -->
<div class="col-sm-12">
    {!! Form::label('c_profesional_id', 'C Profesional Id:') !!}
    <p>{{ $tCasos->c_profesional_id }}</p>
</div>

<!-- T Usuario Id Field -->
<div class="col-sm-12">
    {!! Form::label('t_usuario_id', 'T Usuario Id:') !!}
    <p>{{ $tCasos->t_usuario_id }}</p>
</div>

<!-- C Estado Id Field -->
<div class="col-sm-12">
    {!! Form::label('c_estado_id', 'C Estado Id:') !!}
    <p>{{ $tCasos->c_estado_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tCasos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tCasos->updated_at }}</p>
</div>

