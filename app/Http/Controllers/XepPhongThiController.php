<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Models\DanhSachHocSinh;
use App\Models\XepPhongThi;
use App\Models\DMBuoiThi;
use App\Models\DMPhongThi;
use Config;

class XepPhongThiController extends Controller
{
    //
    function list(Request $request){
        $arr_khoi = Config::get('app.arr_khoi');
        $arr_hocky = Config::get('app.arr_hocky');
        $id_namhoc = $request->input('id_namhoc');
        $namhoc = $request->input('namhoc');
        $hocky = $request->input('hocky');
        $khoi = $request->input('khoi');
        $id_monthi = $request->input('id_monthi');
        $id_buoithi = $request->input('id_buoithi');
        $ngaythi = $request->input('ngaythi');
        if($id_namhoc && $hocky && $khoi && $ngaythi && $id_monthi && $id_buoithi){
            $id_namhoc = ObjectController::ObjectId($id_namhoc);
            $id_namhoc = ObjectController::ObjectId($id_namhoc);
            $danhsach = DanhSachHocSinh::where('id_namhoc','=',$id_namhoc)->where('hocky','=',$hocky)->where('khoi','=',$khoi)->get();
            $id_monthi = ObjectController::ObjectId($id_monthi);
            $id_buoithi = ObjectController::ObjectId($id_buoithi);
            $ngaythi_date = ObjectController::convertDateTime($ngaythi);
            $danhsachxep = XepPhongThi::where('id_namhoc', '=', $id_namhoc)
                ->where('hocky', '=', $hocky)
                ->where('khoi' , '=', $khoi)
                ->where('ngaythi', '=', $ngaythi_date)
                ->where('id_monthi', '=', $id_monthi)
                ->where('id_buoithi', '=', $id_buoithi)->get();
        } else {
            $danhsach = ''; $danhsachxep = '';
        }
        $buoithi = DMBuoiThi::orderBy('thutu', 'asc')->orderBy('updated', 'desc')->get();
        $phongthi = DMPhongThi::orderBy('thutu', 'asc')->orderBy('updated', 'desc')->get();
        return view('Admin.XepPhongThi.list')->with(compact('arr_khoi', 'arr_hocky', 'id_namhoc', 'namhoc', 'hocky', 'khoi', 'id_monthi', 'id_buoithi', 'ngaythi', 'danhsach', 'buoithi', 'phongthi', 'danhsachxep'));
    }

    function update(Request $request){
        $data = $request->all();
        $id_namhoc = $data['id_namhoc'];
        $namhoc = $data['namhoc'];
        $hocky = $data['hocky'];
        $khoi = $data['khoi'];
        $ngaythi = $data['ngaythi'];
        $id_monthi = $data['id_monthi'];
        $monthi = $data['monthi'];
        $id_buoithi = $data['id_buoithi'];

        $id_phongthi = $data['id_phongthi'];
        $so_cho = $data['so_cho'];
        /*$arr_phongthi = array();
        foreach($id_phongthi as $id_pt){
            $arr_phongthi[] = ObjectController::ObjectId($id_pt);
        }*/
        $id_buoithi = ObjectController::ObjectId($id_buoithi);
        $ngaythi_date = ObjectController::convertDateTime($ngaythi);
        //check phong thi
        //$check_phongthi = XepPhongThi::where('ngaythi', '=', $ngaythi_date)->where('id_buoithi', '=', $id_buoithi)->whereIn('id_phongthi', $arr_phongthi)->first();
        //if($check_phongthi){
        //    return redirect(env('APP_URL').'admin/xep-phong-thi?id_namhoc='.$id_namhoc.'&hocky='.$hocky.'&khoi='.$khoi.'&ngaythi='.$ngaythi.'&id_monthi='.$id_monthi.'&id_buoithi='.$id_buoithi.'&namhoc='.$namhoc.'&check_phongthi=1&submit=LOAD');
        //} else {
        $id_namhoc = ObjectController::ObjectId($id_namhoc);
        $id_monthi = ObjectController::ObjectId($id_monthi);
        $id_buoithi = ObjectController::ObjectId($id_buoithi);
        $danhsachhocsinh = DanhSachHocSinh::where('id_namhoc', '=', $id_namhoc)->where('hocky','=', $hocky)->where('khoi', '=', $khoi)->orderBy('SBD', 'asc')->get()->toArray();
        XepPhongThi::where('id_namhoc', '=', $id_namhoc)
            ->where('hocky', '=', $hocky)
            ->where('khoi' , '=', $khoi)
            ->where('ngaythi', '=', $ngaythi_date)
            ->where('id_monthi', '=', $id_monthi)
            ->where('id_buoithi', '=', $id_buoithi)->delete();
        if($so_cho){
            $stt = 0;
            foreach($so_cho as $key => $value){
                if($value){
                    for($i=0;$i<$value;$i++){
                        $db = new XepPhongThi();
                        $db->SBD = $danhsachhocsinh[$stt]['SBD'];
                        $db->id_danhsachhocsinh = ObjectController::ObjectId($danhsachhocsinh[$stt]['_id']);
                        $db->id_hocsinh = ObjectController::ObjectId($danhsachhocsinh[$stt]['id_hocsinh']);
                        $db->masohocsinh = $danhsachhocsinh[$stt]['masohocsinh'];
                        $db->khoi = $khoi;
                        $db->id_namhoc = ObjectController::ObjectId($id_namhoc);
                        $db->hocky = $hocky;
                        $db->ngaythi = $ngaythi_date;
                        $db->ngaythi_text = $ngaythi;
                        $db->id_monthi = ObjectController::ObjectId($id_monthi);
                        $db->monthi = $monthi;
                        $db->id_buoithi = ObjectController::ObjectId($id_buoithi);
                        $db->id_phongthi = ObjectController::ObjectId($id_phongthi[$key]);
                        $db->hoten = $danhsachhocsinh[$stt]['hoten'];
                        $db->ten = $danhsachhocsinh[$stt]['ten'];
                        $db->lophoc = $danhsachhocsinh[$stt]['lophoc'];
                        $db->save();
                        $stt++;
                    }
                }
            }
            $id = ObjectController::Id();
            $querLog = array(
                'action' => 'Xếp phòng thi [Khối '.$khoi.', Năm học '.$namhoc.', Học kỳ . '.$hocky.', Môn thi: '.$monthi.']',
                'id_collection' => $id,
                'collection' => 'iexams_xep_phong_thi',
                'data' => $data
            );
            LogController::addLog($querLog);
        }
        //}
        return redirect(env('APP_URL').'admin/xep-phong-thi?id_namhoc='.$id_namhoc.'&hocky='.$hocky.'&khoi='.$khoi.'&ngaythi='.$ngaythi.'&id_monthi='.$id_monthi.'&id_buoithi='.$id_buoithi.'&namhoc='.$namhoc.'&check_phongthi=0&submit=LOAD');
    }

    static function check_danhsachhocsinh($id_namhoc = '', $khoi = 0, $hocky = ''){
        $id_namhoc = ObjectController::ObjectId($id_namhoc);
        $check = DanhSachHocSinh::where('khoi', '=', $khoi)->where('id_namhoc', '=', $id_namhoc)->where('hocky','=',$hocky)->first();
        if($check) return true;
        return false;
    }

    static function check_monthi($id_namhoc= '', $hocky='', $khoi='', $id_monthi = ''){
        $id_namhoc = ObjectController::ObjectId($id_namhoc);
        $id_monthi = ObjectController::ObjectId($id_monthi);
        $check = XepPhongThi::where('id_namhoc', '=', $id_namhoc)->where('hocky', '=', $hocky)->where('khoi', '=', $khoi)->where('id_monthi','=', $id_monthi)->first();
        if($check) return true;
        else return false;
    }

    static function check_phongthi($ngaythi='', $id_buoithi='', $id_phongthi = ''){
        $id_buoithi = ObjectController::ObjectId($id_buoithi);
        $id_phongthi = ObjectController::ObjectId($id_phongthi);
        $ngaythi_date = ObjectController::convertDateTime($ngaythi);
        $check = XepPhongThi::where('ngaythi', '=', $ngaythi_date)->where('id_buoithi', '=', $id_buoithi)->where('id_phongthi', '=', $id_phongthi)->first();
        if($check) return true;
        else return false;
    }

    function delete(Request $request){
        $id_namhoc = $request->input('id_namhoc');
        $hocky = $request->input('hocky');
        $khoi = $request->input('khoi');
        $ngaythi = $request->input('ngaythi');
        $id_monthi = $request->input('id_monthi');
        $id_buoithi = $request->input('id_buoithi');
        $id_namhoc = ObjectController::ObjectId($id_namhoc);
        $id_monthi = ObjectController::ObjectId($id_monthi);
        $id_buoithi = ObjectController::ObjectId($id_buoithi);
        $ngaythi_date = ObjectController::convertDateTime($ngaythi);
        $id = ObjectController::Id();

        $data = XepPhongThi::where('id_namhoc', '=', $id_namhoc)
                ->where('hocky', '=', $hocky)
                ->where('khoi' , '=', $khoi)
                ->where('ngaythi', '=', $ngaythi_date)
                ->where('id_monthi', '=', $id_monthi)
                ->where('id_buoithi', '=', $id_buoithi)->get();
        $querLog = array(
            'action' => 'Xóa xếp phòng thi [Khối '.$khoi.', Năm học '.$data[0]['namhoc'].', Học kỳ . '.$hocky.', Ngày thi: '.$ngaythi.']',
            'id_collection' => $id,
            'collection' => 'iexams_xep_phong_thi',
            'data' => $data
        );
        LogController::addLog($querLog);
        XepPhongThi::where('id_namhoc', '=', $id_namhoc)
                ->where('hocky', '=', $hocky)
                ->where('khoi' , '=', $khoi)
                ->where('ngaythi', '=', $ngaythi_date)
                ->where('id_monthi', '=', $id_monthi)
                ->where('id_buoithi', '=', $id_buoithi)->delete();
        return redirect(env('APP_URL').'admin/xep-phong-thi?id_namhoc='.$id_namhoc.'&hocky='.$hocky.'&khoi='.$khoi.'&id_monthi='.$id_monthi.'&ngaythi='.$ngaythi.'&id_buoithi='.$id_buoithi.'&submit=LOAD');
    }

    function danh_sach_phong_thi(Request $request) {

    }
}
