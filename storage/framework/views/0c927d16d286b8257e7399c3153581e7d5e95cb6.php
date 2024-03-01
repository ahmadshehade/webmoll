<?php $__env->startSection('content'); ?>
  <div id="showSection" class="book_section layout_padding container" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Show Details</div>

                            <div class="card-body">
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                    <div class="form-group">
                                        <label for="employ_name">Employee Name</label>
                                        <input type="text" name="employ_name" class="form-control" id="employ_name" value="<?php echo e($employ->employ_name); ?> "readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="sallary">Salary</label>
                                        <input type="text" name="sallary" class="form-control" id="sallary" value="<?php echo e($employ->sallary); ?> "readonly >
                                    </div>

                                    <div class="form-group">
                                        <label for="rank">Rank</label>
                                        <input type="text" name="rank" class="form-control" id="rank"value="<?php echo e($employ->rank); ?> "readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="floor">Floor</label>
                                        <input name="floor_name" type="text" class="form-control" id="floor"value="<?php echo e($employ->floor->floor_name); ?>" readonly>

                                    </div>

                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <input type="text"name="department_name" class="form-control" id="department" value="<?php echo e($employ->department->department_name); ?>" readonly>

                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/employ/show.blade.php ENDPATH**/ ?>