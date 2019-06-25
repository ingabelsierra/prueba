<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Session;

class CategoriaController extends Controller
{
    public function index(Request $request)
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
      
        return view('categorias.index', ['datos' => $array]);               
        
         
    }
    
    public function create()
    {       
          return view('categorias.create');
    }
    
    public function store(Request $request)
    {
        $token = $request->session()->get('token');         
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/categoria/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
          
        
        $response = $client->request('POST', 'nueva', [
            
            'headers' => $headers,
            
            'form_params' => [            
            'nombre' => $request->nombre,            
            'estado' => $request->estado
            ]
        ]);
                
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
        
        
        return view('categorias.index', ['datos' => $array]); 
        
    }
    
    public function edit(Request $request, $id)
    {
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='categoria/'.$id;
        $response = $client->request('GET', $endpoint, [
            'headers' => $headers
        ]);        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);        
        
        return view('categorias.edit', ['datos' => $array]);         
       
    }
    
    public function update(Request $request, $id)
    {
        
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='categoria/'.$id;
        $response = $client->request('PUT', $endpoint, [
            'headers' => $headers,      
            'form_params' => [           
            'nombre' => $request->nombre,
            'estado' => $request->estado
            
            ]
        ]);        
        
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
        
        return view('categorias.index', ['datos' => $array]); 
    }
    
    public function destroy(Request $request, $id)
    {
        $token = $request->session()->get('token');        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $endpoint='categoria/'.$id;
        $response = $client->request('DELETE', $endpoint, [
            'headers' => $headers
        ]);        
        
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
        
        return view('categorias.index', ['datos' => $array]);        
       
    }
}
