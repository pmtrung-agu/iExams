@extends('Admin.layout')
@section('title', 'Danh mục năm học')
@section('css')
<link href="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="{{ env('APP_URL') }}assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Danh mục năm học</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 card-box">
        <table id="data-table" class="table table-striped table-bordered table-hovered" style="font-size:12px;">
            <thead>
                <tr>
                    <th width="10">STT</th>
                    <th>Tên</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{ env('APP_URL') }}assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#data-table').dataTable({
            "ajax" : '{{ env('APP_URL') }}admin/danh-muc/request-nam-hoc'
        });
    });
</script>
@endsection
