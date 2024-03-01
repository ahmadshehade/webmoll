<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>eBusiness Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo e(asset('flors/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('flors/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo e(asset('flors/lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo e(asset('flors/lib/nivo-slider/css/nivo-slider.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('flors/lib/owlcarousel/owl.carousel.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('flors/lib/owlcarousel/owl.transitions.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('flors/lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('flors/lib/animate/animate.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('flors/lib/venobox/venobox.css')); ?>" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="<?php echo e(asset('flors/css/nivo-slider-theme.css')); ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo e(asset('flors/css/style.css')); ?>" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="<?php echo e(asset('flors/css/responsive.css')); ?>" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">
    
<style>
    .footer {
      background-color: #f5f5f5;
      padding: 20px;
    }
    
    .container {
      max-width: 960px;
      margin: 0 auto;
    }
    
    .text-center {
      text-align: center;
    }
    
    .alo {
      color: #333;
      font-size: 18px;
      font-weight: bold;
    }
    .centered-table {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80%;
    }
    
    .centered-table td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
      background-color: #f5f5f5;
      opacity: 70%;
    }
    
    .centered-table tr:first-child {
      font-weight: bold;
    }
    
    .centered-table tr:nth-child(odd) {
      background-color: #fff;
    }
    
    .centered-table tr:hover {
      background-color: #e9e9e9;
    }
    
    .centered-table tr:first-child:hover {
      background-color: transparent;
    }
    
    .centered-table td:first-child {
      text-align: left;
    }
      </style>
    <header>
        <div>
          <img src="<?php echo e(asset('flors/img/slider/slider1.jpg')); ?>" alt=""  />

          <table class="centered-table">
            <tr>
              <td>Floor Name</td>
              <td>Moll Refrence</td>
              <td>Actions</td>
            </tr>
            <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($floor->floor_name); ?></td>
              <td><?php echo e($floor->mole->name); ?></td>
              <td style="display: flex">
             <a href="<?php echo e(route('floors.show',['floor'=>$floor->id])); ?>" class="btn btn-outline-success" style="margin-left: 250px">Show</a>
               <?php if(Auth::check() & Auth::user()->role==1): ?>
             <a href="<?php echo e(route('floors.edit',['floor'=>$floor->id])); ?>" class="btn btn-outline-primary">Update</a>
                <form action="<?php echo e(route('floors.destroy',['floor'=>$floor->id])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </header>
    <footer class="footer">
        <div class="container text-center">
            <span class="alo">All Floors</span>
            <?php if(Auth::user()->role =="1"): ?>
            <a href="<?php echo e(route('floors.create')); ?>" class="btn btn-success">Create</a>
            <?php endif; ?>
            <p>Wellcom To My Floors</p>
          
            
                <div class="#" aria-labelledby="navbarDropdown">
                    <?php if(Auth::user()->role=="1"): ?>
                    <a class="dropdown-item" href="<?php echo e(route('mole.index')); ?>"><?php echo e(__('Moll')); ?></a>
                    <?php endif; ?>
                    <a class="btn btn-outline-info" href="<?php echo e(route('onner.index')); ?>"><?php echo e(__('Owner')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('investors.index')); ?>"><?php echo e(__('Investors')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('Floors')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('departments.index')); ?>"><?php echo e(__('Departments')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('employe.index')); ?>"><?php echo e(__('Employes')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('baskets.allindex')); ?>"><?php echo e(__('Mange_Basket')); ?></a>
                </div>
            


        </div>
    </footer>
      <!-- direction 1 -->



  <!-- End Testimonials -->
  <!-- Start Blog Area -->

            <!-- Start single blog -->

          <!-- End Left Blog-->
          <!-- Start Left Blog -->

  <!-- End Blog -->
  <!-- Start Suscrive Area -->

  <!-- End Suscrive Area -->
  <!-- Start contact Area -->



  <!-- JavaScript Libraries -->
  <script src="<?php echo e(asset('flors/lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/venobox/venobox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/knob/jquery.knob.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/wow/wow.min.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/parallax/parallax.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/easing/easing.min.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/nivo-slider/js/jquery.nivo.slider.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('flors/lib/appear/jquery.appear.js')); ?>"></script>
  <script src="<?php echo e(asset('flors/lib/isotope/isotope.pkgd.min.js')); ?>"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo e(asset('flors/contactform/contactform.js')); ?>"></script>

  <script src="<?php echo e(asset('flors/js/main.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\Laravel\projects\moole\resources\views/floors/index.blade.php ENDPATH**/ ?>