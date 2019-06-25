<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Session;

class MenuController extends Controller
{
    public function index(Request $request)
    {              
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'menu', [
            'headers' => $headers
        ]);
                
        $result=$response->getBody();        
        $array=(array)json_decode($result);      
        
        return view('menu.index', ['datos' => $array]);         
         
    }
    
    public function create(Request $request)
    {
        $token = $request->session()->get('token');      
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'categorias', [
            'headers' => $headers
        ]);
        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);
        
        return view('menu.create', ['datos' => $array]);         
    }
    
    public function store(Request $request)
    { 
        $token = $request->session()->get('token');         
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/menu/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];        
      
        
        $response = $client->request('POST', 'nuevo', [
            'headers' => $headers,
            
            'form_params' => [
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion
            ]
        ]);
                
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'menu', [
            'headers' => $headers
        ]);        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result); 
        
        
        return view('menu.index', ['datos' => $array]);  
        
    }
    
    public function edit(Request $request, $id)
    {
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='menu/'.$id;
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
        
        return view('menu.edit', ['datos' => $array,'categorias' => $categorias]);          
       
    }
    
    public function update(Request $request, $id)
    {
        
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='menu/'.$id;
        $response = $client->request('PUT', $endpoint, [
            'headers' => $headers,      
            'form_params' => [
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion
            ]
        ]);        
        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'menu', [
            'headers' => $headers
        ]);
                
        $result=$response->getBody();        
        $array=(array)json_decode($result);               
        
        return view('menu.index', ['datos' => $array]); 
    }
    
    public function destroy(Request $request, $id)
    {
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='menu/'.$id;
        $response = $client->request('DELETE', $endpoint, [
            'headers' => $headers
        ]);        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);        
        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'menu', [
            'headers' => $headers
        ]);
                
        $result=$response->getBody();        
        $array=(array)json_decode($result);               
        
        return view('menu.index', ['datos' => $array]); 
       
    }
}
