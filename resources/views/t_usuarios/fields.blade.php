<!-- C Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_tipo_id', 'C Tipo Id:') !!}
    {!! Form::select('c_tipo_id',$c_tipo, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Edad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad', 'Edad:') !!}
    {!! Form::number('edad', null, ['class' => 'form-control']) !!}
</div>

<!-- Localidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localidad', 'Localidad:') !!}
    {!! Form::text('localidad', null, ['class' => 'form-control']) !!}
</div>