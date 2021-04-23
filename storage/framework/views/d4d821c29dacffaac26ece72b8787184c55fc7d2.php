<?php $__env->startSection('title', 'Danh sách Học sinh'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><i class="far fa-address-card text-primary"></i> Danh sách Học sinh</h3>
            <form action="<?php echo e(env('APP_URL')); ?>admin/danh-so-bao-danh" method="GET" id="dinhkemform">
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Năm học</label>
                    <div class="col-12 col-md-2">
                        <select name="id_namhoc" id="id_namhoc" class="form-control" required><option value="">Loading....</option></select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Học kỳ</label>
                    <div class="col-12 col-md-2">
                        <select name="hocky" id="hocky" class="form-control select2">
                            <?php if($arr_hocky): ?>
                                <?php $__currentLoopData = $arr_hocky; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php if($key == $hocky): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Khối</label>
                    <div class="col-12 col-md-2">
                        <select name="khoi" id="khoi" class="form-control select2">
                            <?php if($arr_khoi): ?>
                                <?php $__currentLoopData = $arr_khoi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kh); ?>" <?php if($kh == $khoi): ?> selected <?php endif; ?>><?php echo e($kh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="submit" value="LOAD" class="btn btn-info"><i class=" fas fa-street-view"></i> XEM DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if($id_namhoc && $khoi && $hocky): ?>
<div class="card-box">
    <h3><i class="fa fa-users"></i> Danh sách học sinh</h3>
    <form action="<?php echo e(env('APP_URL')); ?>admin/danh-so-bao-danh/update" method="POST" id="danhsachform">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="id_namhoc" value="<?php echo e($id_namhoc); ?>" placeholder="">
        <input type="hidden" name="namhoc" id="namhoc" value="" placeholder="">
        <input type="hidden" name="khoi" value="<?php echo e($khoi); ?>" placeholder="">
        <input type="hidden" name="hocky" value="<?php echo e($hocky); ?>" placeholder="">
        <div class="row form-group">
            <div class="col-12 col-md-12">
                <?php if($danhsach): ?>
                    <div class="alert alert-danger">
                        <h3><i class="fas fa-info-circle"></i> Đã đánh số báo danh rồi..Số lượng: <?php echo e(count($danhsach)); ?> [Khối <?php echo e($khoi); ?>, Năm học <?php echo e($danhsach[0]['namhoc']); ?>, <?php echo e($arr_hocky[$hocky]); ?>]</h3>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-12">
                            <table class="table table-sm table-border table-bordered trable-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>SBD</th>
                                        <th>Mã số học sinh</th>
                                        <th>Họ tên</th>
                                        <th>Lớp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($stt); ?></td>
                                        <td class="text-center bold"><?php echo e($ds['SBD']); ?></td>
                                        <td class="text-center bold"><?php echo e($ds['masohocsinh']); ?></td>
                                        <td><?php echo e($ds['hoten']); ?></td>
                                        <td class="text-center"><?php echo e($ds['lophoc']); ?></td>
                                    </tr>
                                    <?php $stt++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-12 text-center">
                            <a href="<?php echo e(env('APP_URL')); ?>admin/danh-so-bao-danh/delete?<?php echo e(Request::getQueryString()); ?>" class="btn btn-danger" onclick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i> XÓA DANH SÁCH - ĐÁNH SỐ BÁO DANH LẠI</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div id="load-danh-sach">
                        <div class="text-center alert alert-info">
                            <h3><i class="mdi mdi-spin mdi-loading"></i> Đang LOAD Danh sách, vui lòng chờ</h3>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </form>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();
        $.get("<?php echo e(env('APP_URL')); ?>admin/danh-muc/request-nam-hoc-option?id_namhoc=<?php echo e($id_namhoc); ?>", function(data){
            $("#id_namhoc").html(data);$("#id_namhoc").select2();
            var namhoc = $("#id_namhoc option:selected").text();
            $("#namhoc").val(namhoc);
        });
        <?php if(!$danhsach && $id_namhoc && $khoi && $hocky): ?>
            $.get("<?php echo e(env('APP_URL')); ?>admin/danh-muc/request-danh-sach-hoc-sinh?id_namhoc=<?php echo e($id_namhoc); ?>&khoi=<?php echo e($khoi); ?>&hocky=<?php echo e($hocky); ?>", function(danhsach){
                $("#load-danh-sach").html(danhsach);
            });
        <?php endif; ?>

        

    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/DanhSachHocSinh/list.blade.php ENDPATH**/ ?>