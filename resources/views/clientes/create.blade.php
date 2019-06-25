@extends('plantilla.master')
@section('content')

<hr/>

<hr/>
    
    {!! Form::open(['id' => 'dataForm', 'url' => 'clientes' ]) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Nombre'); !!}
        {!! Form::text('name', null, ['placeholder' => 'Ingrese Nombres y Apellidos', 'class' => 'form-control']); !!}
    </div> 
    
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Usuario Correo Electrónico</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>                      

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        
        <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="c_password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>
    
     <div class="form-group">
        {!! Form::label('email', 'Documento') !!}
        {!! Form::text('documento', null, ['placeholder' => 'Ingrese numero de documento', 'class' => 'form-control']); !!}
    </div> 


    <div class="form-group">
        <label>Tipo Usuario</label>
        <select id="tipo" name="tipo" class="form-control">
            <option value="MESERO">MESERO</option>
            <option value="CLIENTE">CLIENTE</option>
            <option value="CHEF">CHEF</option>
            <option value="BAR">BAR</option>
        </select>
    </div>        
  

    {!! Form::submit('Ingresar Usuario', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
 
@stop