
<head>
    <meta charset="utf-8" />
    <title>Page Source to my Mole</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset("molles/css/bootstrap.min.css")); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('molles/fontawesome/css/all.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('molles/css/slick.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('molles/css/tooplate-simply-amazed.css')); ?>" type="text/css" />
<!--

Tooplate 2123 Simply Amazed

https://www.tooplate.com/view/2123-simply-amazed

-->
</head>

<body>
    
    
    <div id="outer">
        <header class="header order-last" id="tm-header">
            <nav class="navbar">
                <div class="collapse navbar-collapse single-page-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#section-1"><span class="icn"><i class="fas fa-2x fa-air-freshener"></i></span> Our Company</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#section-3"><span class="icn"><i class="far fa-2x fa-images"></i></span> Our Components</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-4"><span class="icn"><i class="fab fa-2x fa-battle-net"></i></span>Actions To Moll</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>



        <main id="content-box" class="order-first">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-info">Back</a>
            <div class="banner-section section parallax-window" data-parallax="scroll" data-image-src="img/section-1-bg.jpg" id="section-1">
                <div class="container">
                    <div class="item" style="display: flex; justify-content: center; position: relative;">
                        <div class="transparent">
                            <div style="display: flex;">
                                <img src="<?php echo e(asset('Moll/first.avif')); ?>" width="400px">
                                <img src="<?php echo e(asset('Moll/premium_photo-1681829520324-fecabdd243d5.avif')); ?>" width="500px">
                            </div>
                            <div style="position: absolute; top: 45%; left: 45%; transform: translate(-50%, -50%); color: gold; border-radius: 10px; padding: 20px; background-color: rgba(0, 0, 0, 0.6);">

                                    <div class="transparent simple logo-fa" style="margin-top: 50px; text-align: center;">
                                        <span style="font-size: 50px; font-weight: bold; color: gold;"><?php echo e($moles->name); ?></span>
                                        <div style="font-size: 25px; color: gold;"><?php echo e($moles->Construction_time); ?></div>
                                    </div>

                            </div>>
                        </div>
                    </div>
                </div>
            </div>


            <section class="gallery-section section parallax-window" data-parallax="scroll" data-image-src="img/section-3-bg.jpg" id="section-3">
                <div class="container">
                    <div class="title text-right">
                        <h2>Our Components</h2>
                    </div>
                    <div class="mx-auto gallery-slider">
                        <figure class="effect-julia item"  style="height: 250px">
                            <img src="molles/img/owner.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Owners</p>
                                </div>
                                <a href="<?php echo e(route('onner.index')); ?>">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item"  style="height: 250px">
                            <img src="molles/img/investor1.webp" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Investors</p>
                                </div>
                                <a href="<?php echo e(route('investors.index')); ?>">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item" style="height: 250px">
                            <img src="molles/img/floors.jpg" alt="Image" height="200px">
                            <figcaption>
                                <div>
                                    <p>Floors</p>
                                </div>
                                <a href="<?php echo e(route('floors.index')); ?>">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item"  style="height: 250px">
                            <img src="molles/img/dep.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Departments</p>
                                </div>
                                <a href="">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item"  style="height: 250px">
                            <img src="molles/img/emp.png" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Employes</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>


                    </div>
                </div>
            </section>

            <section class="contact-section section" id="section-4">
                <div class="container">
                    <div class="title">
                        <h3>Actions To Mole</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 mb-4 contact-form">
                            <div class="form tm-contact-item-inner">
                                <form action="<?php echo e(route('mole.update',['id'=>$moles->id])); ?>" method="POST" style="max-width: 400px; margin: 0 auto;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('Put'); ?>
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name" value="<?php echo e($moles->name); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Construction_time">Construction Time:</label>
                                        <input name="Construction_time" type="date" class="form-control" id="Construction_time" value="<?php echo e($moles->Construction_time); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-block" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 contact-details">
                            <div class="tm-contact-item-inner-2">
                                <div>
                                    <img src="<?php echo e(asset('Moll/first.avif')); ?>" style="max-width: 400px; max-height: 300px; width: 100%; height: auto;">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 map">
                            <!-- Map -->
                            <div>
                                <img src="<?php echo e(asset('Moll/premium_photo-1681829520324-fecabdd243d5.avif')); ?>" style="max-width: 400px; max-height: 300px; width: 100%; height: auto;"><br><br>
                                <img src="<?php echo e(asset('Moll/second.avif')); ?>" style="max-width: 400px; max-height: 300px; width: 100%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>
    <script src="<?php echo e(asset('molles/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molles/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molles/js/jquery.singlePageNav.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molles/js/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('molles/js/parallax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molles/js/templatemo-script.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\Laravel\projects\moole\resources\views/mole/index.blade.php ENDPATH**/ ?>