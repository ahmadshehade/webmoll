<?php $__env->startSection('content'); ?>

<section class="banner_main">
    <div class="container">
       <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row d_flex">
       <div class="col-md-6">
           <img class="contactus profile-image" src="<?php echo e(asset($profile->personal_image)); ?>" alt="personal image">
       </div>

       <div class="col-md-6">
          <div id="request" class="main_form">
             <div class="row" mu>
                <div class="col-md-12 ">
                   <input class="contactus" placeholder="Name" type="type" name="name" value="<?php echo e($profile->user->name); ?>" readonly>
                </div>
                <div class="col-md-12">
                   <input class="contactus" placeholder=" Email" type="email" name="email" readonly value=" <?php echo e($profile->email); ?>"readonly>
                </div>
                <div class="col-md-12">
                   <input class="contactus" placeholder=" Phone Number" type="type" name="serial_number" value="<?php echo e($profile->serial_number); ?>"readonly>
                </div>
                <div class="col-md-12">
                   <input class="contactus" placeholder="Message" type="text" name="gender" value="<?php echo e($profile->gender); ?>" readonly>
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/prof/show.blade.php ENDPATH**/ ?>