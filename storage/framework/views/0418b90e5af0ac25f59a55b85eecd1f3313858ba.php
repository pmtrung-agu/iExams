<?php $__env->startSection('title', 'Xếp phòng thi'); ?>
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
            <h3 class="m-t-0"><i class="fas fa-clipboard-list text-primary"></i> Xếp phòng thi</h3>
            <form action="<?php echo e(env('APP_URL')); ?>admin/xep-phong-thi" method="GET" id="dinhkemform">
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
                <input type="hidden" name="namhoc" id="namhoc" value="" placeholder="">
                <div class="row form-group">
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" id="check_danhsach" value="LOAD" class="btn btn-info"><i class="fas fa-clipboard-check"></i> KIỂM TRA DANH SÁCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if($id_namhoc && $khoi && $hocky): ?>
<div class="card-box">
    <?php if(App\Http\Controllers\XepPhongThiController::check_danhsachhocsinh($id_namhoc, $khoi, $hocky) == false): ?>
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Chưa đánh Số báo danh [<a href="<?php echo e(env('APP_URL')); ?>admin/danh-so-bao-danh?id_namhoc=<?php echo e($id_namhoc); ?>&hocky=<?php echo e($hocky); ?>&khoi=<?php echo e($khoi); ?>&submit=LOAD">Đánh SBD</a>]</h3></div>
    <?php elseif(App\Http\Controllers\XepPhongThiController::check_monthi($id_namhoc, $hocky, $khoi, $id_monthi) == true): ?>
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Đã xếp cho thi rồi [<a href="<?php echo e(env('APP_URL')); ?>admin/xep-phong-thi/delete?id_namhoc=<?php echo e($id_namhoc); ?>&hocky=<?php echo e($hocky); ?>&khoi=<?php echo e($khoi); ?>&id_monthi=<?php echo e($id_monthi); ?>&ngaythi=<?php echo e($ngaythi); ?>&id_buoithi=<?php echo e($id_buoithi); ?>">Xóa xếp lại</a>]</h3></div>
        <?php if($danhsachxep): ?>
        ewqeq
        <?php echo e(var_dump($danhsachxep)); ?>

        <?php endif; ?>
    <?php elseif($danhsach): ?>
        <?php if($phongthi): ?>
        <form method="POST" action="<?php echo e(env('APP_URL')); ?>admin/xep-phong-thi/update" id="xepphongthiform">
            <input type="hidden" name="id_namhoc" value="<?php echo e($id_namhoc); ?>" placeholder="">
            <input type="hidden" name="namhoc" value="<?php echo e($namhoc); ?>" placeholder="">
            <input type="hidden" name="hocky" value="<?php echo e($hocky); ?>" placeholder="">
            <input type="hidden" name="khoi" value="<?php echo e($khoi); ?>" placeholder="">
            <input type="hidden" name="ngaythi" value="<?php echo e($ngaythi); ?>" placeholder="">
            <input type="hidden" name="id_monthi" value="<?php echo e($id_monthi); ?>" placeholder="">
            <input type="hidden" name="id_buoithi" value="<?php echo e($id_buoithi); ?>" placeholder="">
            <?php echo e(csrf_field()); ?>

            <div class="alert alert-success">
                <h3>Số lượng học sinh: <?php echo e($danhsach->count()); ?>  [Năm học: <?php echo e($namhoc); ?>, Học kỳ: <?php echo e($arr_hocky[$hocky]); ?>, Khối: <?php echo e($khoi); ?>]</h3>
            </div>
            <table class="table table-sm table-border table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Phòng thi</th>
                        <th>Số chổ ngồi</th>
                        <th>Số lượng xếp</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $phongthi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(App\Http\Controllers\XepPhongThiController::check_phongthi($ngaythi, $id_buoithi, $pt['_id']) == false): ?>
                    <tr>
                        <td class="text-center"><?php echo e($k+1); ?></td>
                        <td><?php echo e($pt['ten']); ?></td>
                        <td class="text-center"><span class="badge badge-danger rounded-circle noti-icon-badge" style="font-size:15px;padding:10px;"><?php echo e($pt['so_cho']); ?></span></td>
                        <td class="text-center" style="text-align:center;">
                            <input type="number" name="so_cho[]" value="" placeholder="Số lượng xếp" class="so_cho form-control" style="width:100px;padding:5px;margin:auto;" min="0" max="<?php echo e($pt['so_cho']); ?>"/>
                            <input type="hidden" name="id_phongthi[]" value="<?php echo e($pt['_id']); ?>" placeholder="ID Phòng thi">
                        </td>
                        <td><?php echo e($pt['ghithu']); ?></td>
                    </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="alert alert-danger">
                <h3>Số lượng xếp: <span id="soluongxep">0</span></h3>
                <input type="hidden" name="soluonghocsinh" id="soluonghocsinh" value="<?php echo e($danhsach->count()); ?>">
                <input type="hidden" name="soluongcho" id="soluongcho" value="" />
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="OK"><i class="fas fa-list-alt"></i> Xếp phòng</button>
        </form>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-danger"><h3><i class="fas fa-angry"></i> Không thể xếp phòng thi</h3></div>
    <?php endif; ?>
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
        var $so_cho = $(".so_cho");
        if($so_cho.length > 0){
            jQuery(".so_cho").change(function(){
                var total = 0;
                jQuery(".so_cho").each(function(){
                    var sl = $(this).val();
                    if(sl){ total += parseInt(sl); }
                });
                jQuery("#soluongxep").text(total);
                jQuery("#soluongcho").val(total);
            });
        }
        jQuery("#xepphongthiform").submit(function(event){
            var soluonghocsinh = parseInt(jQuery("#soluonghocsinh").val());
            var soluongcho = jQuery("#soluongcho").val();
            if(soluonghocsinh != soluongcho){
                alert('Số lượng học sinh và số lượng chổ xếp không khớp.');
                return false;
                evenr.preventDefault();
            }
        });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iExams\resources\views/Admin/XepPhongThi/list.blade.php ENDPATH**/ ?>