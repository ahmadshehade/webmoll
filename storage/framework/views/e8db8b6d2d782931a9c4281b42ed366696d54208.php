<?php $__env->startSection('content'); ?>
<section id="editSection" class="book_section layout_padding">
    <div class="container">
      <h1>Edit Owner</h1>
      <form action="<?php echo e(route('onner.update', $onner->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" name="first_name" value="<?php echo e($onner->first_name); ?>" style="background-color: white">
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" name="last_name" value="<?php echo e($onner->last_name); ?>" style="background-color: white">
        </div>
        <div class="form-group">
            <label for="gender" >Gender</label>
            <select class="form-control" name="gender"  style="Box-color:white">
                <option style="background-color:white" value="male" <?php echo e($onner->gender == 'male' ? 'selected' : ''); ?> >Male</option>
                <option style="background-color:white" value="female"  <?php echo e($onner->gender == 'female' ? 'selected' : ''); ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo e($onner->email); ?>" style="background-color:white">
        </div>
        <div class="form-group">
          <label for="Nationality">Nationality</label>
          <input type="text" class="form-control" name="Nationality" value="<?php echo e($onner->Nationality); ?>" style="background-color: white">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </section>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/onner/edit.blade.php ENDPATH**/ ?>