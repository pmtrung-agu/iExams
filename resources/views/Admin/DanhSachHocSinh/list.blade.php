@extends('Admin.layout')
@section('title', 'Danh sách Học sinh')
@section('css')
  <link href="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><i class="far fa-address-card text-primary"></i> Danh sách Học sinh</h3>
            <form action="{{ env('APP_URL') }}admin/danh-so-bao-danh" method="GET" id="dinhkemform">
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Năm học</label>
                    <div class="col-12 col-md-2">
                        <select name="id_namhoc" id="id_namhoc" class="form-control" required><option value="">Loading....</option></select>
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
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="load_danhsach" value="LOAD" class="btn btn-info"><i class=" fas fa-street-view"></i> XEM DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if($id_namhoc && $khoi && $hocky)
<div class="card-box">
    <h3><i class="fa fa-users"></i> Danh sách học sinh</h3>
    <form action="{{ env('APP_URL') }}admin/danh-so-bao-danh/update" method="POST" id="danhsachform">
        {{ csrf_field() }}
        <input type="hidden" name="id_namhoc" value="{{ $id_namhoc }}" placeholder="">
        <input type="hidden" name="namhoc" id="namhoc" value="" placeholder="">
        <input type="hidden" name="khoi" value="{{ $khoi }}" placeholder="">
        <input type="hidden" name="hocky" value="{{ $hocky }}" placeholder="">
        <div class="row form-group">
            <div class="col-12 col-md-12">
                @if($danhsach)
                    <div class="alert alert-danger">
                        <h3><i class="fas fa-info-circle"></i> Đã đánh số báo danh rồi..Số lượng: {{ count($danhsach) }} [Khối {{ $khoi }}, Năm học {{ $danhsach[0]['namhoc'] }}, {{ $arr_hocky[$hocky] }}]</h3>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-12">
                            <table class="table table-sm table-border table-bordered trable-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>SBD</th>
                                        <th>Mã số học sinh</th>
                                        <th>Họ tên</th>
                                        <th>Lớp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $stt = 1; @endphp
                                    @foreach($danhsach as $ds)
                                    <tr>
                                        <td class="text-center">{{ $stt }}</td>
                                        <td class="text-center bold">{{ $ds['SBD'] }}</td>
                                        <td class="text-center bold">{{ $ds['masohocsinh'] }}</td>
                                        <td>{{ $ds['hoten'] }}</td>
                                        <td class="text-center">{{ $ds['lophoc'] }}</td>
                                    </tr>
                                    @php $stt++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-12 text-center">
                            <a href="{{ env('APP_URL') }}admin/danh-so-bao-danh/delete?{{ Request::getQueryString() }}" class="btn btn-danger" onclick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i> XÓA DANH SÁCH - ĐÁNH SỐ BÁO DANH LẠI</a>
                        </div>
                    </div>
                @else
                    <div id="load-danh-sach">
                        <div class="text-center alert alert-info">
                            <h3><i class="mdi mdi-spin mdi-loading"></i> Đang LOAD Danh sách, vui lòng chờ</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </form>
</div>
@endif
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/libs/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();$("#load_danhsach").prop("disabled", true);
        $.get("{{ env('APP_URL') }}admin/danh-muc/request-nam-hoc-option?id_namhoc={{ $id_namhoc }}", function(data){
            $("#id_namhoc").html(data);$("#id_namhoc").select2();
            var namhoc = $("#id_namhoc option:selected").text();
            $("#namhoc").val(namhoc); $("#load_danhsach").prop("disabled", false);
        });
        @if(!$danhsach && $id_namhoc && $khoi && $hocky)
            $.get("{{ env('APP_URL') }}admin/danh-muc/request-danh-sach-hoc-sinh?id_namhoc={{ $id_namhoc }}&khoi={{ $khoi }}&hocky={{ $hocky }}", function(danhsach){
                $("#load-danh-sach").html(danhsach);
            });
        @endif

        {{-- $('#id_namhoc').select2({
            placeholder: "Chọn năm học",
            ajax: {
                url: "{{ env('APP_URL') }}admin/danh-muc/request-nam-hoc-option?id_namhoc={{ $id_namhoc }}",
                dataType: 'json'
            }
        }); --}}

    });
  </script>
@endsection

