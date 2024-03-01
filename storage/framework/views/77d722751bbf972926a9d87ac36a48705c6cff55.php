<?php $__env->startSection('content'); ?>
<style>
    body{
        background-image: url(<?php echo e(asset('Moll/first.avif')); ?>)
    }
    td {
    font-weight: bold;
  }
  tr{
    background-color:silver;
    opacity: 80%;
  }
  #showSection{
    background-color:silver;
    opacity: 80%;


  }
  select {
        background-color: white;
    }

    option:selected {
        background-color: white;
    }


</style>
<div class="hero_area">
  <!-- header section starts -->
  <header class="header_section">
    <div class="header_top">
      <div class="container">
        <div class="contact_nav">
          <?php $__currentLoopData = $oners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($oner->email== Auth::user()->email): ?>
              <a href="<?php echo e(route('dashbord')); ?>">
                <i class="fa fa-envelope" aria-hidden="true"  style="color:black"></i>
                <span style="color:black"><strong> <?php echo e($oner->email); ?></strong></span>
              </a>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <a href="">
            <i class="fa fa-map-marker" aria-hidden="true" style="color:black"></i>
            <span  style="color:black">Location</span>
          </a>
        </div>
      </div>
    </div>
  <!-- end header section -->

  <!-- start client section -->
  <section class="client_section layout_padding" style="margin-bottom: 20px">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span style="color:black">Owners</span>
        </h2>
      </div>
      <a href="<?php echo e(route('onner.create')); ?>" class="btn btn-primary">Create</a>
    </div>
    <div class="container px-0">
        <table class="table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $oners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($onner->first_name); ?></td>
                  <td><?php echo e($onner->email); ?></td>
                  <td>
                    <div style="display: inline-flex">
                      <?php if(Auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('onner.show',['onner'=>$onner->id])); ?>" class="btn btn-primary" >Show</a>
                        <a href="<?php echo e(route('onner.edit',['onner' => $onner->id])); ?>" class="btn btn-success">Update</a>
                        <form action="<?php echo e(route('onner.destroy', ['onner' => $onner->id])); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      <?php else: ?>
                        <p>Disable</p>
                      <?php endif; ?>
                    </div>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>

  <!-- end client section -->

  <!-- start show section -->
  

  
  </section>

  <!-- start edit section -->
  
<!-- end edit section -->
</section>
  <!-- end show section -->

  <!-- start contact section -->

  <!-- end contact section -->

  <!-- start footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Owners
      </p>
    </div>
  </footer>
  <!-- end footer section -->
</div>
<script>
function toggleShowSection() {
  var showSection = document.getElementById("showSection");
  if (showSection.style.display === "none") {
    showSection.style.display = "block";
    setTimeout(function() {
      window.scrollTo({
        top: showSection.offsetTop,
        behavior: "smooth"
      });
    }, 200);
  }
}
    function toggleEditSection() {
  var editSection = document.getElementById("editSection");
  if (editSection.style.display === "none") {
    editSection.style.display = "block";
    setTimeout(function() {
      window.scrollTo({
        top: editSection.offsetTop,
        behavior: "smooth"
      });
    }, 200);
  } else {
    editSection.style.display = "none";
  }
  var showSection = document.getElementById("showSection");
  if (showSection.style.display === "block") {
    showSection.style.display = "none";
  }
}
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/onner/index.blade.php ENDPATH**/ ?>