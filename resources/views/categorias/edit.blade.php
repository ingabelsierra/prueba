@extends('plantilla.master')
@section('content')
     

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/categorias/' . $datos["data"]->id]) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('nombre', $datos["data"]->nombre , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Estado'); !!}
        {!! Form::text('estado', $datos["data"]->estado , ['placeholder' => 'Ingrese Segundo Nombre', 'class' => 'form-control']); !!}
    </div>   
    

    {!! Form::submit('Actualizar', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
@endsection