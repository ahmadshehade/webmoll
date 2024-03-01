<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(count($errors)>0): ?>
    <span><?php echo e($errors); ?></span>
    <?php endif; ?>
    <h1>New Product</h1>

    <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="product_price">Product Price</label>
            <input type="number" name="product_price" id="product_price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dep_name">Department Name</label>
            <select name="dep_name" id="dep_name" class="form-control" required>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($department->department_name); ?>"><?php echo e($department->department_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/products/create.blade.php ENDPATH**/ ?>