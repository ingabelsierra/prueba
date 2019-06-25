<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class DataController extends Controller
{
    
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://ingenierosierradiaz.com/apirest/api/admin/menu', [
            'form_params' => [
                'name' => 'krunal',
            ]
        ]);
        $response = $response->getBody()->getContents();
        echo '<pre>';
        print_r($response);
    }

    
    /*public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
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
    }*/
	
	public function postRequest()
    {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://ingenierosierradiaz.com/apirest/api/admin/menu', [
        'form_params' => [
            'name' => 'krunal',
        ]
    ]);
    $response = $response->getBody()->getContents();
    echo '<pre>';
    print_r($response);
    }
}
