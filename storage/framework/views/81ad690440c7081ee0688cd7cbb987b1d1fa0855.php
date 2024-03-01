<?php $__env->startSection('content'); ?>
 
<div class="container">
    <?php if(Auth::user()->role=="1"): ?>
    <a href="<?php echo e(route('baskets.trash')); ?>" class="btn badge-info float-right">Trash</a>
    <?php endif; ?>
     <div class="row">
        <div class="col-lg-8">
            <div class="card">
                 <div class="card-body">
                     <h1 class="card-title">Basket Details</h1>
                      <p class="card-text"><strong>Name:</strong> <?php echo e($basket->name); ?></p>
                      <p class="card-text"><strong>Product Count:</strong> <?php echo e($basket->products_count); ?></p>
                      <p class="card-text"><strong>Product Name:</strong> <?php echo e($basket->product_name); ?></p>
                       <p class="card-text"><strong>Price:</strong> <?php echo e($basket->mony); ?></p>
                       <p class="card-text"><strong>User:</strong> <?php echo e($basket->user->name); ?></p>
                       <a href="<?php echo e(route('baskets.edit', $basket->id)); ?>" class="btn btn-warning">Edit</a>
                       <form action="<?php echo e(route('baskets.destroy', $basket->id)); ?>" method="POST" style="display: inline">
                         <?php echo csrf_field(); ?>
                         <?php echo method_field('DELETE'); ?>
                         <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                         <a href="<?php echo e(route('baskets.index')); ?>" class="btn btn-secondary">Back to List</a>
                         </div>
                         </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="<?php echo e(asset('basketses/img1.jpg')); ?>" class="card-img-top" alt="Basket Image">
                                 <div class="card-body">
                                    <h5 class="card-title">Basket Image</h5>
                                </div>
                             </div>
                             </div>
                             </div>
                            </div>
                             <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/baskets/show.blade.php ENDPATH**/ ?>