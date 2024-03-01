<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Product Details</h1>

    <table class="table">
        <tr>
            <th>Product Name</th>
            <td><?php echo e($product->product_name); ?></td>
        </tr>
        <tr>
            <th>Product price</th>
            <td><?php echo e($product->product_price); ?></td>
        </tr>
        <tr>
            <th>Department Name</th>
            <td><?php echo e($product->dep_name); ?></td>
        </tr>
        <tr>
        <th>Product Image</th>
        <td>
            <img src="<?php echo e(asset($product->image)); ?>"  style="max-width: 150px"</td>
        </tr>


        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary">Back  To Shopping </a>
        
      
    </table>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/products/show.blade.php ENDPATH**/ ?>