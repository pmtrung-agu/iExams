<?php $__env->startSection('title', 'Danh sách phòng thi'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="card-box">
    <div class="row">
        <div class="col-12 col-md-12">
            <h3 class="m-t-0"><i class="fas fa-clipboard-list text-primary"></i> Danh sách Phòng thi</h3>
            <form action="<?php echo e(env('APP_URL')); ?>admin/danh-sach-phong-thi" method="GET" id="danhsachphongthiform">
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Năm học</label>
                    <div class="col-12 col-md-2">
                        <select name="id_namhoc" id="id_namhoc" class="form-control" required>
                            <option value="">Loading....</option>
                        </select>
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
                    <label class="control-label col-md-2 text-right p-t-10">Ngày thi</label>
                    <div class="col-12 col-md-2">
                        <input type="text" name="ngaythi" id="ngaythi" value="<?php echo e($ngaythi); ?>" placeholder="Ngày thi" class="ngaythangnam form-control" required autocomplete="off" />
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Môn thi</label>
                    <div class="col-12 col-md-2">
                        <select name="id_monthi" id="id_monthi" class="form-control" required>
                            <option value="">Loading....</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Buổi thi</label>
                    <div class="col-12 col-md-2">
                        <select name="id_buoithi" id="id_buoithi" class="form-control select2">
                            <?php if($buoithi): ?>
                                <?php $__currentLoopData = $buoithi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bt['_id']); ?>" <?php if($bt['_id'] == $id_buoithi): ?> selected <?php endif; ?>><?php echo e($bt['ten']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-2 text-right p-t-10">Phòng thi</label>
                    <div class="col-12 col-md-2">
                        <select name="id_phongthi" id="id_phongthi" class="form-control select2">
                            <?php if($phongthi): ?>
                                <?php $__currentLoopData = $phongthi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pt['_id']); ?>" <?php if($pt['_id'] == $id_phongthi): ?> selected <?php endif; ?>><?php echo e($pt['ten']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="namhoc" id="namhoc" value="" placeholder="">
                <div class="row form-group">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="check_danhsach" value="LOAD" class="btn btn-info"><i class="fas fa-clipboard-check"></i> LOAD DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if($danhsach): ?>
<div class="row card-box">
    <div class="col-12 col-md-12">
        <table class="table table-sm table-border table-bordered table-striped table-hovered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>SBD</th>
                    <th>Họ tên</th>
                    <th>Phòng thi</th>
                    <th>Môn thi</th>
                    <th>Buổi thi</th>
                    <th>Lớp</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kds => $dsx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $pt = App\Models\DMPhongThi::find($dsx['id_phongthi']);
                    $bt = App\Models\DMBuoiThi::find($dsx['id_buoithi']);
                ?>                <tr>
                    <td class="text-center"><?php echo e($kds+1); ?></td>
                    <td class="text-center bold"><?php echo e($dsx['SBD']); ?></td>
                    <td><?php echo e($dsx['hoten']); ?></td>
                    <td class="text-center"><?php echo e($pt['ten']); ?></td>
                    <td class="text-center"><?php echo e($dsx['monthi']); ?></td>
                    <td class="text-center"><?php echo e($bt['ten']); ?></td>
                    <td class="text-center"><?php echo e($dsx['lophoc']); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/select2/select2.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/js/script.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();$("#check_danhsach").prop('disabled', true);
        jQuery(".ngaythangnam").datepicker({ format:"dd/mm/yyyy", autoclose:!0,todayHighlight:!0, orientation: 'bottom' });
        ngaythangnam();
        $.get("<?php echo e(env('APP_URL')); ?>admin/danh-muc/request-nam-hoc-option?id_namhoc=<?php echo e($id_namhoc); ?>", function(data){
            $("#id_namhoc").html(data);$("#id_namhoc").select2();
            var namhoc = $("#id_namhoc option:selected").text();
            $("#namhoc").val(namhoc);
        });
        $.get("<?php echo e(env('APP_URL')); ?>admin/danh-muc/request-mon-hoc-option?id_monthi=<?php echo e($id_monthi); ?>", function(data){
            $("#id_monthi").html(data);$("#id_monthi").select2();
            var monthi = $("#id_monthi option:selected").text();
            $("#monthi").val(monthi);$("#check_danhsach").prop('disabled', false);
        });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/XepPhongThi/danh-sach-phong-thi.blade.php ENDPATH**/ ?>