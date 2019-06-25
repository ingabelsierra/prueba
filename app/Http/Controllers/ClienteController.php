<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Session;
  
class ClienteController extends Controller
{
    
    public function index(Request $request)
    {   
        
        $token = $request->session()->get('token');       
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'usuarios', [
            'headers' => $headers
        ]);
        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);  
        //dd($array);
      
        return view('clientes.index', ['datos' => $array]);          
       
    }

    
    public function create()
    {
       
          return view('clientes.create');
    }

   
    public function store(Request $request)
    {       
        $token = $request->session()->get('token');         
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        //$client->request('POST', '/register', ['body' => $resource]);
        
        $response = $client->request('POST', 'register', [
            'headers' => $headers,
            
            'form_params' => [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'c_password' => $request->c_password,
            'tipo' => $request->tipo 
            ]
        ]);
        
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'usuarios', [
            'headers' => $headers
        ]);
        
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);  
        
        return view('clientes.index', ['datos' => $array]);  
        
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
