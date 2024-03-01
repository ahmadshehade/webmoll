<?php $__env->startSection('content'); ?>
    <h1>ُEdit Product</h1>

    <form action="<?php echo e(route('product.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo e($product->product_name); ?>" required>
        </div>

        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="number" name="product_price" id="product_price" class="form-control" value="<?php echo e($product->product_price); ?>" required>
        </div>

        <div class="form-group">
            <label for="dep_name">Department Name</label>
            <select name="dep_name" id="dep_name" class="form-control" required>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($department->department_name); ?>" <?php echo e($department->department_name == $product->dep_name ? 'selected' : ''); ?>><?php echo e($department->department_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/products/edit.blade.php ENDPATH**/ ?>