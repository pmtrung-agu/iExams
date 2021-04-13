@extends('Admin.layout')
@section('title', 'Thêm danh mục Buổi thi')
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/danh-muc/buoi-thi" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Thêm danh mục Buổi thi</h3>
        <form action="{{ env('APP_URL') }}admin/danh-muc/buoi-thi/create" method="post" id="dinhkemform">
            {{ csrf_field() }}
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
                            <label class="control-label col-md-2 text-right p-t-10">Tên</label>
                            <div class="col-md-10">
                                <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên Buổi thi" value="{{ old('ten') }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Mô tả Buổi thi</label>
                            <div class="col-md-10">
                                <textarea id="mota" name="mota" class="form-control" placeholder="Mô tả Buổi thi">{{ old('mota') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Mô tả Buổi thi</label>
                            <div class="col-md-2">
                                <input type="number" id="thutu" name="thutu" class="form-control" placeholder="Thứ tự" value="{{ old('thutu') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <a href="{{ env('APP_URL') }}admin/danh-muc/buoi-thi" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection

