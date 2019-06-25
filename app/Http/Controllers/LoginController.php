<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Session;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');         
    }
    
    //Esta funcion store realiza el login
    public function store(Request $request) {
        
        $email=$request->email;
        $password=$request->password;      
       
        $client = new Client();
        $response = $client->post('https://ingenierosierradiaz.com/apirest/api/admin/login', [
            'form_params' => [
                'email' => $email,
                'password' => $password
            ]
        ]); 
        
        $result=$response->getBody();        
        $array=(array)json_decode($result);        
        
        //entra si es exitoso el request
        if($response->getStatusCode()==200){
        
        $token=$array["success"]->token;   
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
        //asignamos el token a la variable de sessión
        session(['token' => $token]);   
        
        //tipo usuario     
        $client = new Client(['base_uri' => 'https://ingenierosierradiaz.com/apirest/api/admin/']);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        
        $response = $client->request('POST', 'usuario', [
            'headers' => $headers
        ]);
        
        
        $result=$response->getBody();        
        $tipo=(array)json_decode($result);
       
        //dd($tipo);  
        if($tipo["success"]->tipo=='ADMIN'){
        return view('productos.index', ['datos' => $array]);
        
        }
        
        if($tipo["success"]->tipo=='CLIENTE'){
        return view('pedidos.index', ['datos' => $array]);
        
        }
        
        
        }        
        
    }    
   
}
