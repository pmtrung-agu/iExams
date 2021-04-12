
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card-box text-center" style="height:100%;">
            <img src="<?php echo e(env('APP_URL')); ?>assets/images/cover.png" alt="" align="center" style="width:100%; max-width: 700px;">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/index.blade.php ENDPATH**/ ?>