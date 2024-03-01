<?php $__env->startSection('content'); ?>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>spicy</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->

      <!-- style css -->
      <link rel="stylesheet" href="<?php echo e(asset('prof/css/style.css')); ?>">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo e(asset('prof/css/responsive.css')); ?>">
      <!-- fevicon -->
      
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo e(asset('prof/css/jquery.mCustomScrollbar.min.css')); ?>">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>


   <!-- body -->
   <body class="main-layout">
    <style>
    .profile-image {
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: 50%;
 }
        </style>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->

      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="row d_flex">
            <div class="col-md-6">
                <img class="contactus profile-image" src="<?php echo e(asset($profile->personal_image)); ?>" alt="personal image">
            </div>

            <div class="col-md-6">
               <div id="request" class="main_form">
                  <div class="row" mu>
                     <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name" type="type" name="name" value="<?php echo e($profile->user->name); ?>" readonly>
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder=" Email" type="email" name="email" readonly value=" <?php echo e($profile->email); ?>"readonly>
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder=" Phone Number" type="type" name="serial_number" value="<?php echo e($profile->serial_number); ?>"readonly>
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Message" type="text" name="gender" value="<?php echo e($profile->gender); ?>" readonly>
                     </div>
                     <div class="col-md-12" style="display: inline-flex">


                        <a class="sub_btn btn btn-success-outline" href="<?php echo e(route('profiles.edit',['profile'=>$profile->id])); ?>">Edit</a>
                        <a class="sub_btn btn btn-success-outline" href="<?php echo e(route('profiles.show',['profile'=>$profile->id])); ?>"hidden>show</a>




                        <a class="sub_btn btn btn-outline-danger" href="<?php echo e(route('profiles.destroy',['profile'=>$profile->id])); ?>" >Delete</a>


                     </div>




                  </div>

               </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </section>

      <!-- end clients -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <div class="cont">
                        <h3> The User Can Make <br>One Profile</h3>
                        <p>Modern lighting fast & easily Customizable</p>
                     </div>
                     <?php if($user->profile==null): ?>
                     <a class="sub_btn" href="<?php echo e(route('profiles.create')); ?>">Craete</a>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Profile To user</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="<?php echo e(asset('prof/js/jquery.min.js')); ?>"></script>
      <script src="<?php echo e(asset('prof/js/popper.min.js')); ?>"></script>
      <script src="<?php echo e(asset('prof/js/bootstrap.bundle.min.js')); ?>"></script>
      <script src="<?php echo e(asset('prof/js/jquery-3.0.0.min.js')); ?>"></script>
      <!-- sidebar -->
      <script src="<?php echo e(asset('prof/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
      <script src="<?php echo e(asset('prof/js/custom.js')); ?>"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/profiles/index.blade.php ENDPATH**/ ?>