<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //

    function nam_hoc(){
        return view('Admin.Request.nam-hoc');
    }
    function request_nam_hoc(Request $request){
        $path = env('REQ_URL') . 'namhoc.php?';
        $query = $request->getQueryString();
        $client = new \GuzzleHttp\Client();
        $data = $client->request('GET', $path . $query, ['auth' => ['user', 'pass']]);
        echo  $data->getBody();
    }
}
