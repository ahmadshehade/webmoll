<?php $__env->startSection('content'); ?>
<section id="showSection" class="book_section layout_padding container" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Department Details')); ?></div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="department_name" class="col-md-4 col-form-label text-md-right" ><?php echo e(__('Department Name')); ?></label>

                            <div class="col-md-6">
                                <input id="department_name" type="text" class="form-control" name="department_name" value="<?php echo e($dep->department_name); ?>" readonly style="color:black">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employ_count" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Employ Count')); ?></label>

                            <div class="col-md-6">
                                <input id="employ_count" type="number" class="form-control" name="employ_count" value="<?php echo e($dep->employ_count); ?>" readonly style="color:black">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="floor_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Floor Name')); ?></label>

                            <div class="col-md-6">
                                <input id="floor_name" type="text" class="form-control" name="floor_name" value="<?php echo e($dep->floor_name); ?>" readonly style="color:black">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/departments/show.blade.php ENDPATH**/ ?>