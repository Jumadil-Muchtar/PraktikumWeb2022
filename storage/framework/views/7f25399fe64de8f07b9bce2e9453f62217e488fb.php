
<?php $__env->startSection('container-content'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Please fill the form correctly!</strong><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    
    <div class="row pt-5 justify-content-center">
        <div class="card bg-dark mb-5 mt-5" style="width: 55rem;">
            <div class="card-header bg-warning text-white">Edit Category</div>
            <form action="<?php echo e(route('categories.update', $category->id)); ?>" method ="post">
                <?php echo csrf_field(); ?>

                <?php echo method_field("PATCH"); ?>
                <div class="form-group row pt-3">
                    <label for="name" class="col-sm-2 col-form-label text-white">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id='name' value='<?php echo e($category->name); ?>'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="status" class="col-sm-2 col-form-label text-white">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" id='status' value='<?php echo e($category->status); ?>'>
                    </div>
                </div>
                <div class='pb-3 d-flex justify-content-end pt-5'>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vendor-app\resources\views/categories/edit.blade.php ENDPATH**/ ?>