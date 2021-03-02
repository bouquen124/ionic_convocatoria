<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- C Profesional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_profesional_id', 'C Profesional Id:') !!}
    {!! Form::select('c_profesional_id',  $c_profesional, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- T Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('t_usuario_id', 'T Usuario Id:') !!}
    {!! Form::select('t_usuario_id', $t_usuario, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- C Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_estado_id', 'C Estado Id:') !!}
    {!! Form::select('c_estado_id',  $c_estado, null, ['class' => 'form-control custom-select']) !!}
</div>
