<?php $__env->startSection('content'); ?>
<div style="position: relative;">
  <img src="<?php echo e(asset('flors/img/slider/slider1.jpg')); ?>" alt="" style="width:100%;height:50%"/>
  <div style="position: absolute; top: 44%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
    <h1>Floor Details</h1>
    <div class="form-group">
      <label for="floor_name" style="font-size:25px;color:darkgoldenrod">Floor Name:</label>
      <input type="text" class="form-control" value="<?php echo e($floor->floor_name); ?>" id="floor_name" readonly>
    </div>

    <div class="form-group">
      <label for="departments_count" style="font-size:25px;color:darkgoldenrod">Departments Count:</label>
      <input type="number" class="form-control" value="<?php echo e($floor->departments_count); ?>" id="departments_count" readonly>
    </div>

    <div class="form-group">
      <label for="departments_count" style="font-size:25px;color:darkgoldenrod">Moll Name:</label>
      <input type="text" class="form-control" value="<?php echo e($floor->mole->name); ?>" id="departments_count" readonly>
    </div>

    <a href="<?php echo e(route('floors.index')); ?>" class="btn btn-primary">Back</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/floors/show.blade.php ENDPATH**/ ?>