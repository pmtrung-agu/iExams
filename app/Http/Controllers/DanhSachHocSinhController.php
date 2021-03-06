<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
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
        //Single data
        $khoi = $data['khoi'];
        $id_namhoc = $data['id_namhoc'];
        $namhoc = $data['namhoc'];
        $hocky = $data['hocky'];
        //Array data
        $id_hocsinh = $data['id_hocsinh'];
        $hoten = $data['hoten'];
        $ten = $data['ten'];
        $maso = $data['maso'];
        $id_lophoc = $data['id_lophoc'];
        $lophoc = $data['lophoc'];
        $stt = 1;
        $id = ObjectController::Id();
        if($id_hocsinh){
            foreach($id_hocsinh as $key => $value){
                if(intval($khoi) < 10) {
                    $sdb_khoi = '0' . $khoi;
                } else {
                    $sdb_khoi = $khoi;
                }
                $db = new DanhSachHocSinh();
                $SBD = $sdb_khoi . ObjectController::number_str_cat($stt, 4);
                $db->SBD = $SBD;
                $db->id_hocsinh = ObjectController::ObjectId($value);
                $db->masohocsinh = $maso[$key];
                $db->khoi = $khoi;
                $db->id_lophoc = ObjectController::ObjectId($id_lophoc[$key]);
                $db->lophoc = $lophoc[$key];
                $db->hoten = $hoten[$key];
                $db->ten = $ten[$key];
                $db->id_namhoc = ObjectController::ObjectId($id_namhoc);
                $db->namhoc = $namhoc;
                $db->hocky = $hocky;
                $db->save();
                $stt++;
            }
        }
        $querLog = array(
            'action' => 'C???p nh???t ????nh s??? b??o danh [Kh???i '.$khoi.', N??m h???c '.$namhoc.', H???c k??? . '.$hocky.']',
            'id_collection' => $id,
            'collection' => 'iexams_danh_sach_hoc_sinh',
            'data' => $data
        );
        LogController::addLog($querLog);
        return redirect(env('APP_URL') . 'admin/danh-so-bao-danh?id_namhoc='.$id_namhoc.'&hocky='.$hocky.'&khoi='.$khoi.'&submit=LOAD');
    }

    function delete_danh_sach(Request $request){
        $id_namhoc = $request->input('id_namhoc');
        $khoi = $request->input('khoi');
        $hocky = $request->input('hocky');
        $id = ObjectController::Id();
        $id_namhoc = ObjectController::ObjectId($id_namhoc);
        $data = DanhSachHocSinh::where('id_namhoc', '=', $id_namhoc)->where('hocky', '=', $hocky)->where('khoi', '=', $khoi)->get()->toArray();
        $querLog = array(
            'action' => 'X??a danh s??ch SBD [Kh???i '.$data[0]['khoi'].', N??m h???c '.$data[0]['namhoc'].', H???c k??? '.$data[0]['hocky'].']',
            'id_collection' => $id,
            'collection' => 'iexams_danh_sach_hoc_sinh',
            'data' => $data
        );
        LogController::addLog($querLog);
        DanhSachHocSinh::where('id_namhoc', '=', $id_namhoc)->where('hocky', '=', $hocky)->where('khoi', '=', $khoi)->delete();
        return redirect(env('APP_URL') . 'admin/danh-so-bao-danh?id_namhoc='.$id_namhoc.'&hocky='.$hocky.'&khoi='.$khoi.'&submit=LOAD');
    }
}
