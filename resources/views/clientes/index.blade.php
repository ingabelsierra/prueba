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
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el nombre del Menú a buscar">
    </div>
    
    <hr/>
    
   
    <a class="btn btn-primary" href="{{ url('clientes/create') }}" style="margin-bottom: 15px;">Nuevo Usuario</a>

    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Email</th>
            <th width="110px;">Info</th>         
            
            
        </tr>
        </thead>
        <tbody class="buscar">

        @foreach($datos["success"] as $dato)            
                
                <tr>
                <td>{!! $dato->name !!}</td>
                <td>{!! $dato->email !!}</td>                  
                <td>
                    <a class="btn btn-outline btn-primary" href="../clientes/{!! $dato->id !!}/edit">Info</a>

                </td>
               
                </tr>          

            </tr>
        @endforeach

        </tbody>
    </table>


@endsection()