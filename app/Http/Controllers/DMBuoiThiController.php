<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Models\XepPhongThi;
use App\Models\DMBuoiThi;
use Validator;
class DMBuoiThiController extends Controller
{
    //
    function index(){
        $buoithi = DMBuoiThi::orderBy('thutu', 'asc')->get()->toArray();
        return view('Admin.DMBuoiThi.list')->with(compact('buoithi'));
    }

    function add(){
        return view('Admin.DMBuoiThi.add');
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
            'ten' => 'required|unique:dm_buoi_thi'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL') .'admin/danh-muc/buoi-thi/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $id = ObjectController::Id();
        $db = new DMBuoiThi();
        $db->_id = $id;
        $db->ten = $data['ten'];
        $db->mota = $data['mota'];
        $db->thutu = isset($data['thutu']) ? intval($data['thutu']) : 0;
        $db->save();
        $querLog = array(
            'action' => 'Thêm mới buổi thi ['.$data['ten'].']',
            'id_collection' => $id,
            'collection' => 'dm_buoi_thi',
            'data' => $data
        );
        LogController::addLog($querLog);
        return redirect()->intended(env('APP_URL') . 'admin/danh-muc/buoi-thi');
    }

    function edit(Request $request, $id = ''){
        $buoithi = DMBuoiThi::find($id);
        return view('Admin.DMBuoiThi.edit')->with(compact('buoithi'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'ten' => 'required|unique:dm_buoi_thi,_id',$data['id']
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL') .'admin/danh-muc/buoi-thi/edit/'.$data['id'])->withErrors($validator)->withInput();
        }
        $db = DMBuoiThi::find($data['id']);
        $db->ten = $data['ten'];
        $db->mota = $data['mota'];
        $db->thutu = isset($data['thutu']) ? intval($data['thutu']) : 0;
        $db->save();
        $querLog = array(
            'action' => 'Chỉnh sửa buổi thi ['.$data['ten'].']',
            'id_collection' => ObjectController::ObjectId($data['id']),
            'collection' => 'dm_buoi_thi',
            'data' => $data
        );
        LogController::addLog($querLog);
        return redirect()->intended(env('APP_URL') . 'admin/danh-muc/buoi-thi');
    }

    function delete(Request $request, $id = ''){
        $data = DMBuoiThi::find($id);
        if(DMBuoiThi::destroy($id)){
            $querLog = array(
                'action' => 'Xóa khóa buổi thi ['.$data['ten'].']',
                'id_collection' => ObjectController::ObjectId($data['_id']),
                'collection' => 'buoi_thi',
                'data' => $data
            );
            LogController::addLog($querLog);
        }
        return redirect()->intended(env('APP_URL') . 'admin/buoi-thi');
    }

    static function check_dangky($id = ''){
        $id_buoithi = ObjectController::ObjectId($id);
        $check = XepPhongThi::where('id_dm_buoithi','=',$id_buoithi)->first();
        if($check) return true;
        else return false;
    }
}
