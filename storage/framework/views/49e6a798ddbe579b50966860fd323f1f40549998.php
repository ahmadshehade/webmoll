<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                    <div class="card-body">
                        <h3>Users</h3>
                        <ul class="list-group">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong><?php echo e($user->name); ?></strong>
                                            <br>
                                            <?php echo e($user->email); ?>

                                        </div>
                                        <?php if(Auth::user()->role == 1): ?>
                                            <form method="POST" action="<?php echo e(route('users.updateRole', $user->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <select class="form-control" name="role" onchange="this.form.submit()">
                                                        <option value="1" <?php echo e($user->role == 1 ? 'selected' : ''); ?>>Admin</option>
                                                        <option value="2" <?php echo e($user->role == 2 ? 'selected' : ''); ?>>Moderator</option>
                                                        <option value="3" <?php echo e($user->role == 3 ? 'selected' : ''); ?>>User</option>
                                                    </select>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/dashbord.blade.php ENDPATH**/ ?>