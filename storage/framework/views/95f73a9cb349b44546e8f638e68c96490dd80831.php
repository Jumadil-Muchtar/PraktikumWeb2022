
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
        <div class="card bg-dark mt-5 mb-5" style="width: 55rem;">
            <div class="card-header bg-success text-white">Add Seller</div>
            <form action="<?php echo e(route('sellers.store')); ?>" method ="post">
                <?php echo csrf_field(); ?>
                <div class="form-group row pt-3">
                    <label for="name" class="col-sm-2 col-form-label text-white">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id='name'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="address" class="col-sm-2 col-form-label text-white">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id='address'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="no_hp" class="col-sm-2 col-form-label text-white">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_hp" id='no_hp'>
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label for="status" class="col-sm-2 col-form-label text-white">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" id='status'>
                    </div>
                </div>
                <fieldset class="pt-3 form-group bg-dark text-white">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male">
                                <label class="form-check-label" for="gender1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
                                <label class="form-check-label" for="gender2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class='pb-3 d-flex justify-content-end pt-3'>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vendor-app\resources\views/sellers/create.blade.php ENDPATH**/ ?>