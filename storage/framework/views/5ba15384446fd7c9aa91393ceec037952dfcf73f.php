<?php $__env->startSection('title', 'Đang xây dựng'); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card-box">
            <div class="text-center">
                <h1 class="text-error" style="font-size:40px;">Underconstruction</h1>
                <h3 class="text-uppercase text-danger mt-3">Đang xây dựng, vui lòng quay lại sau</h3>
                <a class="btn btn-primary" href="<?php echo e(env('APP_URL')); ?>admin"> Trở về trang chủ</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/dang-xay-dung.blade.php ENDPATH**/ ?>