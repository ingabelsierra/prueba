<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {   
        $token = $request->session()->get('token');
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'productos', [
            'headers' => $headers
        ]);       
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);          
      
        return view('pedidos.index', ['datos' => $array]);         
         
    }  
    
    
    public function edit(Request $request, $id)
    {
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='producto/'.$id;
        $response = $client->request('GET', $endpoint, [
            'headers' => $headers
        ]);        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);   
        
        //Categorias
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'categorias', [
            'headers' => $headers
        ]);        
        
        $result=$response->getBody();        
        $categorias=(array)json_decode($result);        
        
        return view('pedidos.edit', ['datos' => $array,'categorias' => $categorias]);         
       
    }
    
    public function update(Request $request, $id)
    {
                
        $token = $request->session()->get('token'); 
        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/usuario/detalle/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
          
        
        $response = $client->request('POST', 'nuevo', [
            
            'headers' => $headers,
            
            'form_params' => [
            'id_pedido' => '1',
            'id_menu' => '1',
            'cantMenu' => '1',
            'cantProducto' => $request->cantidad,
            'id_producto' => $id
            ]
        ]);      
               
        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'productos', [
            'headers' => $headers
        ]);       
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);          
      
        return view('pedidos.index', ['datos' => $array]);    
    }
    
    
}
