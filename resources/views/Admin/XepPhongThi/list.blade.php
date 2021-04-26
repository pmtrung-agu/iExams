@extends('Admin.layout')
@section('title', 'Xếp phòng thi')
@section('css')
  <link href="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
<div class="card-box">
    <div class="row">
        <div class="col-12 col-md-12">
            <h3 class="m-t-0"><i class="fas fa-clipboard-list text-primary"></i> Xếp phòng thi</h3>
            <form action="{{ env('APP_URL') }}admin/xep-phong-thi" method="GET" id="dinhkemform">
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Năm học</label>
                    <div class="col-12 col-md-2">
                        <select name="id_namhoc" id="id_namhoc" class="form-control" required>
                            <option value="">Loading....</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Học kỳ</label>
                    <div class="col-12 col-md-2">
                        <select name="hocky" id="hocky" class="form-control select2">
                            @if($arr_hocky)
                                @foreach($arr_hocky as $key => $value)
                                    <option value="{{ $key }}" @if($key == $hocky) selected @endif>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Khối</label>
                    <div class="col-12 col-md-2">
                        <select name="khoi" id="khoi" class="form-control select2">
                            @if($arr_khoi)
                                @foreach($arr_khoi as $kh)
                                    <option value="{{ $kh }}" @if($kh == $khoi) selected @endif>{{ $kh }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Ngày thi</label>
                    <div class="col-12 col-md-2">
                        <input type="text" name="ngaythi" id="ngaythi" value="{{ $ngaythi }}" placeholder="Ngày thi" class="ngaythangnam form-control" required autocomplete="off" />
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Môn thi</label>
                    <div class="col-12 col-md-2">
                        <select name="id_monthi" id="id_monthi" class="form-control" required>
                            <option value="">Loading....</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Buổi thi</label>
                    <div class="col-12 col-md-2">
                        <select name="id_buoithi" id="id_buoithi" class="form-control select2">
                            @if($buoithi)
                                @foreach($buoithi as $bt)
                                    <option value="{{ $bt['_id'] }}" @if($bt['_id'] == $id_buoithi) selected @endif>{{ $bt['ten'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <input type="hidden" name="namhoc" id="namhoc" value="" placeholder="">
                <div class="row form-group">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="check_danhsach" value="LOAD" class="btn btn-info"><i class="fas fa-clipboard-check"></i> KIỂM TRA DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if($id_namhoc && $khoi && $hocky)
<div class="card-box">
    @if(App\Http\Controllers\XepPhongThiController::check_danhsachhocsinh($id_namhoc, $khoi, $hocky) == false)
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Chưa đánh Số báo danh [<a href="{{ env('APP_URL') }}admin/danh-so-bao-danh?id_namhoc={{ $id_namhoc }}&hocky={{ $hocky }}&khoi={{ $khoi }}&submit=LOAD">Đánh SBD</a>]</h3></div>
    @elseif(App\Http\Controllers\XepPhongThiController::check_monthi($id_namhoc, $hocky, $khoi, $id_monthi) == true)
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Đã xếp cho thi rồi [<a href="{{ env('APP_URL') }}admin/xep-phong-thi/delete?id_namhoc={{ $id_namhoc }}&hocky={{ $hocky }}&khoi={{ $khoi }}&id_monthi={{ $id_monthi }}&ngaythi={{ $ngaythi }}&id_buoithi={{ $id_buoithi }}">Xóa xếp lại</a>]</h3></div>
        @if($danhsachxep)
        ewqeq
        {{ var_dump($danhsachxep) }}
        @endif
    @elseif($danhsach)
        @if($phongthi)
        <form method="POST" action="{{ env('APP_URL') }}admin/xep-phong-thi/update" id="xepphongthiform">
            <input type="hidden" name="id_namhoc" value="{{ $id_namhoc }}" placeholder="">
            <input type="hidden" name="namhoc" value="{{ $namhoc }}" placeholder="">
            <input type="hidden" name="hocky" value="{{ $hocky }}" placeholder="">
            <input type="hidden" name="khoi" value="{{ $khoi }}" placeholder="">
            <input type="hidden" name="ngaythi" value="{{ $ngaythi }}" placeholder="">
            <input type="hidden" name="id_monthi" value="{{ $id_monthi }}" placeholder="">
            <input type="hidden" name="id_buoithi" value="{{ $id_buoithi }}" placeholder="">
            {{ csrf_field() }}
            <div class="alert alert-success">
                <h3>Số lượng học sinh: {{ $danhsach->count() }}  [Năm học: {{ $namhoc }}, Học kỳ: {{ $arr_hocky[$hocky] }}, Khối: {{ $khoi }}]</h3>
            </div>
            <table class="table table-sm table-border table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Phòng thi</th>
                        <th>Số chổ ngồi</th>
                        <th>Số lượng xếp</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($phongthi as $k => $pt)
                @if(App\Http\Controllers\XepPhongThiController::check_phongthi($ngaythi, $id_buoithi, $pt['_id']) == false)
                    <tr>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td>{{ $pt['ten'] }}</td>
                        <td class="text-center"><span class="badge badge-danger rounded-circle noti-icon-badge" style="font-size:15px;padding:10px;">{{ $pt['so_cho'] }}</span></td>
                        <td class="text-center" style="text-align:center;">
                            <input type="number" name="so_cho[]" value="" placeholder="Số lượng xếp" class="so_cho form-control" style="width:100px;padding:5px;margin:auto;" min="0" max="{{ $pt['so_cho'] }}"/>
                            <input type="hidden" name="id_phongthi[]" value="{{ $pt['_id'] }}" placeholder="ID Phòng thi">
                        </td>
                        <td>{{ $pt['ghithu'] }}</td>
                    </tr>
                @endif
                @endforeach
                </tbody>
            </table>
            <div class="alert alert-danger">
                <h3>Số lượng xếp: <span id="soluongxep">0</span></h3>
                <input type="hidden" name="soluonghocsinh" id="soluonghocsinh" value="{{ $danhsach->count() }}">
                <input type="hidden" name="soluongcho" id="soluongcho" value="" />
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="OK"><i class="fas fa-list-alt"></i> Xếp phòng</button>
        </form>
        @endif
    @else
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Không thể xếp phòng thi</h3></div>
    @endif
</div>
@endif
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/libs/select2/select2.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/js/script.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();$("#check_danhsach").prop('disabled', true);
        jQuery(".ngaythangnam").datepicker({ format:"dd/mm/yyyy", autoclose:!0,todayHighlight:!0, orientation: 'bottom' });
        ngaythangnam();
        $.get("{{ env('APP_URL') }}admin/danh-muc/request-nam-hoc-option?id_namhoc={{ $id_namhoc }}", function(data){
            $("#id_namhoc").html(data);$("#id_namhoc").select2();
            var namhoc = $("#id_namhoc option:selected").text();
            $("#namhoc").val(namhoc);
        });
        $.get("{{ env('APP_URL') }}admin/danh-muc/request-mon-hoc-option?id_monthi={{ $id_monthi }}", function(data){
            $("#id_monthi").html(data);$("#id_monthi").select2();
            var monthi = $("#id_monthi option:selected").text();
            $("#monthi").val(monthi);$("#check_danhsach").prop('disabled', false);
        });
        var $so_cho = $(".so_cho");
        if($so_cho.length > 0){
            jQuery(".so_cho").change(function(){
                var total = 0;
                jQuery(".so_cho").each(function(){
                    var sl = $(this).val();
                    if(sl){ total += parseInt(sl); }
                });
                jQuery("#soluongxep").text(total);
                jQuery("#soluongcho").val(total);
            });
        }
        jQuery("#xepphongthiform").submit(function(event){
            var soluonghocsinh = parseInt(jQuery("#soluonghocsinh").val());
            var soluongcho = jQuery("#soluongcho").val();
            if(soluonghocsinh != soluongcho){
                alert('Số lượng học sinh và số lượng chổ xếp không khớp.');
                return false;
                evenr.preventDefault();
            }
        });
    });
  </script>
@endsection
