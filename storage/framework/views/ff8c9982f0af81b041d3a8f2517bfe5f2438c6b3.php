<!DOCTYPE html>
<!--
	Bonativo by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
    $i=0;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bonativo Free HTML5 Responsive Template | Template Stock</title>

        <!-- Bootstrap -->
        <link href="<?php echo e(asset('investo/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('investo/css/style.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('investo/css/flexslider.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('investo/icons/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('investo/icons/css/simple-line-icons.css')); ?>" rel="stylesheet" type="text/css">

        <!--revolution slider setting css-->
        <link href="<?php echo e(asset('investo/rs-plugin/css/settings.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('investo/css/prettyPhoto.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }



        .ssc {

            top: 50%;
            left: 20%;

        }
    </style>

    <body data-spy="scroll" data-target=".navbar" data-offset="80">


        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-fixed-top before-color">
            <div class="container">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right scroll-to">
                        <li class="active"><a href="/home">Home</a></li>
                        <li><a href="<?php echo e(route('mole.index')); ?>">Moll</a></li>
                        <li><a href="<?php echo e(route('onner.index')); ?>">Owner</a></li>
                        <li><a href="<?php echo e(route('floors.index')); ?>">Floors</a></li>
                        <li><a href="<?php echo e(route('departments.index')); ?>">Departmants</a></li>
                        <li><a href="<?php echo e(route('employe.index')); ?>">Employes</a></li>
                        <li><a href="<?php echo e(route('InvestorOwner.index')); ?>">Investors & Onner </a></li>
                        <li><a href="<?php echo e(route('Investorfloor.index')); ?>">Investors & Floors </a></li>
                        <li><a href="<?php echo e(route('investordepartment.index')); ?>">Investors & Departments </a></li>
                        <li class="dropdown">
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <div class="fullwidthbanner" id="home">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                        <!-- MAIN IMAGE -->
                        <div style="position: relative;">
                            <img src="investo/images/bg-1.jpg" alt="desk" data-bgfit="contents" data-bgposition="left top" data-bgrepeat="no-repeat" width="100%">
                            <!-- LAYERS -->
                            <div >
                            <br>
                                <a  href="<?php echo e(route('investors.create')); ?>" class ="btn btn-primary">Create Investor</a>

                                <table class="table" style="margin-left: 12%">
                                    <thead class="ssc">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Investor Name</th>
                                        <th scope="col">Moll Name</th>
                                        <th scope="col">Actions</th>
                                      </tr>
                                    </thead>
                                    <?php $__currentLoopData = $investors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                     <tr>

                                      <td><?php echo e(++$i); ?></td>
                                      <td><?php echo e($investor->investor_name); ?></td>
                                      <td><?php echo e($investor->mole->name); ?></td>
                                      <td style="display: inline-flex">
                                        <a  href="<?php echo e(route('investors.show',['investor'=>$investor->id])); ?>" class ="btn btn-warning">Show</a>
                                        <?php if(Auth::check() & Auth::user()->role=="1"): ?>
                                        <a  href="<?php echo e(route('investors.edit',['investor'=>$investor->id])); ?>" class ="btn btn-success">Update</a>
                                        <div>
                                            <form action="<?php echo e(route('investors.destroy',['investor'=>$investor->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger" >Delete</button>
                                            </form>
                                            <?php endif; ?>
                                      </td>

                                     </tr>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
            </div>
        </div><!--full width banner-->
        <footer class="footer">
            <div class="container text-center">
                <span class="alo">All Investors</span>


            </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo e(asset('investo/js/jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('investo/js/moderniz.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('investo/js/jquery.easing.1.3.js')); ?>" type="text/javascript"></script>
        <!-- bootstrap js-->
        <script src="<?php echo e(asset('investo/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo e(asset('investo/js/jquery.flexslider-min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('investo/js/parallax.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('investo/js/jquery.prettyPhoto.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('investo/js/jqBootstrapValidation.js')); ?>"></script>
        <!--revolution slider scripts-->
        <script src="<?php echo e(asset('investo/rs-plugin/js/jquery.themepunch.tools.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e('investo/rs-plugin/js/jquery.themepunch.revolution.min.js'); ?>" type="text/javascript"></script>
        <script src="asset('investo/js/template.js')" type="text/javascript"></script>

    </body>
</html>
<?php /**PATH D:\Laravel\projects\moole\resources\views/investors/index.blade.php ENDPATH**/ ?>