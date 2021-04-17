<?php $__env->startSection('title', 'Danh mục Phòng thi'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/phong-thi/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Phòng thi</h3>
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
            <?php if($phongthi): ?>
              <?php $__currentLoopData = $phongthi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($k+1); ?></td>
                  <td><?php echo e(isset($kh['ma']) ? $kh['ma'] : ''); ?></td>
                  <td><?php echo e($kh['ten']); ?></td>
                  <td><?php echo e($kh['so_cho']); ?></td>
                  <td><?php echo e(isset($kh['order']) ? $kh['order'] : ''); ?></td>
                  <td class="text-center"><?php echo e($kh['mota']); ?></td>
                  <td class="text-center">
                    
                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/phong-thi/delete/<?php echo e($kh['_id']); ?>" onClick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash text-danger"></i></a>
                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/phong-thi/edit/<?php echo e($kh['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
         </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/DMPhongThi/list.blade.php ENDPATH**/ ?>