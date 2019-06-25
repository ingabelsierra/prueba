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

<hr/>
    
    {!! Form::open(['id' => 'dataForm', 'url' => 'productos', 'enctype'=>'multipart/form-data' ]) !!}
    
   <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('nombre', null, ['placeholder' => 'Ingrese Nombre del Producto', 'class' => 'form-control']); !!}
    </div>  
    
    <div class="form-group">
        {!! Form::label('name', 'Precio'); !!}
        {!! Form::text('precio', null, ['placeholder' => 'Ingrese la Descripción del Producto', 'class' => 'form-control']); !!}
    </div> 
    
    <div class="form-group">
        {!! Form::label('name', 'Existencias'); !!}
        {!! Form::text('existencias', null, ['placeholder' => 'Ingrese la Exietncia inicial del producto', 'class' => 'form-control']); !!}
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
    
   <div class="form-group">
        <label>Estado</label>
        <select id="estado" name="estado" class="form-control">
            <option value="1">ACTIVO</option>
            <option value="0">AGOTADO</option>
        </select>
    </div>
    
    <div class="form-group">
      <label for="archivo"><b>Foto (jpg,png): </b></label><br>
      <input type="file" name="archivo" onchange="validarFile(this);" id="archivo">   
    </div>  
    
    {!! Form::submit('Ingresar Producto', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
 
@stop