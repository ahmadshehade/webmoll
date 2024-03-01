<?php $__env->startSection('content'); ?>
<section class="book_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col">
          <h4>
            Owner Details
          </h4>
          <div class="form-row ">
            <div class="form-group col-lg-4">
              <label for="inputPatientName">First Name </label>
              <input type="text" class="form-control" id="inputPatientName" placeholder="" name="first_name" value="<?php echo e($onner->first_name); ?>" readonly>
            </div>
            <div class="form-group col-lg-4">
                <label for="inputPatientName">Last Name </label>
                <input type="text" class="form-control" id="inputPatientName" placeholder="" name="first_name" value="<?php echo e($onner->last_name); ?>" readonly>
              </div>
            <div class="form-group col-lg-4">
              <label for="inputDoctorName">Gender</label>
              <input type="text" class="form-control" id="inputDoctorName" placeholder="" name="gender" value="<?php echo e($onner->gender); ?>" readonly>
            </div>

          </div>
          <div class="form-row ">
            <div class="form-group col-lg-4">
              <label for="inputPhone">Last Name</label>
              <input type="text" class="form-control" id="inputPhone" placeholder="" name="last_name" value="<?php echo e($onner->last_name); ?>" readonly>
            </div>
            <div class="form-group col-lg-4">
              <label for="inputSymptoms">Email</label>
              <input type="email" class="form-control" id="inputSymptoms" placeholder="" name="email" value="<?php echo e($onner->email); ?>" readonly>
            </div>
            <div class="form-group col-lg-4">
              <label for="inputDate">Moll Name </label>
              <input type="text" class="form-control" id="inputDate" placeholder=""  value="<?php echo e($moles->name); ?>" readonly>
            </div>
            <div class="form-group col-lg-4" style="margin-left:385px">
                <label for="inputDate">Nationality </label>
                <input type="text" class="form-control" id="inputDate" placeholder="" name="Nationality" value="<?php echo e($onner->Nationality); ?>" readonly>
              </div>
          </div>
          <div class="btn-box">
            <a href="<?php echo e(route('onner.index')); ?>" class="btn">Back</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/onner/show.blade.php ENDPATH**/ ?>