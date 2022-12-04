
<?php $__env->startSection('container-content'); ?>
    
    <div class="row pt-5 justify-content-center">
        <div class="card bg-dark mb-5 mt-5" style="width: 55rem;">
            <div class="card-header bg-primary text-white">Permissions List</div>
            <div class="table-responsive">
                <div class="table">
                <table class="table text-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                    <td> <?php echo e($loop->iteration); ?> </td>
                    <td> <?php echo e($item->name); ?> </td>
                    <td> <?php echo e($item->description); ?> </td>
                    <td> <?php echo e($item->status); ?> </td>
                    <td> <?php echo e($item->created_at); ?> </td>
                    <td> <?php echo e($item->updated_at); ?> </td>
                    <td>
                        <form action="<?php echo e(route('permissions.destroy', $item->id)); ?>"method="POST">
                            <a class="btn btn-warning" href="<?php echo e(route('permissions.edit', $item->id)); ?>">Edit</a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tbody>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <?php echo e($permissions->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
            <div class="d-flex justify-content-end pt-5 pb-3">
                <a href="<?php echo e(route('permissions.create')); ?>" class='btn btn-success'>+ Add</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/permissions.blade.php ENDPATH**/ ?>