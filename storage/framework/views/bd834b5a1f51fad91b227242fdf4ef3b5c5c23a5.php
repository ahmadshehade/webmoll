<?php $__env->startSection('content'); ?>
<div class="container-md">

    <table class='table table-responsive-md' border="1px">
        <tr>
            <th>Basket Name</th>
            <th>Mony</th>
            <th>Product Count</th>
            <th>User name</th>
            <th>Product Name</th>
            <th>Actions</th>
        </tr>
        <?php $__currentLoopData = $baskets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
            <td><?php echo e($basket->name); ?></td>
            <td><?php echo e($basket->mony); ?></td>
            <td><?php echo e($basket->products_count); ?></td>
            <td><?php echo e($basket->user->name); ?></td>
            <td><?php echo e($basket->product_name); ?></td>
            <td>
                <?php if(Auth::check() && Auth::user()->id == $basket->user_id ||Auth::user()->role=="1"): ?>
                <a href="<?php echo e(route('baskets.show',['basket'=>$basket->id])); ?>" class="btn btn-outline-info" >Show</a>
                <?php endif; ?>
            </td>
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/baskets/alindex.blade.php ENDPATH**/ ?>