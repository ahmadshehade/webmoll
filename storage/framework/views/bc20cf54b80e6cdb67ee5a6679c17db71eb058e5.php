

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Clemo – Free HTML5 Multipurpose Portfolio Page Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo e(asset('dep/apple-touch-icon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/fonticons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/slider-pro.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/stylesheet.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/plugins.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dep/css/responsive.css')); ?>" />
    <script src="<?php echo e(asset('dep/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')); ?>"></script>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- End of header -->
    <!-- Home Section -->

        <?php if(Auth::user()->role=="1"): ?>
        <div class="#" aria-labelledby="navbarDropdown" style="margin-left: 3%;max-width:70%;display:inline-flex">
        <a class="btn btn-outline-info" href="<?php echo e(route('mole.index')); ?>" ><?php echo e(__('Moll')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('onner.index')); ?>"><?php echo e(__('Owner')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('investors.index')); ?>"><?php echo e(__('Investors')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('Floors')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('departments.index')); ?>"><?php echo e(__('Departments')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('employe.index')); ?>"><?php echo e(__('Employes')); ?></a>
      
        <a class="btn btn-outline-info" href="<?php echo e(route('baskets.allindex')); ?>"><?php echo e(__('Mange_Basket')); ?></a>
    </div>
        <?php else: ?>
        <div class="#" aria-labelledby="navbarDropdown" style="margin-left: 18%;max-width:70%;display:inline-flex">
            <a class="btn btn-outline-info" href="<?php echo e(route('home')); ?>"><?php echo e(__('Back')); ?></a>
            <a class="btn btn-outline-info" href="<?php echo e(route('onner.index')); ?>"><?php echo e(__('Owner')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('investors.index')); ?>"><?php echo e(__('Investors')); ?></a>
        <a class="btn btn-outline-info" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('Floors')); ?></a>

        <a class="btn btn-outline-info" href="<?php echo e(route('employe.index')); ?>"><?php echo e(__('Employes')); ?></a>
      
        <?php endif; ?>

    </div>
        <section id="home" class="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_home_slider text-center">
                            <div class="single_home_slider">
                                <div class="home-overlay"></div>
                                <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1><strong style="color:black">Departments</strong></h1>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Department Name</th>
                                                            <th>Employee Count</th>
                                                            <th>Floor Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($dep->department_name); ?></td>
                                                                <td><?php echo e($dep->employ_count); ?></td>
                                                                <td><?php echo e($dep->floor_name); ?></td>
                                                                <td>
                                                                    <a href="<?php echo e(route('departments.show',['department'=>$dep->id])); ?>" class="btn btn-primary">View</a>
                                                                    <?php if(Auth::user()->role=="1"): ?>
                                                                    <a href="<?php echo e(route('departments.edit',['department'=>$dep->id])); ?>" class="btn btn-success" >Edit</a>
                                                                    <form action="<?php echo e(route('departments.destroy', $dep->id)); ?>" method="POST" style="display: inline-block;">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form> 
                                                                    <?php endif; ?>
                                                                   
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php if(Auth::user()->role =="1"): ?>
                                                <a href="#" class="btn btn-primary" onclick="toggleCreateSection()">Create Department</a>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div><!-- End of single_home_slider -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="CreateSection" class="book_section layout_padding container" style="display: none;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Create Department')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('departments.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="department_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Department Name')); ?></label>

                                <div class="col-md-6">
                                    <input id="department_name" type="text" class="form-control <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="department_name" value="<?php echo e(old('department_name')); ?>" required autocomplete="department_name" autofocus>

                                    <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employ_count" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Employ Count')); ?></label>

                                <div class="col-md-6">
                                    <input id="employ_count" type="number" class="form-control <?php $__errorArgs = ['employ_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="employ_count" value="<?php echo e(old('employ_count')); ?>" required autocomplete="employ_count">

                                    <?php $__errorArgs = ['employ_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>

                                             </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="floor_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Floor Name')); ?></label>
                           <div class="col-md-6">
                                    <select id="floor_name" class="form-control <?php $__errorArgs = ['floor_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="floor_name" required>
                                        <option value="">Select Floor</option>
                                        <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($floor->floor_name); ?>"><?php echo e($floor->floor_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php $__errorArgs = ['floor_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Create')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





    <!-- End of Home Section -->
    <!-- End of portfolio Section -->
    <!-- Contact Section -->
    <!-- footer Section -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="main_footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright_text text-center">
                            <h3 class=" wow fadeInRight" data-wow-duration="1s">All  Departments </h3>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div><!-- End of container -->
    </footer><!-- End of footer -->
    <!-- START SCROLL TO TOP  -->
    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>
    <script src="<?php echo e(asset('dep/js/vendor/jquery-1.11.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dep/js/vendor/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dep/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('dep/js/masonry/masonry.min.js')); ?>"></script>
    <script type="text/javascript">
        $('.mixcontent').masonry();

        <script src="<?php echo e(asset('dep/js/vendor/jquery-1.11.2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dep/js/vendor/bootstrap.min.js')); ?>"></script>


        <script src="<?php echo e(asset('dep/js/masonry/masonry.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.mixcontent').masonry();
        </script>

        <script type="text/javascript">
            $(document).ready(function ($) {
                $('#example3').sliderPro({
                    width: 960,
                    height: 200,
                    fade: true,
                    arrows: false,
                    buttons: true,
                    fullScreen: false,
                    shuffle: true,
                    smallSize: 500,
                    mediumSize: 1000,
                    largeSize: 3000,
                    thumbnailArrows: true,
                    autoplay: false,
                    thumbnailsContainerSize: 960

                });
            });
        </script>
        <script src="<?php echo e(asset('dep/js/plugins.js')); ?>"></script>
        <script src="<?php echo e(asset('dep/js/main.js')); ?>"></script>
        <script>
  function toggleCreateSection() {
    var createSection = document.getElementById("CreateSection");
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

</body>
</html>

<?php /**PATH D:\Laravel\projects\moole\resources\views/departments/index.blade.php ENDPATH**/ ?>