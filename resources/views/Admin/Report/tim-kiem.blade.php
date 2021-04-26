@extends('Admin.layout')
@section('title', 'Tìm kiếm tất cả hệ thống')
@section('body')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card-box">
            <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Tìm kiếm thông tin</h3>
            <form method="GET" action="{{ env('APP_URL') }}admin/tim-kiem" id="SearchForm">
                <div class="row form-group">
                    <div class="col-12 col-md-10">
                        <input type="text" name="keywords" value="{{ $keywords }}" id="keywords" placeholder="Từ khóa tìm kiếm" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <hr />
            @if($bienban)
                <h3><i class="fa fa-search"></i> Kết quả tìm kiếm - Biên bản</h3>
                <table class="table table-border table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số</th>
                        <th>Quyển số</th>
                        <th>Tổ chức/Cá nhân</th>
                        <th>Hành vi vi phạm</th>
                        <th>Ngày giờ</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bienban as $key => $ds)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="text-center"><a href="{{ env('APP_URL') }}admin/thanh-tra/bien-ban/chi-tiet/{{ $ds['_id'] }}" class="chitietbienban" data-toggle="modal" data-target="#ChiTietBienBanModal"><b>{{ $ds['so_bien_ban'] }}</b></a></td>
                            <td class="text-center"><b>{{ $ds['so_quyen'] }}</b></td>
                            <td>{{ $ds['ho_ten_cn'] }}</td>
                            <td>{{ $ds['hanh_vi_vi_pham'] }}</td>
                            <td class="text-center">{{ $ds['ngay_gio'] }}</td>
                            <td class="text-center">
                                @if($ds['tinh_trang'] == 1)
                                    <span class="badge badge-success"><i class="fas fa-check-circle"></i> Đã xử lý</span>
                                @elseif($ds['ngay_gio_date'] && App\Http\Controllers\ObjectController::check_date($ds['ngay_gio_date']['date'], $ds['thoi_han']))
                                    <span class="badge badge-danger"><i class="fas fa-frown"></i> Quá hạn</span>
                                @else
                                    <span class="badge badge-info"><i class="fas fa-calendar-alt"></i> Chờ xử lý</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="ChiTietBienBanModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myExtraLargeModalLabel">Chi tiết Biên bản</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="chitietbienban_html">
                Nội dung chi tiết Biên bản
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".chitietbienban").click(function(){
                var path = $(this).attr("href");
                $.get(path, function(data){
                    $("#chitietbienban_html").html(data);
                });
            });
        });
    </script>
@endsection
