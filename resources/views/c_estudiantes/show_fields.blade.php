<!-- C Clinica Id Field -->
<div class="col-sm-12">
    {!! Form::label('c_clinica_id', 'C Clinica Id:') !!}
    <p>{{ $cEstudiante->c_clinica_id }}</p>
</div>

<!-- C Profesional Id Field -->
<div class="col-sm-12">
    {!! Form::label('c_profesional_id', 'C Profesional Id:') !!}
    <p>{{ $cEstudiante->c_profesional_id }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $cEstudiante->nombre }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $cEstudiante->telefono }}</p>
</div>

<!-- Correo Field -->
<div class="col-sm-12">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $cEstudiante->correo }}</p>
</div>

<!-- Localidad Field -->
<div class="col-sm-12">
    {!! Form::label('localidad', 'Localidad:') !!}
    <p>{{ $cEstudiante->localidad }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cEstudiante->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cEstudiante->updated_at }}</p>
</div>

