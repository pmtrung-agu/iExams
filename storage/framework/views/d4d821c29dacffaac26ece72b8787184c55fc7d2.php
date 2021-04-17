<?php $__env->startSection('title', 'Danh sách Học sinh'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<?php
    $id_namhoc = Request::input('id_namhoc');
?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><i class="far fa-address-card text-primary"></i> Danh sách Học sinh</h3>
            <form action="<?php echo e(env('APP_URL')); ?>admin/danh-so-bao-danh" method="GET" id="dinhkemform">
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Năm học</label>
                    <div class="col-12 col-md-2">
                        <select name="id_namhoc" id="id_namhoc" class="form-control" required></select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Học kỳ</label>
                    <div class="col-12 col-md-2">
                        <select name="hocky" id="hocky" class="form-control select2">
                            <?php if($arr_hocky): ?>
                                <?php $__currentLoopData = $arr_hocky; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Khối</label>
                    <div class="col-12 col-md-2">
                        <select name="khoi" id="khoi" class="form-control select2">
                            <?php if($arr_khoi): ?>
                                <?php $__currentLoopData = $arr_khoi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $khoi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($khoi); ?>"><?php echo e($khoi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-primary"><i class="fas fa-list-ol"></i> ĐÁNH SỐ BÁO DANH</button>
                        <button type="submit" name="submit" id="submit" value="LOAD" class="btn btn-info"><i class=" fas fa-street-view"></i> XEM DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();
        $('#id_namhoc').select2({
            placeholder: "Chọn năm học",
            ajax: {
                url: "<?php echo e(env('APP_URL')); ?>admin/danh-muc/request-nam-hoc-option?id_namhoc=<?php echo e($id_namhoc); ?>",
                dataType: 'json'
            }
        });
        $("#id_namhoc").select2("trigger", "select", {
            data: { id: "<?php echo e($id_namhoc); ?>", text : "Namhochoc" }
        });
    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/DanhSachHocSinh/list.blade.php ENDPATH**/ ?>