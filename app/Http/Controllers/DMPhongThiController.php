<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Models\DMPhongThi;
use Validator;

class DMPhongThiController extends Controller
{
    //
    function index(){
        $phongthi = DMPhongThi::orderBy('order', 'asc')->get()->toArray();
        return view('Admin.DMPhongThi.list')->with(compact('phongthi'));
    }

    function add(){
        return view('Admin.DMPhongThi.add');
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
            'ten' => 'required|unique:dm_phong_thi',
            'so_cho' => 'required:dm_phong_thi',
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL') .'admin/danh-muc/phong-thi/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $id = ObjectController::Id();
        $db = new DMPhongThi();
        $db->_id = $id;
        $db->ma = $data['ma'];
        $db->ten = $data['ten'];
        $db->so_cho = intval($data['so_cho']);
        $db->order = intval($data['order']);
        $db->mota = $data['mota'];
        $db->save();
        $querLog = array(
            'action' => 'Thêm mới phòng thi ['.$data['ten'].']',
            'id_collection' => $id,
            'collection' => 'dm_phong_thi',
            'data' => $data
        );
        LogController::addLog($querLog);
        return redirect()->intended(env('APP_URL') . 'admin/danh-muc/phong-thi');
    }

    function edit(Request $request, $id = ''){
        $phongthi = DMPhongThi::find($id);
        return view('Admin.DMPhongThi.edit')->with(compact('phongthi'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'ten' => 'required|unique:dm_phong_thi,_id',$data['id'],
            'so_cho' => 'required:dm_phong_thi',
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL') .'admin/danh-muc/phong-thi/edit/'.$data['id'])->withErrors($validator)->withInput();
        }
        $db = DMPhongThi::find($data['id']);
        $db->ma = $data['ma'];
        $db->ten = $data['ten'];
        $db->so_cho = intval($data['so_cho']);
        $db->order = intval($data['order']);
        $db->mota = $data['mota'];
        $db->save();
        $querLog = array(
            'action' => 'Chỉnh sửa phòng thi ['.$data['ten'].']',
            'id_collection' => ObjectController::ObjectId($data['id']),
            'collection' => 'dm_phong_thi',
            'data' => $data
        );
        LogController::addLog($querLog);
        return redirect()->intended(env('APP_URL') . 'admin/danh-muc/phong-thi');
    }

    function delete(Request $request, $id = ''){
        $data = DMPhongThi::find($id);
        if(PhongThi::destroy($id)){
            $querLog = array(
                'action' => 'Xóa khóa phòng thi ['.$data['ten'].']',
                'id_collection' => ObjectController::ObjectId($data['_id']),
                'collection' => 'dm_phong_thi',
                'data' => $data
            );
            LogController::addLog($querLog);
        }
        return redirect()->intended(env('APP_URL') . 'admin/danh_muc/phong-thi');
    }

    static function check_dangky($id = ''){
        $id_phongthi = ObjectController::ObjectId($id);
        $check = XepPhongThi::where('id_dm_phongthi','=',$id_phongthi)->first();
        if($check) return true;
        else return false;
    }
}
