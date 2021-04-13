<?php $__env->startSection('title', 'Danh mục năm học'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Danh mục năm học</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 card-box">
        <table id="data-table" class="table table-striped table-bordered table-hovered" style="font-size:12px;">
            <thead>
                <tr>
                    <th width="10">STT</th>
                    <th>Mã số Học sinh</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Nơi sinh</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#data-table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax" : '<?php echo e(env('APP_URL')); ?>admin/danh-muc/request-danh-sach-hoc-sinh'
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/Request/danh-sach-hoc-sinh.blade.php ENDPATH**/ ?>