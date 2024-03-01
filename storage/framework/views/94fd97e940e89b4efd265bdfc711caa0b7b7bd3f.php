<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Create New Investor</h1>
        <form action="<?php echo e(route('investors.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="investor_name">Investor Name:</label>
                <input type="text" name="investor_name" id="investor_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="floors">Related Floors:</label>
                <select name="floors[]" id="floors" class="form-control" multiple>
                    <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($floor->id); ?>"><?php echo e($floor->floor_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="departments">Related Departments:</label>
                <select name="departments[]" id="departments" class="form-control" multiple>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($department->id); ?>"><?php echo e($department->department_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/investors/create.blade.php ENDPATH**/ ?>