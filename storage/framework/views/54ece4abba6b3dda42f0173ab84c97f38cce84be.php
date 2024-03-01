<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/elegant-icons.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/nice-select.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/jquery-ui.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/slicknav.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('prodc/css/style.css')); ?>" type="text/css">
</head>

<body>
 
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="<?php echo e(asset('prodc/img/logo.png')); ?>" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>

                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>

        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo e(asset('prodc/img/language.png')); ?>" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>

        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
               
                <li><a href="./shop-grid.html">Shop</a></li>
                <li>
                    <a href="<?php echo e(route('products.trash')); ?>">
                        <i class="fas fa-trash"></i><span>3</span>
                    </a>
                     </li>


            </ul>
        </nav>
     
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <?php echo e(Auth::user()->email); ?></li>

            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo e(Auth::user()->email); ?></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <?php if(Auth::user()->role==1): ?>
                                <div>
                                    <a href="<?php echo e(route('products.trash')); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="header__top__right__language">
                                <div class="header__cart">
                                    <a href="<?php echo e(route('baskets.index')); ?>">
                                        <i class="fa fa-shopping-bag"></i>
                                        <span><?php echo e($cont); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="<?php echo e(route('profiles.index')); ?>">
                                    <i class="fa fa-user"></i>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="<?php echo e(asset('prdc/img/logo.png')); ?>" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('prodc/img/breadcrumb.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
 
    <section class="shoping-cart spad" >
        <?php if(session('success')): ?>

        <div class="alert alert-primary" role="alert">
                <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <div class="container">
            <?php if(Auth::user()->role==1): ?>
            <a href="<?php echo e(route('product.create')); ?>" class="btn btn-outline-info">Create</a>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Department </th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo e(asset($product->image)); ?>" alt="" style="max-width: 100px">
                                        <h5><?php echo e($product->product_name); ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                     <?php echo e($product->product_price); ?>

                                    </td>

                                    <td class="shoping__cart__total">
                                       <?php echo e($product->dep_name); ?>

                                    </td>
                                    <td class="shoping__cart__item__close" style="display: inline-flex">

                                        <a href="<?php echo e(route('product.addToBasket', ['id' => $product->id])); ?>" class="btn btn-outline-warning">Buy</a>
                                        <?php if(Auth::user()->role==1 ||Auth::user()->role==2): ?>
                                        <a href="<?php echo e(route('product.edit', ['product' => $product->id])); ?>" class="btn btn-outline-success">Edit</a>
                                       
                                    
                                       
                                        <form action="<?php echo e(route('product.destroy',['product'=>$product->id])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                         </form> 
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('product.show', ['product' => $product->id])); ?>" class="btn btn-outline-primary">Show</a>
                                    
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad" style="margin-left: 20%">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">

                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>


                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>

    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo e(asset('prodc/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/jquery.slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/mixitup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('prodc/js/main.js')); ?>"></script>


</body>

</html>
<?php /**PATH D:\Laravel\projects\moole\resources\views/products/index.blade.php ENDPATH**/ ?>