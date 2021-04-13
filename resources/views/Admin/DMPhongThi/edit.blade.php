@extends('Admin.layout')
@section('title', 'chỉnh sửa Danh mục Phòng thi')
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/danh-muc/phong-thi" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Chỉnh sửa Danh mục Phòng thi</h3>
        <form action="{{ env('APP_URL') }}admin/danh-muc/phong-thi/update" method="post" id="dinhkemform">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{ $phongthi['_id'] }}">
            <div class="form-body">
                <hr />
                @if($errors->any())
                    <div class="alert alert-success">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Mã</label>
                            <div class="col-md-4">
                                <input type="text" id="ma" name="ma" class="form-control" placeholder="Mã" value="{{ old('ma') != null ? old('ma') : $phongthi['ma'] }}" required />
                            </div>
                            <label class="control-label col-md-2 text-right p-t-10">Tên</label>
                            <div class="col-md-4">
                                <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên Phòng thi" value="{{ old('ten') != null ? old('ten') : $phongthi['ten'] }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Số lượng máy tính</label>
                            <div class="col-md-4">
                                <input type="text" id="so_cho" name="so_cho" class="form-control" placeholder="Số chổ ngồi" value="{{ old('somay') != null ? old('so_cho') : $phongthi['so_cho'] }}" required />
                            </div>
                            <label class="control-label col-md-2 text-right p-t-10">Thứ tự</label>
                            <div class="col-md-4">
                                <input type="text" id="order" name="order" class="form-control" placeholder="Thứ tự" value="{{ old('order') != null ? old('order') : $phongthi['order'] }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Mô tả Môn học</label>
                            <div class="col-md-10">
                                <textarea id="mota" name="mota" class="form-control" placeholder="Mô tả Môn học">{{ old('mota') != null ? old('mota') : $phongthi['mota'] }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <a href="{{ env('APP_URL') }}admin/danh-muc/phong-thi" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection
