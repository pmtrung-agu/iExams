@extends('Admin.layout')
@section('title', 'Danh mục Buổi thi')
@section('css')
  <link href="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/danh-muc/buoi-thi/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Buổi thi</h3>
            <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive  table-sm nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Buổi thi</th>
                    <th>Mô tả</th>
                    <th>Thứ tự</th>
                    <th class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
            @if($buoithi)
              @foreach($buoithi as $k => $kh)
                <tr>
                  <td>{{ $k+1 }}</td>
                  <td>{{ $kh['ten'] }}</td>
                  <td class="text-center">{{ $kh['mota'] }}</td>
                  <td class="text-center">{{ isset($kh['thutu']) ? $kh['thutu'] : 0 }}</td>
                  <td class="text-center">
                    {{-- @if(App\Http\Controllers\DMBuoiThiController::check_dangky($kh['_id']) == false)
                      <a href="{{ env('APP_URL') }}admin/buoi-thi/delete/{{ $kh['_id'] }}" class="btn btn-danger btn-sm" onClick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i></a>
                    @endif --}}
                    <a href="{{ env('APP_URL') }}admin/danh-muc/buoi-thi/delete/{{ $kh['_id'] }}" onClick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash text-danger"></i></a>
                    <a href="{{ env('APP_URL') }}admin/danh-muc/buoi-thi/edit/{{ $kh['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
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
  <script src="{{ env('APP_URL') }}assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
@endsection
