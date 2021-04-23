<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Models\DanhSachHocSinh;
use Config;
class DanhSachHocSinhController extends Controller
{
    //
    function list(Request $request){
        $arr_khoi = Config::get('app.arr_khoi');
        $arr_hocky = Config::get('app.arr_hocky');
        $id_namhoc = $request->input('id_namhoc');
        $hocky = $request->input('hocky');
        $khoi = $request->input('khoi');
        if($id_namhoc && $hocky && $khoi){
            $id_namhoc = ObjectController::ObjectId($id_namhoc);
            $danhsach = DanhSachHocSinh::where('khoi', '=', $khoi)->where('id_namhoc', '=', $id_namhoc)->where('hocky','=',$hocky)->orderBy('ten', 'asc')->options(['collation' => ['locale' => 'vi','strength' => 1]])->get()->toArray();
        } else {
            $danhsach = '';
        }
        return view('Admin.DanhSachHocSinh.list')->with(compact('arr_khoi', 'arr_hocky', 'danhsach', 'id_namhoc', 'khoi', 'hocky'));
    }

    function update(Request $request){
        $data = $request->all();
        $id_hocsinh = $data['id_hocsinh'];
        $maso = $data['maso'];
        $id_lophoc = $data['id_lophoc'];
        $lophoc = $data['lophoc'];
        $hoten = $data['hoten'];
        $ten = $data['ten'];

        if($id_hocsinh){
            foreach($id_hocsinh as $key => $value){
                echo $value . '---' .  $ten[$key] . '<br />';
            }
        }
    }
}
