<!-- C Tipo Id Field -->
<div class="col-sm-12">
    {!! Form::label('c_tipo_id', 'C Tipo Id:') !!}
    <p>{{ $tUsuario->c_tipo_id }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $tUsuario->nombre }}</p>
</div>

<!-- Edad Field -->
<div class="col-sm-12">
    {!! Form::label('edad', 'Edad:') !!}
    <p>{{ $tUsuario->edad }}</p>
</div>

<!-- Localidad Field -->
<div class="col-sm-12">
    {!! Form::label('localidad', 'Localidad:') !!}
    <p>{{ $tUsuario->localidad }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tUsuario->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tUsuario->updated_at }}</p>
</div>

