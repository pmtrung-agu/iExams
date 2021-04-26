@extends('Admin.layout')
@section('title', 'Nhật ký')
@section('css')
    <link href="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Logs</h3>
        <hr />
        <table id="datatable" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%" style="font-size:11px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div id="logModal" class="modal fade bs-log-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Thông tin chi tiết Logs</h4>
      </div>
      <div class="modal-body" id="logBody" style="max-height:600px;overflow-y:scroll;">
        LOGS
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datatable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ env('APP_URL') }}admin/logs/datatable",
                "pageLength" : 25,
                "drawCallback": function( settings ) {
                  $(".get_log").click(function(){
                    var _this = $(this);
                    var url = _this.attr("href");
                    $.get(url, function(data){
                      $("#logBody").html(data);
                    })
                  });
                }
            });
        });
    </script>
@endsection
