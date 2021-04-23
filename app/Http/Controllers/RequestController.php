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
        $path = env('REQ_URL') . 'nam-hoc.html?';
        $query = $request->getQueryString();
        $client = new \GuzzleHttp\Client();
        $data = $client->request('GET', $path . $query, ['auth' => ['user', 'pass']]);
        echo  $data->getBody();
    }

    function request_nam_hoc_option(Request $request){
        $path = env('REQ_URL') . 'nam-hoc-option.html?';
        $query = $request->getQueryString();
        $client = new \GuzzleHttp\Client();
        $data = $client->request('GET', $path . $query, ['auth' => ['user', 'pass']]);
        echo  $data->getBody();
    }

    function danh_sach_hoc_sinh(){
        return view('Admin.Request.danh-sach-hoc-sinh');
    }

    function request_danh_sach_hoc_sinh(Request $request){
        $path = env('REQ_URL') . 'danh-sach-hoc-sinh.html?';
        $query = $request->getQueryString();
        $client = new \GuzzleHttp\Client();
        $data = $client->request('GET', $path . $query, ['auth' => ['user', 'pass']]);
        echo  $data->getBody();
    }
    function mon_hoc(){
        return view('Admin.Request.mon-hoc');
    }
    function request_mon_hoc(Request $request){
        $path = env('REQ_URL') . 'mon-hoc.html?';
        $query = $request->getQueryString();
        $client = new \GuzzleHttp\Client();
        $data = $client->request('GET', $path . $query, ['auth' => ['user', 'pass']]);
        echo  $data->getBody();
    }

    function request_mon_hoc_option(Request $request){
        $path = env('REQ_URL') . 'mon-hoc-option.html?';
        $query = $request->getQueryString();
        $client = new \GuzzleHttp\Client();
        $data = $client->request('GET', $path . $query, ['auth' => ['user', 'pass']]);
        echo  $data->getBody();
    }
}
