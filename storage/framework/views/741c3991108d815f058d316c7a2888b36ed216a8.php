<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title'); ?> | Hệ thống quản lý Khảo thí trực Tuyến - Trường PTTH Sư phạm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Hệ thống quản lý Khảo thí trực Tuyến - Trường PTTH Sư phạm" name="description" />
        <meta content="Phan Minh Trung - trungminhphan@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(env('APP_URL')); ?>assets/images/favicon.ico">
        <?php $__env->startSection('css'); ?> <?php echo $__env->yieldSection(); ?>
        <!-- App css -->
        <link href="<?php echo e(env('APP_URL')); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Navigation Bar-->
        <header id="topnav" style="background-color:#0072c6;">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/images/logo-sm.png" alt="<?php echo e(Session::get('user.name')); ?>" alt="<?php echo e(Session::get('user.username')); ?>" class="rounded-circle">
                                <span class="pro-user-name ml-1"><?php echo e(Session::get('user.username')); ?><i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                
                                <a href="<?php echo e(env('APP_URL')); ?>admin/user" class="dropdown-item notify-item">
                                    <i class="fe-user"></i> <span>Quản lý tài khoản</span>
                                </a>
                                
                                <a href="<?php echo e(env('APP_URL')); ?>auth/logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i> <span>Đăng xuất</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="<?php echo e(env('APP_URL')); ?>admin" class="logo text-center">
                            <span class="logo-lg">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/images/logo.png" title="Hệ thống quản lý Khảo thí trực Tuyến - Trường PTTH Sư phạm" height="34">
                            </span>
                            <span class="logo-sm">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/images/logo-sm.png" alt="" height="26">
                            </span>
                        </a>
                    </div>
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->
            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li><a href="<?php echo e(env('APP_URL')); ?>"><i class="fa fa-home"></i> HOME</a></li>
                            
                            <li class="has-submenu">
                                <a href="#"><i class="icon-layers"></i> Danh mục<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nam-hoc">Năm học</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/khoi">Khối</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/danh-sach-hoc-sinh">Danh sách Học sinh</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/mon-hoc">Môn học</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/buoi-thi">Buổi thi</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/phong-thi">Phòng thi</a></li>
                                </ul>
                            </li>
                            
                            
                            <li class="has-submenu">
                                <a href="#"><i class="fas fa-users"></i> Thanh tra<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li class="has-submenu"><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bien-ban">Biên bản <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bien-ban">Tất cả</a></li>
                                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bien-ban/cho-xu-ly">Chờ xử lý</a></li>
                                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bien-ban/da-xu-ly">Đã xử lý</a></li>
                                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bien-ban/qua-han">Quá hạn</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bao-cao">Báo cáo</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/so-theo-doi-xu-ly-vi-pham">Sổ Theo dõi xử lý vi phạm</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/thanh-tra/bao-cao-cong-trinh-giao-thong">Báo cáo công tác Thanh tra, Kiểm tra CTGT</a></li>
                                </ul>
                            </li>
                            
                            
                            
                            <li class="has-submenu">
                                <a href="#"><i class="fas fa-truck-moving"></i> Vận tải<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/van-tai/cap-phu-hieu">Cấp Phù hiệu</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/van-tai/bao-cao">Báo cáo</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/van-tai/so-theo-doi-cap-phu-hieu">Sổ Theo dõi Cấp phù hiệu</a></li>
                                </ul>
                            </li>
                            
                            
                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/tim-kiem"><i class="fa fa-search"></i> Tìm kiếm</a></li>
                            
                            <li class="has-submenu">
                                <a href="#"><i class="icon-chart"></i>Thống kê <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/logs">Logs</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                        <!-- End navigation menu -->
                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container-fluid">
                <!-- start page title -->
                <?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
        <!-- end wrapper -->
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
          <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        &copy; 2020 Hệ thống quản lý Xử lý Hành chính lĩnh vực Giao thông Vận tải - Sở Giao thông Vận tải
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
        <!-- Vendor js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/js/vendor.min.js"></script>
        <?php $__env->startSection('js'); ?> <?php echo $__env->yieldSection(); ?>
        <!-- App js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/js/app.min.js"></script>
    </body>
</html>
<?php /**PATH C:\wamp64\www\iExams\resources\views/layout.blade.php ENDPATH**/ ?>