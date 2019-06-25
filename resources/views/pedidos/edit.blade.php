@extends('plantilla.cliente')
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

    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => '/pedidos/' . $datos["data"]->id, 'enctype'=>'multipart/form-data']) !!}
    
    @if($datos["data"]->existencias>0)
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::label('nombre', $datos["data"]->nombre , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>   
 
   
    <div class="form-group">
        {!! Form::label('name', 'Precio'); !!}
        {!! Form::label('precio', $datos["data"]->precio , ['placeholder' => 'Ingrese Primer Nombre', 'class' => 'form-control']); !!}
    </div>    
    
    
    <div class="form-group">
        
    @php
    @$ima=$datos["data"]->imagen;
    @$src = 'data: '.mime_content_type($image).';base64,'.$ima;    
    @endphp
    
    <img align='center'  src='{!! $src !!}'>    
   
    </div>
    
    <div class="form-group">
    {!! Form::label('name', 'Cantidad'); !!}
    <input type="number" name="cantidad" step="1">    
    </div> 
    
    <div class="form-group">
      
     {!! Form::submit('Comprar', ['class' => 'btn btn-outline btn-primary']); !!}
    
    </div> 
    
   
    
    @else
    <div class="form-group">
        {!! Form::label('name', 'Producto Agotado'); !!}
    </div>
    
    @endif

    {!! Form::close() !!}
@endsection