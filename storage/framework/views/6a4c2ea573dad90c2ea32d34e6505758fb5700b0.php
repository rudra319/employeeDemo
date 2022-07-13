<?php $__env->startPush('dashboard_style'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div id="app">
    
    <router-view />
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('dashboard_script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/experiment/employeemanagement-master/resources/views/admin/pages/Employee/index.blade.php ENDPATH**/ ?>