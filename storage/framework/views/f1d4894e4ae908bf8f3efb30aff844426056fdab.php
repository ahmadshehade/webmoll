<?php $__env->startSection('content'); ?>

<div class="container">
    <?php if(Auth::user()): ?>
       <a href="<?php echo e(route('baskets.allindex')); ?>">mange</a> 
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <?php if(!(Auth::user()->basket === null)): ?>
                    <div class="basket-section">
                        <h1 class="card-title">Basket: <?php echo e(Auth::user()->basket->name); ?></h1>

                        <div class="basket-details">
                            <h2>Basket Details:</h2>
                            <div class="basket-info">

                            </div>


                        <div class="basket-products">

                            <table class="product-list" style="display: inline-block;">
                                <?php $__currentLoopData = $pb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="product-item">
                                        <td>
                                            <span class="product-name"><?php echo e($b->product_name); ?></span>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('productbasket.destroy', ['id' => $b->id])); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="product-actions">
                                                <a href="<?php echo e(route('product.show', $b->product_number)); ?>" class="btn btn-primary">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div>
                  
                </div>
                        


                    <?php if(Auth::user()->basket === null): ?>
                        <a href="#" class="btn btn-success" id="createButton" onclick="toggleCreateSection()">Create New Basket</a>
                    </div>
                    <?php endif; ?>

                   
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <img src="<?php echo e(asset('basketses/img2.jpg')); ?>" class="card-img-top" alt="Basket List Image">
                <div class="card-body">
                    <h5 class="card-title">Basket List Image</h5>
                </div>
            </div>
        </div>
    </div>
</div>>
            <section id="createSection" style="display: none;">
                 <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8"> <div class="card">
                            <div class="card-body">
                                <h1>Create a New Basket</h1>
                                 <form action="<?php echo e(route('baskets.store')); ?>" method="POST">
                                     <?php echo csrf_field(); ?> <div class="form-group"> <label for="name">Name:</label>
                                         <input type="text" name="name" id="name" class="form-control" required>
                                        </div> <div class="form-group">
                                             <label for="products_count">Product Count:</label>
                                             <input type="number" name="products_count" id="products_count" class="form-control" value="0" readonly>
                                             </div>
                                              <div class="form-group"> <label for="product_name">Product Name:</label>
                                                <input type="text" name="product_name" id="product_name" class="form-control" readonly value="No Product">  </div>
                                                <div class="form-group"> <label for="mony">Mony:</label>
                                                    <input type="number" name="mony" id="mony" class="form-control" required>
                                                 </div>
                                                 <button type="submit" class="btn btn-primary">Create</button>
                                                 </form>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     </div>
                                    </section>



    <script>
       function toggleCreateSection() {
    var createSection = document.getElementById("createSection");
    if (createSection.style.display === "none") {
      createSection.style.display = "block";
      setTimeout(function() {
        window.scrollTo({
          top: createSection.offsetTop,
          behavior: "smooth"
        });
      }, 200);
    }
  }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/baskets/index.blade.php ENDPATH**/ ?>