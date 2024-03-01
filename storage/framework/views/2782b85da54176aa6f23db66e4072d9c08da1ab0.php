<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Investor Details</h1>
            </div>
            <div class="card-body">
                <h3 class="mb-3">Investor Name: <?php echo e($investor->investor_name); ?></h3>
                <div class="row">
                    <?php if(!$investor->floors==null): ?>
                    <div class="col-md-6">
                        <h4>Related Floors:</h4>
                        <ul class="list-group">
                            <?php $__currentLoopData = $investor->floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($floor->floor_name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(!$investor->departments ==null): ?>
                    <div class="col-md-6">

                        <h4>Related Departments:</h4>
                        <ul class="list-group">
                            <?php $__currentLoopData = $investor->departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($department->department_name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/investors/show.blade.php ENDPATH**/ ?>