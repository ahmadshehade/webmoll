<?php $__env->startSection('content'); ?>
<section class="book_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col">
          <form action="<?php echo e(route('onner.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <h4>
              Create <span>Owner</span>
            </h4>
            <div class="form-row ">
              <div class="form-group col-lg-4">
                <label for="inputPatientName">First Name </label>
                <input type="text" class="form-control" id="inputPatientName" placeholder="" name="first_name">
              </div>
              <div class="form-group col-lg-4">
                <label for="inputDoctorName">Gender</label>
                <select name="gender" class="form-control wide" id="inputDoctorName">
                  <option value="Mail ">Mail </option>
                  <option value="Fmaile ">Fmaile</option>

                </select>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputDate">Nationality </label>
                <div class="input-group date" >
                  <input type="text" class="form-control" name="Nationality">
                  <span class="input-group-addon date_icon">

                  </span>
                </div>
              </div>

            </div>
            <div class="form-row ">
              <div class="form-group col-lg-4">
                <label for="inputPhone">Last Name</label>
                <input type="text" class="form-control" id="inputPhone" placeholder="" name="last_name">
              </div>
              <div class="form-group col-lg-4">
                <label for="inputSymptoms">Email</label>
                <input type="email" class="form-control" id="inputSymptoms" placeholder="" name="email">
              </div>
           

            </div>
            <div class="btn-box">
              <button type="submit" class="btn ">Submit Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/onner/create.blade.php ENDPATH**/ ?>