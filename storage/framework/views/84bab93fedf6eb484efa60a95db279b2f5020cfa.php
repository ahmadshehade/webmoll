<?php $__env->startSection('content'); ?>
<div style="position: relative;">
  <img src="<?php echo e(asset('flors/img/slider/slider1 - Copy.jpg')); ?>" alt="" style="width:100%;height:50%"/>
  <div style="position: absolute; top: 44%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
    <h1 style="color:rgb(165, 33, 177)">Update Floor</h1>
    <form method="POST" action="<?php echo e(route('floors.update', ['floor' => $floor->id])); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

      <div class="form-group">
        <label for="floor_name" style="font-size:25px;color:rgb(165, 33, 177);">Floor Name:</label>
        <input type="text" class="form-control" name="floor_name" id="floor_name" value="<?php echo e($floor->floor_name); ?>" required>
      </div>

      <div class="form-group">
        <label for="departments_count" style="font-size:25px;color:rgb(165, 33, 177);">Departments Count:</label>
        <input type="number" class="form-control" name="departments_count" id="departments_count" value="<?php echo e($floor->departments_count); ?>" required>
      </div>

      <div class="form-group">
        <label for="departments_count" style="font-size:25px;color:rgb(165, 33, 177);">Moll Name:</label>
        <input type="text" class="form-control" value="<?php echo e($floor->mole->name); ?>" id="departments_count" readonly>
      </div>

      <button type="submit" class="btn btn-warning">Update Floor</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/floors/edit.blade.php ENDPATH**/ ?>