<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
class DanhSachHocSinhController extends Controller
{
    //
    function list(){
        $arr_khoi = Config::get('app.arr_khoi');
        $arr_hocky = Config::get('app.arr_hocky');
        return view('Admin.DanhSachHocSinh.list')->with(compact('arr_khoi', 'arr_hocky'));
    }
}
