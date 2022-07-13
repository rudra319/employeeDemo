<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo e(env('APP_NAME')); ?></title>

    <?php echo $__env->make('admin.inc.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body>


    <div class="d-flex flex-column">

        <div id="content">
            <div class="container-fluid"> 
                <?php echo $__env->yieldContent('dashboard_content'); ?>
            </div>

        </div>

    </div>


    <?php echo $__env->make('admin.inc.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH /opt/lampp/htdocs/experiment/employeemanagement-master/resources/views/admin/layout/main.blade.php ENDPATH**/ ?>