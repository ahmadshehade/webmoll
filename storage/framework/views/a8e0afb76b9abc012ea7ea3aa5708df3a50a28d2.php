<?php $__env->startSection('content'); ?>
<div class="container">
<table class="table">
    <thead class="ssc">
      <tr>

        <th scope="col">Investor Name</th>
        <th scope="col">Department Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <?php $__currentLoopData = $idss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
     <tr>

      <td><?php echo e($ids->investor_name); ?></td>
      <td><?php echo e($ids->department_name); ?></td>
      <td style="display: inline-flex">

        <?php if(Auth::check() & Auth::user()->role=="1"): ?>

        <div>
            <form action="<?php echo e(route('investordepartment.delete',['id'=>$ids->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" >Delete</button>
            </form>
            <?php else: ?>
            <p>Dissable</p>
            <?php endif; ?>
      </td>

     </tr>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/investordepartments/index.blade.php ENDPATH**/ ?>