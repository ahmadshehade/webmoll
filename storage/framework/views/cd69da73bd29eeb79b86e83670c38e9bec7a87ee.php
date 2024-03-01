<?php $__env->startSection('content'); ?>

<div class="container">
    
     <div class="row">
         <div class="col-lg-8">
            <section> <h1>Deleted Baskets</h1>
                <table class="table">
                    <thead>
                        <tr> <th>Name</th>
                         <th>Product Count</th>
                          <th>Product Name</th>
                           <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                     <tbody>
                         <?php $__currentLoopData = $baskets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <tr>
                            <td><?php echo e($basket->name); ?></td>
                            <td><?php echo e($basket->products_count); ?></td>
                            <td><?php echo e($basket->product_name); ?></td>
                            <td><?php echo e($basket->mony); ?></td>
                            <td>
                                <form action="<?php echo e(route('baskets.restore', $basket->id)); ?>" method="POST" style="display: inline">
                                    <?php echo csrf_field(); ?> <button type="submit" class="btn btn-success">Restore</button>
                                </form>
                                <form action="<?php echo e(route('baskets.hdelete', $basket->id)); ?>" method="POST" style="display: inline">
                                     <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                     <button type="submit" class="btn btn-danger">Delete Permanently</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                        </table>
                        <a href="<?php echo e(route('baskets.index')); ?>" class="btn btn-secondary">Back</a>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section> <img src="<?php echo e(asset('basketses/img3')); ?>"  width="300px" alt="Deleted Baskets Image">
                    </section>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/baskets/trash.blade.php ENDPATH**/ ?>