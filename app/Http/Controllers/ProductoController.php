<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Session;
use Image;

class ProductoController extends Controller
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
      
        return view('productos.index', ['datos' => $array]);         
         
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
      
        return view('productos.create', ['datos' => $array]);       
        
    }
    
    public function store(Request $request)
    {
        $token = $request->session()->get('token');         
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/producto/']);
                
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
            
        $imagenBase64="noimagen";
        //si encuentra imagen en el request        
        if($request->file('archivo')){
        $imagenOriginal = $request->file('archivo');                
        $imagenData = file_get_contents($imagenOriginal);
        $imagenBase64 = base64_encode($imagenData);
        
        }        
        
        $response = $client->request('POST', 'nuevo', [
            'headers' => $headers,
            
            'form_params' => [
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'estado' => $request->estado,
            'existencias' => $request->existencias,
            'imagen' => $imagenBase64
              
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
        
        return view('productos.index', ['datos' => $array]); 
        
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
        
        
        return view('productos.edit', ['datos' => $array,'categorias' => $categorias]);         
       
    }
    
    public function update(Request $request, $id)
    {
                
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];        
        
        //si encuentra imagen en el request        
        if($request->file('archivo')){
        $imagenOriginal = $request->file('archivo');  
        //dd($imagenOriginal);
        $imagenData = file_get_contents($imagenOriginal);
        $imagenBase64 = base64_encode($imagenData);
        
        $endpoint='producto/'.$id;
        $response = $client->request('PUT', $endpoint, [
            'headers' => $headers,      
            'form_params' => [
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'estado' => $request->estado,
            'imagen' => $imagenBase64
            ]
        ]);    
        
        }
        else{
        $endpoint='producto/'.$id;
        $response = $client->request('PUT', $endpoint, [
            'headers' => $headers,      
            'form_params' => [
            'id_categoria' => $request->id_categoria,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'estado' => $request->estado
            ]
        ]);        
            
        }         
        
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
        
        return view('productos.index', ['datos' => $array]);
    }
    
    public function destroy(Request $request, $id)
    {
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='producto/'.$id;
        $response = $client->request('DELETE', $endpoint, [
            'headers' => $headers
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
        
        return view('productos.index', ['datos' => $array]);      
       
    }
}
