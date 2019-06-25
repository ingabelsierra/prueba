@extends('plantilla.master')
@section('content')

    <script>
    function validarFile(all)
    {   
        //var extensiones_permitidas = [".png", ".jpg", ".jpeg"];
        var extensiones_permitidas = [".jpg", ".jpeg"];
        var tamano = 8; // EXPRESADO EN MB.
        var rutayarchivo = all.value;
        var ultimo_punto = all.value.lastIndexOf(".");
        var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
        if(extensiones_permitidas.indexOf(extension) == -1)
        {
            alert("Extensión de archivo no permitida");
            document.getElementById(all.id).value = "";
            return; // Si la extension es no válida ya no chequeo lo de abajo.
        }
        if((all.files[0].size / 1048576) > tamano)
        {
            alert("El archivo no puede superar los "+tamano+"MB");
            document.getElementById(all.id).value = "";
            return;
        }
    }
    </script>

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/productos/' . $datos["data"]->id, 'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('nombre', $datos["data"]->nombre , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Estado'); !!}
        {!! Form::text('estado', $datos["data"]->estado , ['placeholder' => 'Ingrese Segundo Nombre', 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Precio'); !!}
        {!! Form::text('precio', $datos["data"]->precio , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('name', 'Existencias'); !!}
        {!! Form::text('existencias', $datos["data"]->existencias , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
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
      <label for="archivo"><b>Foto (jpg,png): </b></label><br>
      <input type="file" name="archivo" onchange="validarFile(this);" id="archivo">   
    </div>     
   
    
    <div class="form-group">
        
    @php
    @$ima=$datos["data"]->imagen;
    @$src = 'data: '.mime_content_type($image).';base64,'.$ima;    
    @endphp
    
    <img align='center'  src='{!! $src !!}'>    
   
    </div>
    
    {!! Form::submit('Actualizar', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
@endsection