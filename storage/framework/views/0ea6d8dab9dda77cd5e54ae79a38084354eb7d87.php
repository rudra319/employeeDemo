    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('admin/js/sb-admin-2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iziToast.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.js"></script>
    <script src="<?php echo e(mix('js/script.js')); ?>"></script>
    <?php echo $__env->make('vendor.lara-izitoast.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('dashboard_script'); ?>
<?php /**PATH /opt/lampp/htdocs/experiment/employeemanagement-master/resources/views/admin/inc/script.blade.php ENDPATH**/ ?>