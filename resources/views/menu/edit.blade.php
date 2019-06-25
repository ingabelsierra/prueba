@extends('plantilla.master')
@section('content')
     

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/menu/' . $datos["data"]->id]) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('nombre', $datos["data"]->nombre , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Descripcion'); !!}
        {!! Form::text('descripcion', $datos["data"]->descripcion , ['placeholder' => 'Ingrese Segundo Nombre', 'class' => 'form-control']); !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('name', 'Categoria Actual'); !!}
        <input type="text" name="lname" disabled value="{!! $datos['data']->id_categoria !!}" class="form-control">
            <label >Categoría Nueva</label>
            <input type="text" list="subject" name="id_categoria" class="form-control" >
            <datalist id="subject">
                <option label="{{ $datos['data']->id_categoria}} $datos['data']->nombre">
                @foreach ($categorias["data"] as $dato)
                <option label="{{ $dato->id}} {{ $dato->nombre}}" value="{{ $dato->id}}">
                @endforeach     

            </datalist>
    
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Precio'); !!}
        {!! Form::text('precio', $datos["data"]->precio , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>
    

    {!! Form::submit('Actualizar', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
@endsection