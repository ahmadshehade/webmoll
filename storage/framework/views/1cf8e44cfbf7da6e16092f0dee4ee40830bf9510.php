<?php $__env->startSection('content'); ?>
<h1>Edit Basket</h1>
<form action="<?php echo e(route('baskets.update', $basket->id)); ?>" method="POST">
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>
<div class="form-group">
<label for="name">Name:</label>
<input type="text" name="name" id="name" class="form-control" value="<?php echo e($basket->name); ?>">
</div>
<div class="form-group">
<label for="products_count">Product Count:</label>
<input type="number" name="products_count" id="products_count" class="form-control" value="<?php echo e($basket->products_count); ?>" readonly>
</div>
<div class="form-group">
<label for="product_name">Product Name:</label>
<input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo e($basket->product_name); ?>" >
</div>
<div class="form-group">
<label for="mony">Price:</label>
<input type="number" name="mony" id="mony" class="form-control" value="<?php echo e($basket->mony); ?>">
</div>
<button type="submit" class="btn btn-primary">Update</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/baskets/edit.blade.php ENDPATH**/ ?>