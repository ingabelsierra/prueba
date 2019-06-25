@extends('plantilla.master')
@section('content')
    
    <script src="{{asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            (function ($) {

                $('#filtrar').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
    </script>
    <br>
    <div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el nombre de la categoría a buscar">
    </div>
    <hr/>    
   
    <a class="btn btn-primary" href="{{ url('categorias/create') }}" style="margin-bottom: 15px;">Nueva Categoría</a>

    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Estado</th>          
            <th width="110px;">Editar</th>    
            <th width="110px;">Borrar</th>
            
        </tr>
        </thead>
        <tbody class="buscar">

        @foreach($datos["data"] as $dato)           
                
                <tr>
                <td>{!! $dato->nombre !!}</td>               
                <td>{!! $dato->estado !!}</td>
                <td>
                    <a class="btn btn-outline btn-primary" href="categorias/{!! $dato->id !!}/edit">Editar</a>

                </td>
                <td>

                    {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => '/categorias/' . $dato->id]) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-outline btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
                
                </tr>        

            
        @endforeach

        </tbody>
    </table>


@endsection()