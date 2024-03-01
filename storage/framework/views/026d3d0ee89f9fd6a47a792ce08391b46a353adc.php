<?php $__env->startSection('content'); ?>
<section>
    <div  class="container">
        <table class="table">
            <thead class="ssc">
              <tr>

                <th scope="col">Investor Name</th>
                <th scope="col">Floor Name</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <?php $__currentLoopData = $invfloor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
              <td><?php echo e($inv->investor_name); ?></td>
              <td><?php echo e($inv->floor_name); ?></td>
              <td style="display: inline-flex">

                <?php if(Auth::check() & Auth::user()->role=="1"): ?>

                <div>
                    <form action="<?php echo e(route('investorfloor.delete',['id'=>$inv->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </div>
                    <?php else: ?>
                    <p>Dissable</p>
                    <?php endif; ?>
              </td>


            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/investorandfloor/index.blade.php ENDPATH**/ ?>