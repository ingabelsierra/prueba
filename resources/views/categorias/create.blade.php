@extends('plantilla.master')
@section('content')

<hr/>

<hr/>
    
    {!! Form::open(['id' => 'dataForm', 'url' => 'categorias' ]) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('nombre', null, ['placeholder' => 'Ingrese Nombre de la categoría', 'class' => 'form-control']); !!}
    </div>  
    
   <div class="form-group">
        <label>Estado</label>
        <select id="estado" name="estado" class="form-control">
            <option value="1">ACTIVO</option>
            <option value="0">AGOTADO</option>
        </select>
    </div>     
  

    {!! Form::submit('Ingresar Plato', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
 
@stop