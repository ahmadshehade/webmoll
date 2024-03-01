<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Basic -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Mico</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('owner/css/bootstrap.css')); ?>" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />





<!--

Tooplate 2123 Simply Amazed

https://www.tooplate.com/view/2123-simply-amazed

-->



    
    <!-- font awesome style -->
    <link href="<?php echo e(asset('owner/css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('owner/css/style.css')); ?>" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo e(asset('owner/css/responsive.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-B3y8QjTcYsGm7r2LmT6fW0cC8xQh4j2/9wGx6cj1n1QKu1yB6Leyf6Wz/7WfZyzySHIW6Sf2x2eIddmDjZ3Z+A==" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-NX5Z0hH5LJjxOtJSmn3H0kkT7QDQ7eE0k1hxvJApA7i0uy6+Q3g+0IUGJw5ZzJy5A9DbKqCnTw6iW0H3mJz9tQ==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="app">







        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <?php if(Auth::check() && (Auth::user()->role == 1 || Auth::user()->role == 2)): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('dashbord')); ?>"><?php echo e(__('Dashboard')); ?></a>
                            </li>
                            <?php if(Auth::check() && (Auth::user()->role == 1)): ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Controls
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php if(Auth::user()->role=="1"): ?>
                                            <a class="dropdown-item" href="<?php echo e(route('mole.index')); ?>"><?php echo e(__('Moll')); ?></a>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="<?php echo e(route('onner.index')); ?>"><?php echo e(__('Owner')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('investors.index')); ?>"><?php echo e(__('Investors')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('Floors')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('departments.index')); ?>"><?php echo e(__('Departments')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('employe.index')); ?>"><?php echo e(__('Employees')); ?></a>
                                        <a class="dropdown-item" href="<?php echo e(route('baskets.allindex')); ?>"><?php echo e(__('Manage_Basket')); ?></a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('baskets.index')); ?>">Basket</a>
                        </li>
                        <?php if(Auth::user()->basket!==null): ?>
                        <li class="nav-item">

                            <a class="nav-link" href="<?php echo e(route('product.index')); ?>">Shopping</a>


                        </li>
                        <?php endif; ?>

                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('profiles.index')); ?>"><?php echo e(__('Profile')); ?></a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
      <!-- jQery -->
  <script src="<?php echo e(asset('owner/js/jquery-3.4.1.min.js')); ?>"></script>
  <!-- bootstrap js -->
  <script src="<?php echo e(asset("owner/js/bootstrap.js")); ?>"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <!-- custom js -->
  <script src="<?php echo e(asset('owner/js/custom.js')); ?>"></script>
  <script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>
</html>
<?php /**PATH D:\Laravel\projects\moole\resources\views/layouts/app.blade.php ENDPATH**/ ?>