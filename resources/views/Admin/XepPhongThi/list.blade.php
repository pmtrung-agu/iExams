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
                    <div class="col-12 col-md-4">
                        <select name="id_monthi" id="id_monthi" class="form-control" required>
                            <option value="">Loading....</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="submit" value="LOAD" class="btn btn-info"><i class="fas fa-clipboard-check"></i> KIỂM TRA DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if($id_namhoc && $khoi && $hocky)
<div class="card-box">
    @if(!$check_danhsachhocsinh)
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Chưa đánh Số báo danh [<a href="">Đánh SBD</a>]</h3></div>
    @elseif($danhsach)

    @else

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
        $(".select2").select2();
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
            $("#monthi").val(monthi);
        });
    });
  </script>
@endsection
