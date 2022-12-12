
<?php $__env->startSection('container-content'); ?>
    
    <div class="row pt-5 justify-content-center">
        <div class="card bg-dark" style="width: 55rem;">
            <div class="card-header bg-primary text-white">Products</div>
            <div class="table-responsive">
                <div class="table">
                <table class="table text-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Seller_id</th>
                        <th>Categoty_id</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                    <td> <?php echo e($loop->iteration); ?> </td>
                    <td> <?php echo e($item->name); ?> </td>
                    <td> <?php echo e($item->seller_id); ?> </td>
                    <td> <?php echo e($item->category_id); ?> </td>
                    <td> <?php echo e($item->price); ?> </td>
                    <td> <?php echo e($item->status); ?> </td>
                    <td>
                        Nanti
                    </td>
                </tbody>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <?php echo e($products->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vendor-app\resources\views/index.blade.php ENDPATH**/ ?>