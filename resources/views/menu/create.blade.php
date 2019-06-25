@extends('plantilla.master')
@section('content')

<hr/>

<hr/>
    
    {!! Form::open(['id' => 'dataForm', 'url' => 'menu' ]) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('nombre', null, ['placeholder' => 'Ingrese del plato', 'class' => 'form-control']); !!}
    </div>  
    
    <div class="form-group">
        {!! Form::label('name', 'Descripción'); !!}
        {!! Form::text('descripcion', null, ['placeholder' => 'Ingrese la Descripción del Plato', 'class' => 'form-control']); !!}
    </div> 
    
    <div class="form-group">
        {!! Form::label('name', 'Precio'); !!}
        {!! Form::text('precio', null, ['placeholder' => 'Ingrese el precio del Plato', 'class' => 'form-control']); !!}
    </div> 

    <div class="form-group">
        
        <label >Categoría</label>
                 <input type="text" list="subject" name="id_categoria" class="form-control" >
                <datalist id="subject">
                    @foreach ($datos["data"] as $dato)
                    <option label="{{ $dato->id}} {{ $dato->nombre}}" value="{{ $dato->id}}">
                    @endforeach     
                      
                </datalist>
    </div>      
  

    {!! Form::submit('Ingresar Plato', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
 
@stop