@extends('Admin.layout')
@section('title', 'Danh mục Phòng thi')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/danh-muc/phong-thi/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Phòng thi</h3>
            <table id="responsive-datatable" class="table table-bordered table-bordered table-sm table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên Phòng thi</th>
                    <th>Số chỗ</th>
                    <th>Thứ tự</th>
                    <th>Mô tả</th>
                    <th class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
            @if($phongthi)
              @foreach($phongthi as $k => $kh)
                <tr>
                  <td>{{ $k+1 }}</td>
                  <td>{{ isset($kh['ma']) ? $kh['ma'] : ''}}</td>
                  <td>{{ $kh['ten'] }}</td>
                  <td>{{ $kh['so_cho'] }}</td>
                  <td>{{ isset($kh['order']) ? $kh['order'] : '' }}</td>
                  <td class="text-center">{{ $kh['mota'] }}</td>
                  <td class="text-center">
                    {{-- @if(App\Http\Controllers\PhongThiController::check_dangky($kh['_id']) == false)
                      <a href="{{ env('APP_URL') }}admin/phong-thi/delete/{{ $kh['_id'] }}" class="btn btn-danger btn-sm" onClick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i></a>
                    @endif--}}
                    <a href="{{ env('APP_URL') }}admin/phong-thi/delete/{{ $kh['_id'] }}" onClick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash text-danger"></i></a>
                    <a href="{{ env('APP_URL') }}admin/phong-thi/edit/{{ $kh['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
                  </td>
                </tr>
              @endforeach
            @endif
            </tbody>
         </table>
        </div>
    </div>
</div>
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
@endsection
