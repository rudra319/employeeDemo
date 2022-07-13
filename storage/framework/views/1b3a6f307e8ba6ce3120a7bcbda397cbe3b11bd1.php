<?php $__env->startPush('dashboard_style'); ?>
<link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="row justify-content-center">
    <div class="col-md-9 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Countries</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form action="<?php echo e(route('countries.index')); ?>" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" id="search" class="form-control mb-2" id="inlineformInput" placeholder="Search">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="<?php echo e(route('countries.create')); ?>" class="float-right btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Country Code</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($countries->firstItem()+$loop->index); ?></th>
                        <td><?php echo e($country->name); ?></td>
                        <td><?php echo e($country->country_code); ?></td>
                        <td>
                            <a href="<?php echo e(route('countries.edit', $country)); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger"
                            onclick="deleteData(<?php echo e($country->id); ?>)"
                            >
                            <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-<?php echo e($country->id); ?>" action="<?php echo e(route('countries.destroy', $country)); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                  <?php echo e($countries->links()); ?>

              </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('dashboard_script'); ?>
<script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#userTable').DataTable();
} );
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/experiment/employeemanagement-master/resources/views/admin/pages/Country/index.blade.php ENDPATH**/ ?>