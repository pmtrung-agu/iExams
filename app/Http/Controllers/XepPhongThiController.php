<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Models\DanhSachHocSinh;
use App\Models\XepPhongThi;
use Config;

class XepPhongThiController extends Controller
{
    //
    function list(Request $request){
        $arr_khoi = Config::get('app.arr_khoi');
        $arr_hocky = Config::get('app.arr_hocky');
        $id_namhoc = $request->input('id_namhoc');
        $hocky = $request->input('hocky');
        $khoi = $request->input('khoi');
        $id_monthi = $request->input('id_monthi');
        $id_buoithi = $request->input('id_buoithi');
        $ngaythi = $request->input('ngaythi');
        if($id_namhoc && $hocky && $khoi && $ngaythi && $id_monthi && $id_buoithi){
            $danhsach = '';
        } else {
            $danhsach = '';
        }

        $id_namhoc = ObjectController::ObjectId($id_namhoc);
        $check_danhsachhocsinh = DanhSachHocSinh::where('khoi', '=', $khoi)->where('id_namhoc', '=', $id_namhoc)->where('hocky','=',$hocky)->first();


        return view('Admin.XepPhongThi.list')->with(compact('arr_khoi', 'arr_hocky', 'id_namhoc', 'hocky', 'khoi', 'id_monthi', 'ngaythi', 'check_danhsachhocsinh', 'danhsach'));
    }
}
