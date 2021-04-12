@extends('Admin.layout')
@section('title', 'Danh sách tài khoản')
@section('css')
  <link href="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  @endsection
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/user/add" class="btn btn-primary"><i class="mdi mdi-account-plus"></i></a> Danh sách tài khoản người dùng</h3>
      <table id="responsive-datatable" class="table table-bordered table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th data-sort-initial="true" data-toggle="true">STT</th>
            <th>Username</th>
            <th>Họ tên</th>
            <th>Đội Quản lý</th>
            <th>Quyền</th>
            <th class="text-center">Tình trạng</th>
            <th data-sort-ignore="true" class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          @if($users)
              @foreach($users as $key => $user)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ isset($user['username']) ? $user['username'] : '' }}</td>
                  <td>{{ isset($user['fullname']) ? $user['fullname'] : '' }}</td>
                  <td class="text-center">@if($user['id_dm_doiquanly']) {{ App\Http\Controllers\DMDoiQuanLyController::getDoi($user['id_dm_doiquanly']) }} @endif</td>
                  <td style="font-size:15px;" class="text-center">
                    @if(isset($user['roles']))
                      @foreach($user['roles'] as $role)
                        <span class="badge badge-pill badge-primary">{{ $roles[$role] }}</span>
                      @endforeach
                    @endif
                  </td>
                  <td class="text-center">
                    @if($user['active'] == 1)
                      <i class="mdi mdi-check-circle text-info"></i>
                    @else
                      <i class="mdi mdi-close-circle text-danger"></i>
                    @endif
                  </td>
                  <td class="text-center">
                    @if(in_array('Admin', $user['roles']))
                      <i class="fa fa-trash"></i>
                    @else
                      <a href="{{ env('APP_URL') }}admin/user/delete/{{ $user['_id'] }}" onclick="return confirm('Chắc chắn xóa?')" title="Xóa tài khoản người dùng"><i class="fa fa-trash text-danger"></i></a>
                    @endif
                      <a href="{{ env('APP_URL') }}admin/user/edit/{{ $user['_id'] }}" ><i class="fa fa-pencil-alt" title="Chỉnh sửa tài khoản người dùng"></i></a>
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
