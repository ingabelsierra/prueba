@extends('plantilla.cliente')
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
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el nombre del Producto a buscar">
    </div>
    
    <hr/>   
  

    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th width="110px;">Producto</th>
                  
            
        </tr>
        </thead>
        <tbody class="buscar">

        @foreach($datos["data"] as $dato)            
                
                <tr>
                <td>{!! $dato->id_categoria !!}</td>
                <td>{!! $dato->nombre !!}</td>   
                <td>{!! $dato->precio !!}</td>
                <td>{!! $dato->existencias !!}</td>
                <td>
                    <a class="btn btn-outline btn-primary" href="pedidos/{!! $dato->id !!}/edit">Ver</a>

                </td>
               
               
                </tr>                

            </tr>
        @endforeach

        </tbody>
    </table>


@endsection()